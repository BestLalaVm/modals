<?php
class requirement_model extends MY_Model
{
	public $id;
	public $userName;
	public $password;
	public $isSuper;
	public $createdTime;

    public function getAll($filter,$pageIndex=0,$pageSize=20)
    {
        $where=" 1=1 ";
        if(array_key_exists("keyword",$filter))
        {
            $keyword = $this->escapeLikeSqlValue($filter["keyword"]);
            $where.=" and (description like '%$keyword%' or email like '%$keyword%')";
        }

        $baseSql="
        SELECT a.`id`,  a.`description`,c.name as modalName,  a.`user_id`,  a.`modal_id`,  a.`createdTime`,b.email FROM `requirements` a join users b on a.user_id=b.id 
        LEFT JOIN modalbases c on c.id=a.modal_id where $where";

        $countSql="SELECT COUNT(1) as total FROM ($baseSql) a";
        $totalCount = $this->db->query($countSql)->row()->total;

        if(!is_int($pageIndex) || $pageIndex<1) {
            $pageIndex = 1;
        }
        $offset =($pageIndex -1)* $pageSize;
        $sql=$baseSql." order by createdTime desc limit $pageSize offset $offset";

        $query = $this->db->query($sql);
        $data = array("totalCount"=>$totalCount,"datas"=>$query->result(),"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }
	
	public function get($id)
	{
	    $sql="SELECT a.`id`,  a.`description`,  a.`user_id`,  a.`modal_id`,c.name,  a.`createdTime`,b.email FROM `requirements` a join users b on a.user_id=b.id 
              LEFT JOIN modalbases c on c.id=a.modal_id where a.id=$id";
		$result = $this->db->query($sql);
		
		return $result->row();
	}

	public function assignModal($id,$modalId)
    {
        $this->db->where("id",$id);
        $this->db->set("modal_id",$modalId);
        $this->db->update("requirements");
    }
}