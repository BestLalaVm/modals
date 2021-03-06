<?php
class modalMeterialCategory_model extends MY_Model
{
	public $id;
	public $name;
	public $description;
	public $createdTime;

	public function getAll(){
		$this->db->order_by("id","DESC");
		$query = $this->db->get("modalMaterialCategories",10);

		return $query->result();
	}

	public function save($data)
	{
		if(isset($data["id"]))
		{
			$this->db->where("id",$data["id"]);
			$this->db->set("name",$data["name"]);
			$this->db->set("description",$data["description"]);
				
			$this->db->update("modalMaterialCategories");
				
			return $data["id"];
		}else {
			$data["createdTime"]=date("Y-m-d H:i:s");
			$this->db->insert("modalMaterialCategories",$data);
			return $this->db->insert_id();
		}
	}

	public function get($id)
	{
		$result = $this->db->get_where("modalMaterialCategories",array("id"=>$id));

		return $result->row();
	}

	public function delete($id)
	{
	    $this->db->select("count(1) as count");
	    $result = $this->db->get_where("modalmeterials",array("meterialCategory_ID",$id));
        $ind = $result->row();
        if($ind->count>0) {
            throw new Exception("该材料类别已被材料使用,请删除后重试!");
        }
        $this->db->where("id", $id)->delete("modalMaterialCategories");
	}
	
	public function getOptions()
	{
		$this->db->select("id,name");
		$this->db->order_by("name","asc");
		$query = $this->db->get("modalMaterialCategories");
	
		return $query->result();
	}
}