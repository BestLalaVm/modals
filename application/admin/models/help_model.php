<?php
class help_model extends CI_Model
{
    const INTRODUCATION = "introducation";
    const HELPCENTER = "helpcenter";
	public function save($id,$data)
	{
	    if($id==help_model::HELPCENTER || $id==help_model::INTRODUCATION)
        {
            $result = $this->get($id);
            if($result==null)
            {
                $data["createdTime"]=date("Y-m-d H:i:s");
                $this->db->insert("helps",$data);
            }else{
                $this->db->where("id",$id);
                $this->db->update("helps",$data);
            }
        }
	}
	
	public function get($id)
	{		
		$result = $this->db->get_where("helps",array("id"=>$id));
		
		return $result->row();
	}
}