<?php
class depart_model extends MY_Model
{
	public $id;
	public $name;
	public $description;
	public $createdTime;
	
	public function getAll(){
		$this->db->order_by("id","DESC");
		$query = $this->db->get("departs",10);
		
		return $query->result();
	}
	
	public function save($data)
	{
		if(isset($data["id"]))
		{
			$this->db->where("id",$data["id"]);
			$this->db->update("departs",$data);
			
			return $data["id"];
		}else {
			$data["createdTime"]=date("Y-m-d H:i:s");
			
			$this->db->insert("departs",$data);
			return $this->db->insert_id();
		}
	}
	
	public function get($id)
	{		
		$result = $this->db->get_where("departs",array("id"=>$id));
		
		return $result->row();
	}
	
	public function delete($id)
	{
		$this->db->where("id",$id)->delete("departs");
	}
	
	public function getOptions()
	{
		$this->db->select("id,name");
		$this->db->order_by("name","asc");
		$query = $this->db->get("departs");
		
		return $query->result();
	}
}