<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 4:32 PM
 */
class wishlist_model extends MY_Model
{
    public function add($userId, $modalId)
    {
        $existsSql = "select count(1) as total from wishlists where modal_id='$modalId' and user_id='$userId'";
        $row = $this->db->query($existsSql)->row();
        if($row->total>=1)
        {
            throw new Exception("你已经收藏过该模型.");
        }

        $this->db->insert("wishlists",array("modal_id"=>$modalId,"user_id"=>$userId,"createdTime"=>date("Y-m-d H:i:s")));
    }

    public function remove($userId, $modalId){
        $this->db->where(array("user_id"=>$userId,"modal_id"=>$modalId));
        $this->db->delete("wishlists");
    }
}