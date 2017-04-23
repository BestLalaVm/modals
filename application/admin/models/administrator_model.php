<?php
class administrator_model extends MY_Model
{
	public $id;
	public $userName;
	public $password;
	public $isSuper;
	public $createdTime;
	
	public function getAll(){
	    $this->db->where("isBuildIn","0");
		$this->db->order_by("id","DESC");
		$query = $this->db->get("administrators",10);
		
		return $query->result();
	}
	
	public function save($data)
	{
		if(isset($data["id"]))
		{
			$this->db->where("id",$data["id"]);
			$this->db->set("isSuper",$data["isSuper"]);
			if($data["isPasswordChanged"]=="1")
			{
				$this->db->set("password",md5($data["password"]));
			}
			
			$this->db->update("administrators");
			
			return $data["id"];
		}else {
			$this->db->where("userName",$data["userName"]);
			$this->db->from("administrators");
			if($this->db->count_all_results()>0)
			{
				throw new Exception("Exists!");
			}
			
			$data["createdTime"]=date("Y-m-d H:i:s");
			$data["password"]=md5($data["password"]);
			$this->db->insert("administrators",$data);
			return $this->db->insert_id();
		}
	}
	
	public function get($id)
	{		
		$result = $this->db->get_where("administrators",array("id"=>$id,"isBuildIn"=>"0"));
		
		return $result->row();
	}
	
	public function delete($id)
	{
		$this->db->where(array("id"=>$id,"isBuildIn"=>0))->delete("administrators");
	}
	
	public function getOptions()
	{
		$this->db->select("id,userName");
		$this->db->order_by("userName","asc");
		$query = $this->db->get("administrators");
		
		return $query->result();
	}

	public function login($userName,$password)
    {
        $this->db->where("userName",$userName);
        $this->db->select("id,userName,password,isSuper");
        $admin = $this->db->get("administrators")->row();
        if($admin==null)
        {
            throw new Exception("用户名不存在!");
        }

        if($admin->password==md5($password))
        {
            return array("id"=>$admin->id,"userName"=>$admin->userName,"password"=>$admin->password,"isSuper"=>$admin->isSuper==1);
        }

        throw new Exception("密码不正确!");
    }
}