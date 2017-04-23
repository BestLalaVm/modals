<?php
class modalNew_model extends MY_Model
{
	public $id;
	public $name;
	public $keyword;
	public $isPublished;
	public $publishedDateFrom;
	public $publishedDateTo;
	public $operatorUserName;
	public $operatorName;
	public $createdTime;
	public $content;
	
	public function getAll($filter,$pageIndex=0,$pageSize=20){
        $where=" 1=1 ";
        if($filter && is_array($filter))
        {
            foreach ($filter as $fileterKey=>$filterValue)
            {
                if(!empty($filterValue))
                {
                    if($fileterKey=="startDate")
                    {
                        $where = $where." and (publishedDateFrom >= '$filterValue' OR publishedDateFrom is null) and (publishedDateTo>='$filterValue' OR publishedDateTo is null)";
                        continue;
                    }else if($fileterKey=="endDate")
                    {
                        $where = $where." and (publishedDateTo <= '$filterValue' OR publishedDateTo is null) and (publishedDateFrom<='$filterValue' OR publishedDateFrom is null)";
                        continue;
                    }

                    $filterValue = $this->escapeLikeSqlValue($filterValue);
                    $where = $where." and $fileterKey like '%$filterValue%'";
                }
            }
        }
        $baseSql="
        SELECT a.id,a.name,a.keyword,
				a.author,a.isPublished,
				a.lastUpdatedTime,
				a.publishedDateFrom,a.publishedDateTo
		 FROM modalbases a join modalnews b on a.id=b.id and ".$where;

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

		$sql=
		"SELECT a.id,a.name,a.keyword,
				a.author,a.isPublished,
				a.lastUpdatedTime,
				a.publishedDateFrom,a.publishedDateTo
		 FROM modalbases a join modalnews b on a.id=b.id order by a.createdTime DESC";
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	public function save($data)
	{
		$modalBaseData = array("id"=>uniqid(),"name"=>$data["name"],"keyword"=>$data["keyword"],
							   "isPublished"=>$data["isPublished"],"publishedDateFrom"=>$data["publishedDateFrom"],
							   "publishedDateTo"=>$data["publishedDateTo"],"lastUpdatedTime"=>date("Y-m-d H:i:s"));
		
		$modalNewData = array("content"=>$data["content"],"introducation"=>$data["introducation"]);

		if(empty($modalBaseData["publishedDateFrom"]))
        {
            $modalBaseData["publishedDateFrom"]=null;
        }
        if(empty($modalBaseData["publishedDateTo"]))
        {
            $modalBaseData["publishedDateTo"]=null;
        }

		$this->db->trans_begin();
		if(isset($data["id"]))
		{		
			$modalBaseData["id"]=$data["id"];
			$this->db->delete("modalbases_tags",array("modal_id"=>$data["id"]));
			
			$this->db->where("id",$data["id"]);			
			
			$this->db->update("modalbases",$modalBaseData);		
			$this->db->where("id",$data["id"]);
			$this->db->update("modalNews",$modalNewData);	
		}else {
			$modalBaseData["id"] = uniqid();
			$modalBaseData["createdTime"]=date("Y-m-d H:i:s");
			$modalBaseData["operatorUserName"]=$data["operatorUserName"];
			$modalBaseData["author"]=$data["author"];
			$modalNewData["id"]=$modalBaseData["id"];
			
			$this->db->insert("modalbases",$modalBaseData);
			$this->db->insert("modalnews",$modalNewData);
		}
		
		$newTags = array();
		foreach ($data["tags"] as $tagId)
		{
			$newTags[]=array("tag_id"=>$tagId,"modal_id"=>$modalBaseData["id"],"createdTime"=>date("Y-m-d H:i:s"));
		}
		
		if(count($newTags)>0)
		{
			$this->db->insert_batch("modalbases_tags",$newTags);
		}	
		
		if($this->db->trans_status()==FALSE)
		{
			$this->db->trans_rollback();
		}else {
			$this->db->trans_commit();
		}
		
		return $data["id"];
	}
	
	public function get($id)
	{	
		$sql=
		"SELECT DISTINCT a.id,a.name,a.keyword,a.isPublished,a.lastUpdatedTime,
		     a.publishedDateFrom,a.publishedDateTo,b.content,c.tag_id,b.introducation
		 FROM modalbases a join modalnews b on a.id=b.id left join modalbases_tags c on c.modal_id=a.id
	     WHERE a.id = ?";
		$query = $this->db->query($sql,array($id));
		
		$data = $query->result();
		
		$newData = array();
		foreach($data as $item)
		{
			$newData["id"]=$item->id;
			$newData["name"]=$item->name;
			$newData["keyword"]=$item->keyword;
			$newData["isPublished"]=$item->isPublished;
			$newData["lastUpdatedTime"]=$item->lastUpdatedTime;
			$newData["publishedDateFrom"]=$item->publishedDateFrom;
			$newData["publishedDateTo"]=$item->publishedDateTo;
			$newData["content"]=$item->content;
            $newData["introducation"]=$item->introducation;
			
			$newData["tags"][]=$item->tag_id;
		}
		
		return $newData;
	}
	
	public function delete($id)
	{
		$this->db->trans_begin();
		
		$this->db->delete("modalbases_tags",array("modal_id"=>$id));
		$this->db->delete("modalnews",array("id"=>$id));
		$this->db->delete("modalbases",array("id"=>$id));
		
		if($this->db->trans_status()==FALSE)
		{
			$this->db->trans_rollback();
		}else {
		   $this->db->trans_commit();	
		}
	}
}