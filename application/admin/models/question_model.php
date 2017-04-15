<?php
class question_model extends CI_Model
{
	public $id;
	public $userName;
	public $password;
	public $isSuper;
	public $createdTime;

    public function getAll($filter,$pageIndex=0,$pageSize=20)
    {
        $where=" 1=1 ";
        if($filter && is_array($filter))
        {
            foreach ($filter as $fileterKey=>$filterValue)
            {
                if(!empty($filterValue))
                {
                    switch ($fileterKey)
                    {
                        case "keyword":
                            $where.=" and (question like '%$filterValue%' or answer like '%$filterValue%')";
                            break;
                        case "startDate":
                            $where.=" and (a.createdTime >='$filterValue')";
                            break;
                        case "endDate":
                            $where.=" and (a.createdTime <='$filterValue')";
                            break;
                    }
                }
            }
        }
        $baseSql="
        SELECT a.`id`, a.`question`, a.`answer`, b.email, `answerTime`, a.`createdTime` FROM `questions` a join users b on a.user_id = b.id where $where";

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
        $sql="
        SELECT a.`id`, a.`question`, a.`answer`, b.email, `answerTime`, a.`createdTime` FROM `questions` a join users b on a.user_id = b.id where a.id=$id";
		$result = $this->db->query($sql);
		
		return $result->row();
	}

    public function save($id,$answer)
    {
        $this->db->where("id",$id);
        $this->db->set("answer",$answer);
        $this->db->set("answerTime",date("Y-m-d H:i:s"));

        $this->db->update("questions");
    }
}