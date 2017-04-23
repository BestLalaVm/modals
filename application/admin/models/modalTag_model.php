<?php
class modalTag_model extends MY_Model
{
	public $id;
	public $name;
	public $description;
	public $createdTime;
	
	public function getAll(){
		$this->db->order_by("id","DESC");
		$query = $this->db->get("modalTags",10);
		
		return $query->result();
	}
	
	public function save($data)
	{
		if(isset($data["id"]))
		{
			$this->db->where("id",$data["id"]);
			$this->db->set("name",$data["name"]);
			$this->db->set("description",$data["description"]);
			
			$this->db->update("modalTags");
			
			return $data["id"];
		}else {			
			$data["createdTime"]=date("Y-m-d H:i:s");
			
			$this->db->insert("modalTags",$data);
			return $this->db->insert_id();
		}
	}
	
	public function get($id)
	{		
		$result = $this->db->get_where("modalTags",array("id"=>$id));
		
		return $result->row();
	}
	
	public function delete($id)
	{
		$this->db->where("id",$id)->delete("modalTags");
	}
	
	public function getOptions()
	{
		$this->db->select("id,name");
		$this->db->order_by("name","asc");
		$query = $this->db->get("modalTags");
	
		return $query->result();
	}
}