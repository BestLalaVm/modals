<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/25/2017
 * Time: 3:38 PM
 */
class dbreader_model extends CI_Model
{
    function getmodalOverview($categoryId=null,$userId=null,$pageIndex=1,$pageSize=10)
    {
        $todayValue=date("Y-m-d",time());
        $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";
        if(!empty($categoryId)) {
            $where .= " and b.category_id=" . $categoryId;
        }

        $sql="SELECT a.id,a.name,b.thumbImage,b.isDownloadable,b.attachment,(SELECT t1.id FROM wishlists t1 where t1.modal_id = a.id and t1.user_id='$userId' limit 1) as wishId
		 FROM modalbases a join modals b on a.id=b.id where isdeleted=0 and a.isPublished=1 and isfrontmodal=0 ".$where;

        $sql=$sql." order by createdTime desc limit $pageSize";

        $modals = $this->db->query($sql)->result();
        $data=array();
        foreach ($modals as $item)
        {
            $di=array("id"=>$item->id,"name"=>$item->name,"thumbImage"=>$item->thumbImage,"isDownloadable"=>$item->isDownloadable,"attachment"=>$item->attachment,"wishId"=>$item->wishId);
            if(empty($item->attachment)){
                $di["isDownloadable"]=0;
            }
            $data[]=$di;
        }

        return $data;
    }

    function  getCategories()
    {
        $this->db->select("id,name");
        $query = $this->db->get("modalcategories");

        $categories =  $query->result();
        $data=array();
        foreach ($categories as $item)
        {
            $data[]=array("id"=>$item->id,"name"=>$item->name);
        }

        return $data;
    }

    function gethomeModalsByIds($modalIds,$userId)
    {
        if(is_null($modalIds) || count($modalIds)==0)
        {
            return array();
        }

        $mapedModalIds = array_map(function($v){
            return "'$v'";
        },$modalIds);

        $sql="SELECT a.id,a.name,b.thumbImage,b.isDownloadable,b.attachment,(SELECT t1.id FROM wishlists t1 where t1.modal_id = a.id and t1.user_id='$userId' limit 1) as wishId
		 FROM modalbases a join modals b on a.id=b.id where isdeleted=0 and a.isPublished=1 and a.id in (".implode(",",$mapedModalIds).")";

        $sql=$sql." order by createdTime desc limit 5";

        $modals = $this->db->query($sql)->result();
        $data=array();
        foreach ($modals as $item)
        {
            $di=array("id"=>$item->id,"name"=>$item->name,"thumbImage"=>$item->thumbImage,"isDownloadable"=>$item->isDownloadable,"attachment"=>$item->attachment,"wishId"=>$item->wishId);
            if(empty($item->attachment)){
                $di["isDownloadable"]=0;
            }
            $data[]=$di;
        }

        return $data;
    }

