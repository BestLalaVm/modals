<?php
class modalCategory_model extends CI_Model
{
	public $id;
	public $name;
	public $description;
	public $createdTime;
	
	public function getAll(){
		$this->db->order_by("id","DESC");
		$query = $this->db->get("modalCategories",10);
		
		return $query->result();
	}
	
	public function save($data)
	{
		if(isset($data["id"]))
		{
			$this->db->where("id",$data["id"]);
			$this->db->set("name",$data["name"]);
			$this->db->set("description",$data["description"]);
			
			$this->db->update("modalCategories");
			
			return $data["id"];
		}else {			
			$data["createdTime"]=date("Y-m-d H:i:s");
			
			$this->db->insert("modalCategories",$data);
			return $this->db->insert_id();
		}
	}
	
	public function get($id)
	{		
		$result = $this->db->get_where("modalCategories",array("id"=>$id));
		
		return $result->row();
	}
	
	public function delete($id)
	{
		$this->db->where("id",$id)->delete("modalCategories");
	}
	
	public function getOptions()
	{
		$this->db->select("id,name");
		$this->db->order_by("name","asc");
		$query = $this->db->get("modalCategories");
	
		return $query->result();
	}
}