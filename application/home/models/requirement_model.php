<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/4/2017
 * Time: 1:18 PM
 */
class requirement_model extends MY_Model
{
    public function save($userId,$data)
    {
        if(isset($data["id"]))
        {
            $this->db->where("id",$data["id"]);
            $this->db->set("description",$data["description"]);
            $this->db->update("requirements");

            return $data["id"];
        }else {
            $r=array("user_id"=>$userId,"createdTime"=>date("Y-m-d H:i:s"),"description"=>$data["description"]);
            $this->db->insert("requirements",$r);

            return $this->db->insert_id();
        }
    }

    public function delete($userId,$data)
    {
        if(!isset($data["id"]))
        {
            throw new Exception("操作无效!");
        }else {
            $this->db->where(array("user_id"=>$userId,"id"=>$data["id"]))->delete("requirements");
        }
    }
}