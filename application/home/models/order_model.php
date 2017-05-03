<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 4:32 PM
 */
class order_model extends MY_Model
{
    private $orderStatusSQl = "(case `status` when 0 then '未支付' when 1 then '支付成功' when 2 then '已发货' when 3 then '取消订单' else '订单失败' END )";

    function create($userId,$shippingAddress)
    {
        $sql="select 
a.id,
a.quantity,a.size,a.weight,
a.modal_id,b.name as modalName,c.image as modalImage,c.smallImage as modalSmallImage,c.thumbImage as modalThumbImage,
d.name as meterialName,d.image as meterialImage,d.smallImage as meterialSmallImage,d.thumbImage as meterialThumbImage,a.meterial_id,d.price as meterialPrice
from shoppingcarts a join modalbases b on a.modal_id=b.id join modals c on c.id=b.id join modalmeterials d on d.id=a.meterial_id where a.user_id='$userId'";
        $shoppingItems = $this->db->query($sql)->result();

        if(count($shoppingItems)>0){
            $orderNumber=uniqid("O");

            $this->db->trans_start();
            $orderId = uniqid();
            $now=date("Y-m-d H:i:s");

            $orderItemSqls=array();
            $totalPrice=0;
            $shoppingcartIds="";

            $orderItems = array();
            foreach ($shoppingItems as $item)
            {
                if(!empty($shoppingcartIds)){
                    $shoppingcartIds.=",";
                }
                $shoppingcartIds.=$item->id;
                $modalId=$item->modal_id;
                $quantity=$item->quantity;
                $size=$item->size;
                $weight=$item->weight;
                $modalName=$item->modalName;
                $modalImage=$item->modalImage;
                $modalThumbImage=$item->modalThumbImage;
                $modalSmallImage=$item->modalSmallImage;
                $meterial_id=$item->meterial_id;
                $meterialName=$item->meterialName;
                $meterialSmallImage=$item->meterialSmallImage;
                $meterialThumbImage=$item->meterialThumbImage;
                $meterialImage=$item->meterialImage;
                $meterialPrice=$item->meterialPrice;
                $itemTotalPrice = $quantity * $meterialPrice;
                $orderItems[]=array("id"=>$modalId,"modalName"=>$modalName,"modalSmallImage"=>$meterialSmallImage,
                                    "price"=>$meterialPrice,"quantity"=>$quantity,"size"=>$size,"weight"=>$weight);

                $orderItemSqls[]="INSERT INTO `orderitems`(`modalId`, `quantity`, `size`, `weight`, `modalName`, `modalImage`, `modalThumbImage`, `modalSmallImage`, 
                                                          `meterialId`, `meterialName`, `meterialImage`, `meterialThumbImage`, `meterialSmallImage`, `orderId`, `createdTime`,price,totalPrice)values
                                 ('${modalId}','${quantity}','${size}','${weight}','${modalName}',
                                 '${modalImage}','${modalThumbImage}','${modalSmallImage}',
                                 '${meterial_id}','${meterialName}','${meterialImage}',
                                 '${meterialThumbImage}','${meterialSmallImage}','${orderId}','${now}',${meterialPrice},${itemTotalPrice})";
                $totalPrice +=$item->weight * $item->quantity* $item->meterialPrice;
            }

            $orderArr=array("id"=>$orderId,"number"=>$orderNumber,"totalPrice"=>$totalPrice,
                "shippingTelephone"=>$shippingAddress["shippingTelephone"],
                "shippingAddress"=>$shippingAddress["shippingAddress"],
                "shippingName"=>$shippingAddress["shippingName"],
                "userId"=>$userId,
                "status"=>0,"createdTime"=>$now);
            if($totalPrice<=0){
                $orderArr["status"]=1;
                $points = 1;

            }else{
                $this->db->insert("payments",array("orderNumber"=>$orderNumber,"createdTime"=>$now));
            }

            $this->db->insert("orders",$orderArr);
            foreach ($orderItemSqls as $itemsql){
                $this->db->query($itemsql);
            }

            $this->db->query("delete from shoppingcarts where id in ($shoppingcartIds)");
            $this->db->where("id",$userId);
            $this->db->set("shippingName",$shippingAddress["shippingName"]);
            $this->db->set("shippingAddress",$shippingAddress["shippingAddress"]);
            $this->db->set("telephone",$shippingAddress["shippingTelephone"]);
            $this->db->update("users");

            $this->db->insert("messages",array("user_id"=>$userId,"content"=>"您有一条新的订单:$orderNumber!","createdTime"=>$now));

            $this->db->trans_complete();

            return array("orderNumber"=>$orderNumber,"shippingAddress"=>$shippingAddress,"items"=>$orderItems);
        }

