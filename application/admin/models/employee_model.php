<?php
class employee_model extends MY_Model
{
	public $id;
	public $name;
	public $telephone;
	public $createdTime;
	
	function query()
	{
		//$query = $this->db->get("employees",10);
		$query = $this->db->query("SELECT A.id,A.name,A.telephone,a.createdTime,b.name as departName from employees a left join departs b on a.departId=b.id");
		
		return $query->result();
	}
	
	function save($data)
	{
		if(isset($data["id"]))
		{
			$this->db->where("id",$data["id"]);
			$this->db->update("employees",$data);
			
			return $data["id"];
		}else
		{
			$data["createdTime"]=date("Y-m-d H:i:s");
			$this->db->insert("employees",$data);
			
			return $this->db->insert_id();
		}
	}
	
	function get($id)
	{
		$result = $this->db->get_where("employees",array("id"=>$id));
		
		return $result->row();
	}
	
	function delete($id)
	{
		$this->db->where("id",$id)->delete("employees");
	}
}