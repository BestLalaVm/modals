<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/4/2017
 * Time: 1:18 PM
 */
class question_model extends MY_Model
{
    public function create($userId,$data)
    {
        $r=array("user_id"=>$userId,"createdTime"=>date("Y-m-d H:i:s"),"question"=>$data["question"]);
        $this->db->insert("questions",$r);

        return $this->db->insert_id();
    }

    public function delete($userId,$data)
    {
        if(!isset($data["id"]))
        {
            throw new Exception("操作无效!");
        }else {
            $this->db->where(array("user_id"=>$userId,"id"=>$data["id"]))->delete("questions");
        }
    }
}