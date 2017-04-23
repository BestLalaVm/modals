<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 4:32 PM
 */
class shoppingcart_model extends MY_Model
{
    public function add($userId, $modalId,$meterialId,$quantity,$size=null,$weight=1)
    {
        $userId = $this->escapeSqlValue($userId);
        $modalId = $this->escapeSqlValue($modalId);
        $meterialId = $this->escapeSqlValue($meterialId);

        $dt = date("Y-m-d H:i:s");
        $query = $this->db->query("select id,quantity,modal_id from shoppingCarts where user_id='$userId' and meterial_id='$meterialId' and modal_id='$modalId' limit 1");
        $shoppingCart = $query->row();
        $updateShoppingCart="INSERT INTO `shoppingcarts`(`modal_id`, `user_id`, `quantity`, `createdTime`,meterial_id,size,weight)values('$modalId','$userId',$quantity,'$dt','$meterialId','$size',$weight)";
        if(!is_null($shoppingCart))
        {
            if(empty($size) && empty($weight)){
                $updateShoppingCart="update shoppingCarts set quantity=quantity+$quantity where user_id='$userId' and modal_id='$modalId' and meterial_id='$meterialId'";
            }else{
                $updateShoppingCart="update shoppingCarts set quantity=quantity+$quantity,size='$size',weight=$weight where user_id='$userId' and modal_id='$modalId' and meterial_id='$meterialId'";
            }
        }

        $this->db->query($updateShoppingCart);
    }

    public function remove($userId, $id)
    {
        $this->db->where(array("id"=>$id,"user_id"=>$userId));
        $this->db->delete("shoppingcarts");
    }

    public function getAll($userId)
    {
        $sql="SELECT a.`id`, a.`modal_id`,`quantity`,a.size,a.weight, b.name,c.smallimage,a.meterial_id as shoppingcartMeterialId,
d.name as meterialName,d.color as meterialColor,d.smallImage as meterialImage,
d.accuracy as meterialAccuracy,d.price as meterialPrice,d.workday as meterialWorkday,
d.size as meterialSize,d.meterial_Id
FROM `shoppingcarts` a join modalbases b on a.modal_id=b.id join modals c on c.id=b.id 
left join (select t1.meterial_Id, t1.modal_id,t2.name,t2.smallImage,t2.color,t2.accuracy,t2.size,t2.price,t2.workday 
           from modal_meterials t1 join modalmeterials t2 on t1.meterial_Id=t2.id) d on d.modal_id=a.modal_id where user_id='$userId'";

        $result = $this->db->query($sql)->result();

        $modals = array();
        foreach ($result as $item)
        {
            $modalExists=false;
            foreach ($modals as &$modalItem)
            {
                if($modalItem["id"]==$item->id && $modalItem["shoppingcartMeterialId"]==$item->shoppingcartMeterialId){
                    $modalExists=true;

                    $modalItem["meterials"][]=array("id"=>$item->meterial_Id,
                        "name"=>$item->meterialName,"color"=>$item->meterialColor,"smallImage"=>$item->meterialImage,
                        "accuracy"=>$item->meterialAccuracy,"price"=>$item->meterialPrice,"workday"=>$item->meterialWorkday,
                        "size"=>$item->meterialSize,"meterials"=>array());
                }
            }

            if(!$modalExists)
            {
                $tmp=array("id"=>$item->id,"name"=>$item->name,"modal_id"=>$item->modal_id,"quantity"=>$item->quantity,"smallimage"=>$item->smallimage,"shoppingcartMeterialId"=>$item->shoppingcartMeterialId,
                            "size"=>$item->size,"weight"=>$item->weight,"meterials"=>array());
                if(!empty($item->meterial_Id)){
                    $tmp["meterials"][]=array("id"=>$item->meterial_Id,
                        "name"=>$item->meterialName,"color"=>$item->meterialColor,"smallImage"=>$item->meterialImage,
                        "accuracy"=>$item->meterialAccuracy,"price"=>$item->meterialPrice,"workday"=>$item->meterialWorkday,
                        "size"=>$item->meterialSize);

                }

                $modals[]=$tmp;
            }
        }

        return $modals;
    }

    public function update($userId,$data)
    {
        $this->db->trans_start();
        for($index=0;$index<count($data);$index++) {
            $item = $data[$index];
            $sql="UPDATE shoppingcarts SET size='${item['size']}',weight=${item['weight']},quantity=${item['quantity']},meterial_id={$item["meterialId"]} where id=${item['id']} and user_id='$userId'";
            $this->db->query($sql);
        }

        $this->db->trans_complete();
    }
}