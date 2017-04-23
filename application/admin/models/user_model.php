<?php
class user_model extends MY_Model
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
           $where.=" and (email like '%$keyword%' OR shippingName LIKE '%$keyword%' or shippingAddress like '%$keyword%')";
        }

        $baseSql="
        SELECT `id`, `email`, `image`, `telephone`, `note`, `shippingName`, `shippingAddress`, `createdTime`,points FROM `users` where $where";

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
		$result = $this->db->get_where("users",array("id"=>$id));
		
		return $result->row();
	}
}