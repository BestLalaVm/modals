<?php
class modal_model extends MY_Model
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
	public $shownType;
	public $shownDescription;
	public $shownVedio;
	
	public function getAll($filter,$isfrontmodal=0,$pageIndex=0,$pageSize=20){
	    $where=" isfrontmodal=$isfrontmodal ";
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

                    $where = $where." and $fileterKey like '%$filterValue%'";
                }
            }
        }

        $baseSql="
        SELECT a.id,a.name,a.keyword,b.ispassed,
				a.author,a.isPublished,a.operatorUserName,
				a.lastUpdatedTime,
				a.publishedDateFrom,a.publishedDateTo,b.smallImage
		 FROM modalbases a join modals b on a.id=b.id where isdeleted=0 and ".$where;

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
	
	public function save($data)
	{
		$modalBaseData = array("id"=>uniqid(),"name"=>$data["name"],"keyword"=>$data["keyword"],
							   "isPublished"=>$data["isPublished"],"publishedDateFrom"=>$data["publishedDateFrom"],
							   "publishedDateTo"=>$data["publishedDateTo"],"lastUpdatedTime"=>date("Y-m-d H:i:s"),"author"=>$data["author"]);
		
		$modalData = array("description"=>$data["description"],"attachment"=>$data["attachment"],"attachmentSize"=>$data["attachmentSize"],
						   "category_id"=>$data["category_id"],"isDownloadable"=>$data["isDownloadable"],
						   "image"=>$data["image"],"thumbImage"=>$data["thumbImage"],"smallImage"=>$data["smallImage"],
						   "shownType"=>$data["shownType"],"shownVedio"=>$data["shownVedio"],
                           "shownDescription"=>$data["shownDescription"],
                           "introducation"=>$data["introducation"]
		);

        if(empty($modalBaseData["publishedDateFrom"]))
        {
            $modalBaseData["publishedDateFrom"]=null;
        }
        if(empty($modalBaseData["publishedDateTo"]))
        {
            $modalBaseData["publishedDateTo"]=null;
        }
        if(count($data["meterials"])>0)
        {
            $modalData["defaultMeterial_Id"]=$data["meterials"][0];
        }
		$this->db->trans_begin();
		if(isset($data["id"]))
		{		
			$modalBaseData["id"]=$data["id"];
			$this->db->delete("modalbases_tags",array("modal_id"=>$data["id"]));
			$this->db->delete("modal_meterials",array("modal_id"=>$data["id"]));
			
			$this->db->where("id",$data["id"]);			
			
			$this->db->update("modalbases",$modalBaseData);		
			$this->db->where("id",$data["id"]);
			$this->db->update("modals",$modalData);	
		}else {
			$modalBaseData["id"] = uniqid();
			$modalBaseData["createdTime"]=date("Y-m-d H:i:s");
			$modalBaseData["operatorUserName"]=$data["operatorUserName"];
			$modalData["id"]=$modalBaseData["id"];
			
			$this->db->insert("modalbases",$modalBaseData);
			$this->db->insert("modals",$modalData);
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
		$modalImages = array();
		$existsImageIds= array();
		for($index=0;$index<count($data["shownImages"]);$index=$index+4)
		{
			$imageItem =$data["shownImages"];
			if(isset($data["shownImages"][$index]))
			{
				$modalImages[]=array("path"=>$data["shownImages"][$index+1],
									"relativePath2"=>$data["shownImages"][$index+2],
									"relativePath3"=>$data["shownImages"][$index+3],
									"modal_id"=>$modalBaseData["id"]);
			}else{
				$existsImageIds[] = $data["shownImages"][$index];
			}
		}
		
		$this->db->delete("modalmedias",array("modal_id"=>$modalBaseData["id"]));
		if(count($modalImages)>0)
        {
            $this->db->insert_batch("modalmedias",$modalImages);
        }
		
		$newMeterials = array();
		foreach ($data["meterials"] as $meterialId)
		{
			$newMeterials[]=array("meterial_Id"=>$meterialId,"modal_id"=>$modalBaseData["id"],"createdTime"=>date("Y-m-d H:i:s"));
		}
		
		if(count($newMeterials)>0)
		{
			$this->db->insert_batch("modal_meterials",$newMeterials);
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
		"SELECT
			  a.id,b.isfrontmodal,b.ispassed,a.name,a.keyword,a.isPublished,a.publishedDateFrom,a.publishedDateTo,a.lastUpdatedTime,b.introducation,a.author,a.operatorUserName,
			  b.attachment,b.attachmentSize,b.category_id,b.isDownloadable,b.image,b.thumbImage,b.smallImage,b.description,
			  c.tag_id,d.meterial_Id,b.shownType,b.shownDescription,b.shownVedio,f.id as media_id,f.path,f.relativePath2,f.relativePath3
		 FROM modalbases a join modals b on a.id=b.id left join modalbases_tags c on c.modal_id=a.id left join modal_Meterials d on d.modal_id=a.id
			  left join modalmedias f on f.modal_id= a.id
	     where isdeleted=0 and a.id = ?";
		$query = $this->db->query($sql,array($id));
		
		$data = $query->result();
		
		$newData = array("tags"=>array(),"meterials"=>array(),"shownImages"=>array());
		foreach($data as $item)
		{
			$newData["id"]=$item->id;
			$newData["name"]=$item->name;
            $newData["author"]=$item->author;
			$newData["keyword"]=$item->keyword;
			$newData["isPublished"]=$item->isPublished;
			$newData["lastUpdatedTime"]=$item->lastUpdatedTime;
			$newData["publishedDateFrom"]=$item->publishedDateFrom;
			$newData["publishedDateTo"]=$item->publishedDateTo;
			$newData["attachment"]=$item->attachment;
			$newData["attachmentSize"]=$item->attachmentSize;
			$newData["category_id"]=$item->category_id;
			$newData["isDownloadable"]=$item->isDownloadable;
			$newData["image"]=$item->image;
			$newData["thumbImage"]=$item->thumbImage;
			$newData["smallImage"]=$item->smallImage;
			$newData["description"]=$item->description;
			$newData["shownVedio"]=$item->shownVedio;
			$newData["shownType"]=$item->shownType;
			$newData["shownDescription"]=$item->shownDescription;
            $newData["introducation"]=$item->introducation;
            $newData["author"]=$item->author;
            $newData["isfrontmodal"]=$item->isfrontmodal;
            $newData["ispassed"]=$item->ispassed;
            if(empty($item->author)){
                $newData["author"] = $item->operatorUserName;
            }
			if(!empty($item->publishedDateFrom)){
                $newData["publishedDateFrom"] = (new DateTime($item->publishedDateFrom))->format("Y-m-d");
            }
            if(!empty($item->publishedDateTo)){
                $newData["publishedDateTo"] = (new DateTime($item->publishedDateTo))->format("Y-m-d");
            }

			if(!in_array($item->tag_id, $newData["tags"]))
			{
				$newData["tags"][]=$item->tag_id;
			}
			if(!in_array($item->meterial_Id, $newData["meterials"]))
			{
				$newData["meterials"][]=$item->tag_id;
			}
			
			$ismediaExists=false;
			foreach ($newData["shownImages"] as $imageItem)
			{
				$ismediaExists = $imageItem["id"]==$item->media_id;
			}
			
			if(!$ismediaExists && isset($item->media_id))
			{
				$newData["shownImages"][]=array("id"=>$item->media_id,
						"path"=>$item->path,"relativePath2"=>$item->relativePath2,"relativePath3"=>$item->relativePath3);
			}
		}
		
		return $newData;
	}
	
	public function delete($id)
	{
		$this->db->trans_begin();
		
		$this->db->where("id",$id);
		$this->db->set("isdeleted",1);
		$this->db->update("modalbases");
		
		if($this->db->trans_status()==FALSE)
		{
			$this->db->trans_rollback();
		}else {
		   $this->db->trans_commit();	
		}
	}

	public function getOptions($pageIndex=0,$pageSize=10)
    {
        $baseSql="SELECT a.id,a.name,b.introducation,b.smallImage,a.createdTime FROM `modalbases` a join modals b on a.id=b.id where isDeleted=0";

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

    public function audit($id,$ispassed)
    {
        $this->db->where("id",$id);
        $this->db->set("ispassed",$ispassed);
        $this->db->update("modals");
    }
}