    function getmodalNews($pageIndex=1,$pageSize=10)
    {
        $todayValue=date("Y-m-d",time());
        $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";

        $sql="
        SELECT a.id,a.name,a.keyword,
				a.author,b.introducation,a.createdTime
		 FROM modalbases a join modalnews b on a.id=b.id where a.isDeleted =0 and a.isPublished=1 ".$where." order by a.createdTime desc
        ";

        if(!is_int($pageIndex) || $pageIndex<1) {
            $pageIndex = 1;
        }

        if(!is_int($pageSize) || $pageSize<0)
        {
            $pageSize=20;
        }

        $countSql="SELECT COUNT(1) as total FROM ($sql) as a";

        $totalCount = $this->db->query($countSql)->row()->total;

        $sql.=" limit ".$pageSize." offset ".(($pageIndex-1) * $pageSize);
        $query = $this->db->query($sql);

        $data = array("totalCount"=>$totalCount,"datas"=>$query->result(),"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }

    function getmodalNewsById($id)
    {
        $sql=
            "SELECT a.id,a.name,a.keyword,a.isPublished,a.createdTime,b.content,b.introducation FROM modalbases a join modalnews b on a.id=b.id
	         WHERE a.id = ? and a.isPublished=1 and a.isDeleted =0 ";
        $query = $this->db->query($sql,array($id));

        return $query->row();
    }

    function getmodalsOverview($filters,$pageIndex=1,$pageSize=10)
    {

        try{
            $todayValue=date("Y-m-d",time());
            $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";

            foreach ($filters as $key=>$value){
                if(isset($value)){
                    $sqlValue = $value;
                    switch ($key){
                        case "keyword":
                            $where.=" and (a.keyword like '%$sqlValue%' or a.name like '%$sqlValue%'or b.introducation like '%$sqlValue%')";
                            break;
                        case "author":
                            $where.=" and (a.author like '%$sqlValue%' or a.operatorUserName like '%$sqlValue%' )";
                            break;
                        case "dateFrom":
                            $where .= " and (publishedDateFrom >= '$sqlValue' OR publishedDateFrom is null) and (publishedDateTo>='$sqlValue' OR publishedDateTo is null)";
                            break;
                        case "dateTo":
                            $sqlValue = (new DateTime($sqlValue))->add(new DateInterval("P1D"))->format("Y-m-d");
                            $where .= " and (publishedDateFrom <= '$sqlValue' OR publishedDateFrom is null) and (publishedDateTo<='$sqlValue' OR publishedDateTo is null)";
                            break;
                        case "iscustomizeModal":
                            if($sqlValue=="2"){
                                $where .= " and (ispassed=1 or isfrontmodal=0)";
                            }else{
                                $where .= " and isfrontmodal=$sqlValue";
                                if($sqlValue=="1"){
                                    $where .= " and ispassed=1";
                                }
                            }
                            break;
                    }
                }
            }
            $userId=$filters["userId"];

            $sql="
        SELECT a.id,a.name,b.thumbImage,
               b.image,b.isDownloadable,
               b.introducation,b.attachment,
               a.author,a.createdTime,
               defaultMeterial_Id as meterial_Id,				
			   (SELECT t1.id FROM wishlists t1 where t1.modal_id = a.id and t1.user_id='$userId' limit 1) as wishId
		 FROM modalbases a join modals b on a.id=b.id 
         where isdeleted=0 and a.isPublished=1 ".$where." order by a.createdTime desc
        ";
            if(!is_int($pageIndex) || $pageIndex<1) {
                $pageIndex = 1;
            }

            if(!is_int($pageSize) || $pageSize<0)
            {
                $pageSize=20;
            }

            $countSql="SELECT COUNT(1) as total FROM ($sql) as a";

            $totalCount = $this->db->query($countSql)->row()->total;

            $sql.=" limit ".$pageSize." offset ".(($pageIndex-1) * $pageSize);

            $query = $this->db->query($sql);

            $modals = $query->result();

            $data = array("totalCount"=>$totalCount,"datas"=>$modals,"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

            return $data;
        }
        catch (Exception $e){
            var_dump($e);
        }

        return array();
    }

    public function getmodalByid($id,$userId)
    {
        $todayValue=date("Y-m-d",time());
        $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";
        //$where="";
        $sql=
            "SELECT
			  a.id,a.name,a.keyword,b.introducation,a.createdTime,
			  b.attachment,b.attachmentSize,b.isDownloadable,
			  b.image,b.description,c.tag_id,c.tagName, d.meterial_Id,b.shownType,
			  b.shownDescription,b.shownVedio,f.id as media_id,
			  f.path,f.relativePath2,f.relativePath3,k1.name as categoryName,
			  b.description,(SELECT t1.id FROM wishlists t1 where t1.modal_id = a.id and t1.user_id='$userId' limit 1) as wishId,
 			  d.meterial_Id,d.meterialName,d.meterialColor,d.meterialPrice,d.meterialSize,d.meterialSmallImage,d.meterialSpecial,
                          d.meterialAccuracy,d.meterialWorkday
		 FROM modalbases a join modals b on a.id=b.id join modalcategories k1 ON k1.id=b.category_id 
		      left join (select t2.tag_id,t1.name as tagName,t2.modal_id from modaltags t1 join modalbases_tags t2 on t1.id=t2.tag_id) as c on c.modal_id=a.id 		      
		      left join (select t2.modal_id,t2.meterial_Id,t1.name as meterialName,t1.color as meterialColor,t1.price as meterialPrice,t1.size as meterialSize,
		                        t1.smallImage as meterialSmallImage,t1.special as meterialSpecial,t1.accuracy as meterialAccuracy,t1.workday as meterialWorkday 
		                 from modalmeterials t1 join modal_meterials t2 on t1.id=t2.meterial_Id) as d on d.modal_id=a.id
			  left join modalmedias f on f.modal_id= a.id
	     where isdeleted=0 and a.isPublished=1 and a.id = ? ".$where;
        $query = $this->db->query($sql,array($id));

        $data = $query->result();

        $newData = array("tags"=>array(),"meterials"=>array(),"shownImages"=>array());

        $tmpTagIds = array();
        $tmpmeteriaIds = array();
        foreach($data as $item)
        {
            $newData["id"]=$item->id;
            $newData["wishId"]=$item->wishId;
            $newData["name"]=$item->name;
            $newData["createdTime"]=$item->createdTime;
            $newData["keyword"]=$item->keyword;
            $newData["attachment"]=$item->attachment;
            $newData["attachmentSize"]=$item->attachmentSize;
            $newData["isDownloadable"]=$item->isDownloadable;
            $newData["image"]=$item->image;
            $newData["description"]=$item->description;
            $newData["shownVedio"]=$item->shownVedio;
            $newData["shownType"]=$item->shownType;
            $newData["shownDescription"]=$item->shownDescription;
            $newData["introducation"]=$item->introducation;
            $newData["description"]=$item->description;
            $newData["categoryName"]=$item->categoryName;
            if(empty($item->attachment)){
                $newData["isDownloadable"]=0;
            }

            if(!in_array($item->tag_id, $tmpTagIds))
            {
                $newData["tags"][]=array("id"=>$item->tag_id,"name"=>$item->tagName);
                $tmpTagIds[]=$item->tag_id;
            }
            if(!in_array($item->meterial_Id, $tmpmeteriaIds))
            {
                $newData["meterials"][]=array("id"=>$item->meterial_Id,"name"=>$item->meterialName,"color"=>$item->meterialColor,
                                              "price"=>$item->meterialPrice,"size"=>$item->meterialSize,"smallImage"=>$item->meterialSmallImage,
                                              "special"=>$item->meterialSpecial,"accuracy"=>$item->meterialAccuracy,"workday"=>$item->meterialWorkday);
                $tmpmeteriaIds[]=$item->meterial_Id;
            }

            $ismediaExists=false;
            foreach ($newData["shownImages"] as $imageItem)
            {
                $ismediaExists = $imageItem["id"]==$item->media_id;
                if($ismediaExists)
                {
                    break;
                }
            }

            if(!$ismediaExists && isset($item->media_id))
            {
                $newData["shownImages"][]=array("id"=>$item->media_id,
                    "path"=>$item->path,"relativePath2"=>$item->relativePath2,"relativePath3"=>$item->relativePath3);
            }
        }

        return $newData;
    }

    public function getmodalsOverviewByTagIds($relativeTagids,$excludeModalId)
    {
        $todayValue=date("Y-m-d",time());
        $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";
        if(!empty($excludeModalId)) {
            $where .= " and a.id<> '{$excludeModalId}'";
        }

        $tagWhere="";
        foreach ($relativeTagids as $rmodalId)
        {
            if(!empty($tagWhere))
            {
                $tagWhere.=",";
            }
            $tagWhere.="'{$rmodalId}'";
        }
        if(!empty($tagWhere))
        {
            $where.=" and exists(select 1 from modalbases_tags t1 where t1.modal_id=a.id and t1.tag_id in ($tagWhere)) ";
        }

        $sql="SELECT a.id,a.name,b.thumbImage,b.introducation,b.attachment,b.isDownloadable
		 FROM modalbases a join modals b on a.id=b.id where isdeleted=0 and a.isPublished=1 ".$where;

        $sql=$sql." order by createdTime desc limit 8";

        $modals = $this->db->query($sql)->result();
        $data=array();
        foreach ($modals as $item)
        {
            $data[]=array("id"=>$item->id,"name"=>$item->name,"thumbImage"=>$item->thumbImage,"introducation"=>$item->introducation,"attachment"=>$item->attachment,"isDownloadable"=>$item->isDownloadable);
        }

        return $data;
    }

    public function getmodalNewsOverviewByTagIds($relativeTagids)
    {
        $todayValue=date("Y-m-d",time());
        $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";

        $tagWhere="";
        foreach ($relativeTagids as $rmodalId)
        {
            if(!empty($tagWhere))
            {
                $tagWhere.=",";
            }
            $tagWhere.="'{$rmodalId}'";
        }
        if(!empty($tagWhere))
        {
            $where.=" and exists(select 1 from modalbases_tags t1 where t1.modal_id=a.id and t1.tag_id in ($tagWhere)) ";
        }

        $sql="SELECT a.id,a.name,b.introducation,a.createdTime
		 FROM modalbases a join modalnews b on a.id=b.id where isdeleted=0 and a.isPublished=1 ".$where;

        $sql=$sql." order by createdTime desc limit 8";

        $modals = $this->db->query($sql)->result();
        $data=array();
        foreach ($modals as $item)
        {
            $data[]=array("id"=>$item->id,"name"=>$item->name,"introducation"=>$item->introducation,"createdTimeLabel"=>(new DateTime($item->createdTime))->format("Y年m月d日"));
        }

        return $data;
    }

    public function searchModalBases($keyword,$pageIndex=0,$pageSize)
    {
        $todayValue=date("Y-m-d",time());
        $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";
        if(!empty($keyword))
        {
            $where.=" and (a.keyword like '%$keyword%' OR b.introducation like '%$keyword%' OR c.introducation like '%$keyword%' OR a.name like '%$keyword%')";
        }
        $sql="
        SELECT a.id,a.name,a.keyword,
			   a.author,
			   b.introducation,
			   a.createdTime,
			   c.introducation as modalIntroducation,
			   c.thumbImage,
			   c.id as modalId,
			   b.id as modalNewId,
			   c.attachment,
			   c.isDownloadable
		 FROM modalbases a 
		 left join modalnews b on a.id=b.id 
		 left join modals c on c.id=a.id
		 where a.isPublished=1 and a.isDeleted=0 and (c.ispassed=1 or c.isfrontmodal=0)  ".$where." order by a.createdTime desc
        ";

        if(is_string($pageIndex))
        {
            $pageIndex=(int)$pageIndex;
        }
        if(is_string($pageSize))
        {
            $pageSize=(int)$pageSize;
        }
        if($pageIndex<1) {
            $pageIndex = 1;
        }

        if($pageSize<0)
        {
            $pageSize=20;
        }

        $countSql="SELECT COUNT(1) as total FROM ($sql) as a";

        $totalCount = $this->db->query($countSql)->row()->total;

        $sql.=" limit ".$pageSize." offset ".(($pageIndex-1) * $pageSize);
        $query = $this->db->query($sql);

        $data = array("totalCount"=>$totalCount,"datas"=>$query->result(),"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }
}