        throw new Exception("购物车无任何模型,请重新下单!");
    }

    function get($userId,$orderNumber){
      $sql="SELECT a.number,a.`shippingName`,a.shippingAddress,a.shippingTelephone,a.totalPrice,
                   b.modalName,b.modalSmallImage,b.size,b.weight,b.quantity,b.meterialName,b.price,b.modalId,b.totalPrice as itemTotalPrice
            FROM `orders` a join orderitems b on a.id=b.orderId where userId='$userId' and number='$orderNumber'";

      $result =  $this->db->query($sql)->result();
      if($result==null || count(($result))==0) {
          return null;
      }

      $order=array();

      foreach ($result as $item){
          $order["number"]=$item->number;
          $order["shippingName"]=$item->shippingName;
          $order["shippingAddress"]=$item->shippingAddress;
          $order["shippingTelephone"]=$item->shippingTelephone;
          $order["totalPrice"]=$item->totalPrice;
          $order["items"][]=array("modalId"=>$item->modalId,"modalName"=>$item->modalName,"modalSmallImage"=>$item->modalSmallImage,
                                   "size"=>$item->size,"weight"=>$item->weight,"quantity"=>$item->quantity,
                                   "meterialName"=>$item->meterialName,"price"=>$item->price,"totalPrice"=>$item->itemTotalPrice);
      }

      return $order;
    }

    function getAll($userId,$pageIndex,$pageSize)
    {
        $sql="SELECT `id`, `number`, `totalPrice`, `shippingName`, `shippingTelephone`, `shippingAddress`, 
                     `userId`,
                      {$this->orderStatusSQl} as status,
                     `createdTime` FROM `orders` where userId='$userId' order by createdTime desc";

        $countSql="SELECT COUNT(1) as total FROM ($sql) as a";

        $totalCount = $this->db->query($countSql)->row()->total;

        if(!is_int($pageIndex) || $pageIndex<1) {
            $pageIndex = 1;
        }

        if(!is_int($pageSize) || $pageSize<0)
        {
            $pageSize=20;
        }

        $sql.=" limit ".$pageSize." offset ".(($pageIndex-1) * $pageSize);

        $result =  $this->db->query($sql)->result();

        $data = array("totalCount"=>$totalCount,"datas"=>$result,"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }

    function getOrderItems($userId,$number){
        $sql="SELECT a.`number`, a.`totalPrice`, a.`shippingName`, a.`shippingTelephone`, a.`shippingAddress`, 
                    {$this->orderStatusSQl} as status,      
                     b.quantity as itemQuantity,b.size as itemSize,b.weight as itemWeight,b.modalName as itemModalName,
                     b.modalSmallImage,b.meterialName,b.price as itemPrice,b.totalPrice as itemTotalPrice,b.modalId as itemModalId
              from orders a JOIN orderitems b on a.id=b.orderId 
              where userId='$userId' and number='{$number}' order by a.createdTime desc";

        $result =  $this->db->query($sql)->result();
        $order=array("detail"=>array(),"shippingAddress"=>array(),"items"=>array());
        foreach ($result as $item){
            $order["detail"]=array(
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
                "modalId"=>$item->itemModalId
            );
        }

        return $order;
    }

    function changePaymentStatus($orderNumber,$array)
    {
        $isOrderSuccess=false;

        $tradeStatus = $array["trade_status"];
        $this->db->trans_start();
        $this->db->where("orderNumber",$orderNumber);
        $this->db->set("tradeNo",$array["trade_no"]);
        $this->db->set("tradeStatus",$tradeStatus);
        $this->db->update("payments");


        if($tradeStatus=="TRADE_SUCCESS" || $tradeStatus=="TRADE_FINISHED"){
            $this->db->query("UPDATE ORDERS SET status=1 WHERE number='$orderNumber' and status=0");
            $order = $this->db->query("SELECT totalPrice,userId FROM ORDERS WHERE NUMBER='$orderNumber' and status=1")->row();
            if(!is_null($order)){
                $points = ceil($order->totalPrice);
                if($points<=0){
                    $points=1;
                }
                $userId=$order->userId;
                $this->db->query("UPDATE USERS SET points=ifnull(points,0)+$points WHERE id='$userId'");
            }

            $isOrderSuccess=true;
        }

        $this->db->trans_complete();

        return $isOrderSuccess;
    }
}