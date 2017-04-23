<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 4:32 PM
 */
class order_model extends MY_Model
{
    const INITIALIZE=0;
    const SUCCESS=1;
    const SHIPPINGTOCUSTOMER=2;
    const CANCELLED=3;
    const FAILED=4;
    private $orderStatusSQl = "(case `status` when 0 then '未支付' when 1 then '支付成功' when 2 then '已发货' when 3 then '取消订单' else '订单失败' END )";

    function getAll($filter,$pageIndex,$pageSize){
        $where=" 1=1 ";
        if($filter && is_array($filter))
        {
            foreach ($filter as $fileterKey=>$filterValue)
            {
                if(!empty($filterValue))
                {
                    if($fileterKey=="startDate")
                    {
                        $where = $where." and a.createdTime >= '$filterValue'";
                        continue;
                    }else if($fileterKey=="endDate")
                    {
                        $endDate = (new DateTime($filterValue))->add(new DateInterval('P1D'))->format("y-m-d");
                        $where = $where." and a.createdTime <= '$endDate' ";
                        continue;
                    }

                    $filterValue = $this->escapeLikeSqlValue($filterValue);
                    $where = $where." and (number like '%$filterValue%' or a.shippingName like '%$filterValue%' or a.shippingAddress like '%$filterValue%' or a.shippingTelephone like '%$filterValue%')";
                }
            }
        }


        $sql="SELECT a.`id`, a.`number`, a.`totalPrice`, a.`shippingName`, a.`shippingTelephone`, a.`shippingAddress`, 
                     a.`userId`,a.`createdTime`,b.email,
                     {$this->orderStatusSQl} as status
              FROM `orders` a JOIN users b on a.userId = b.id where $where order by a.createdTime desc";

        $countSql="SELECT COUNT(1) as total FROM ($sql) as a";

        $totalCount = $this->db->query($countSql)->row()->total;

        if(!is_int($pageIndex) || $pageIndex<1) {
            $pageIndex = 1;
        }

        if(!is_int($pageSize) || $pageSize<0)
        {
            $pageSize=20;
        }

        $result =  $this->db->query($sql)->result();
        $order=array();

        $data = array("totalCount"=>$totalCount,"datas"=>$result,"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }

    function get($id){
        $sql="SELECT a.id,a.`number`, a.`totalPrice`, a.`shippingName`, a.`shippingTelephone`, a.`shippingAddress`, status,      
                     b.quantity as itemQuantity,b.size as itemSize,b.weight as itemWeight,b.modalName as itemModalName,
                     b.modalSmallImage,b.meterialName,b.price as itemPrice,b.totalPrice as itemTotalPrice,b.modalId as itemModalId
              from orders a JOIN orderitems b on a.id=b.orderId 
              where a.id='$id' order by a.createdTime desc";

        $result =  $this->db->query($sql)->result();
        $order=array("detail"=>array(),"shippingAddress"=>array(),"items"=>array());
        foreach ($result as $item){
            $order["detail"]=array(
                "id"=>$item->id,
                "number"=>$item->number,
                "totalPrice"=>$item->totalPrice,
                "status"=>$item->status,
            );
            $order["shippingAddress"]=array(
                "name"=>$item->shippingName,
                "telephone"=>$item->shippingTelephone,
                "address"=>$item->shippingAddress
            );
            $order["items"][]=array(
                "name"=>$item->itemModalName,
                "weight"=>$item->itemWeight,
                "size"=>$item->itemSize,
                "quantity"=>$item->itemQuantity,
                "smallImage"=>$item->modalSmallImage,
                "price"=>$item->itemPrice,
                "totalPrice"=>$item->itemTotalPrice,
                "modalId"=>$item->itemModalId,
                "meterialName"=>$item->meterialName
            );
        }

        return $order;
    }

    function changeStatus($id,$status){
        $this->db->where("id",$id);
        $this->db->set("status",$status);
        $this->db->update("orders");
    }

    static function getOrderStatus($status){
        switch ($status){
            case order_model::INITIALIZE:
                return "未支付";
            case order_model::SUCCESS:
                return "支付成功";
            case order_model::SHIPPINGTOCUSTOMER:
                return "已发货";
            case order_model::CANCELLED:
                return "取消订单";
            case order_model::FAILED:
                return "订单失败";
        }
    }
}