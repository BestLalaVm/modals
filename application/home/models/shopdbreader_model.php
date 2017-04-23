<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/1/2017
 * Time: 9:27 PM
 */
class shopdbreader_model extends MY_Model
{
    function gettop10modalOverview()
    {
        $todayValue=date("Y-m-d",time());
        $where = " and (publishedDateFrom <= '$todayValue' OR publishedDateFrom is null) and (publishedDateTo>='$todayValue' OR publishedDateTo is null)";
        if(!empty($categoryId)) {
            $where .= " and b.category_id=" . $this->escapeSqlValue($categoryId);
        }

        $sql="SELECT a.id,a.name,b.thumbImage,b.image,b.isDownloadable,b.introducation,b.attachment,
                     b.defaultMeterial_Id as meterial_Id
        FROM modalbases a 
        join modals b on a.id=b.id 
		 where isdeleted=0 and a.isPublished=1 ".$where;

        $sql=$sql." order by createdTime desc limit 10";

        $modals = $this->db->query($sql)->result();

        $modalresult=array();
        foreach($modals as $item)
        {
            $tmp1=array("id"=>$item->id,"name"=>$item->name,"thumbImage"=>$item->thumbImage,"image"=>$item->image,
                "meterials"=>array(),"isDownloadable"=>$item->isDownloadable,"attachment"=>$item->attachment,"introducation"=>$item->introducation);

            $modalresult[]=$tmp1;
        }

        return $modalresult;
    }

    public function getMeterials($pageIndex=0,$pageSize=5)
    {
        $sql="SELECT 
                `name`,`price`,`accuracy`,`thumbImage`,`image`,`suitableProduct`,`unSuitableProduct`,special
              FROM `modalmeterials`";

        $countSql="SELECT COUNT(1) as total FROM ($sql) as a";

        $totalCount = $this->db->query($countSql)->row()->total;

        if($pageIndex<=0)
        {
            $pageIndex=1;
        }
        $offset = ($pageIndex-1) * $pageSize;
        $sql.=" ORDER by createdTime desc limit $pageSize offset $offset";
        $query = $this->db->query($sql);

        $result = $query->result();
        $data = array("totalCount"=>$totalCount,"datas"=>$result,"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }

    function getProfileRequirements($userId,$pageIndex=1,$pageSize=10)
    {
        $sql="
        SELECT a.`id`, `description`, `user_id`, `modal_id`, a.`createdTime`,b.name as modalName  FROM `requirements` a left JOIN modalbases b on a.modal_id=b.id 
        WHERE user_id='$userId' order by a.createdTime desc
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

    function getProfileWishlist($userId,$pageIndex=1,$pageSize=10)
    {
        $sql="
        SELECT a.`id`, `modal_id`, b.name,c.introducation, a.`createdTime`,c.smallImage,
              (select id from shoppingcarts t1 where t1.modal_id=c.id limit 1) as shoppingCartId,
              c.defaultMeterial_Id as meterial_id
        FROM `wishlists` a join modalbases b on a.modal_id=b.id 
        join modals c on c.id=b.id WHERE user_id='$userId' order by a.createdTime desc
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

    function getProfileShoppingCarts($userId)
    {
        $sql="
SELECT b.id as modal_id,b.name,c.smallImage,c.introducation,  `color`, a.meterial_Id as shoppingcartMeterialId,
       `price`, `accuracy`, d.`size`, `technology`, `workday`, `special`, 
       `suitableProduct`, `unSuitableProduct`,  
        `smallImage` as meterialSmallImage,d.meterial_Id,meterialName,meterialThumbImage
FROM `shoppingcarts` a join modalbases b on a.modal_id=b.id join modals c on c.id=b.id 
left JOIN (select t1.meterial_Id,t1.modal_id, `name` as meterialName, `color`, `price`, `accuracy`, `size`, `technology`, `workday`, `special`, `suitableProduct`, `unSuitableProduct`, 
                  `description`,`smallImage` as meterialThumbImage from modal_meterials t1 join modalmeterials t2 on t1.meterial_Id=t2.id) d 
on d.modal_id=c.id where user_id='$userId' order by a.createdTime desc
        ";

        $query = $this->db->query($sql);

        $modals = $query->result();

        $modalresult=array();
        foreach($modals as $item)
        {
            $isExistsmodals=false;

            foreach ($modalresult as &$v)
            {
                if($item->modal_id==$v["id"])
                {
                    $isExistsmodals=true;
                    $isMeterialExists=false;
                    foreach ($v["meterials"] as $vt)
                    {
                        if($vt["id"]==$item->meterial_Id)
                        {
                            $isMeterialExists=true;
                        }
                    }
                    if(!$isMeterialExists)
                    {
                        $v["meterials"][]=array("id"=>$item->meterial_Id,"name"=>$item->meterialName,"color"=>$item->color,"price"=>$item->price,
                            "accuracy"=>$item->accuracy,"size"=>$item->size,"technology"=>$item->technology,"workday"=>$item->workday,
                            "special"=>$item->special,"suitableProduct"=>$item->suitableProduct,"unSuitableProduct"=>$item->unSuitableProduct,"meterialSmallImage"=>$item->meterialSmallImage
                        );
                    }
                }
            }

            if(!$isExistsmodals)
            {
                $tmp1=array("id"=>$item->modal_id,"name"=>$item->name,"smallImage"=>$item->smallImage,"introducation"=>$item->introducation,"shoppingcartMeterialId"=>$item->shoppingcartMeterialId,
                    "meterials"=>array());
                $tmp1["meterials"][]=array("id"=>$item->meterial_Id,"name"=>$item->meterialName,"color"=>$item->color,"price"=>$item->price,
                    "accuracy"=>$item->accuracy,"size"=>$item->size,"technology"=>$item->technology,"workday"=>$item->workday,
                    "special"=>$item->special,"suitableProduct"=>$item->suitableProduct,"unSuitableProduct"=>$item->unSuitableProduct,"meterialSmallImage"=>$item->meterialSmallImage
                    );

                $modalresult[]=$tmp1;
            }
        }

        $data = array("datas"=>$modalresult,"count"=>count($modalresult));

        return $data;
    }

    function getProfileQuestions($userId,$pageIndex=1,$pageSize=10)
    {
        $sql="
        SELECT `id`, `question`, `answer`,`answerTime`, `createdTime` FROM `questions` WHERE user_id='$userId' order by id desc
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

        $questions = $query->result();


        $data = array("totalCount"=>$totalCount,"datas"=>$questions,"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }

    function getProfileMessages($userId,$pageIndex=1,$pageSize=10)
    {
        $sql="
        SELECT `id`, `content`,`createdTime` FROM `messages` WHERE user_id='$userId' order by id desc
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

        $messages = $query->result();


        $data = array("totalCount"=>$totalCount,"datas"=>$messages,"pageIndex"=>$pageIndex,"pageSize"=>$pageSize);

        return $data;
    }

    function getProfileModals($email,$pageIndex=1,$pageSize=10)
    {
        $email = $this->escapeSqlValue($email);
        $where=" operatorUserName=$email";
        $baseSql="
        SELECT a.id,a.name,a.keyword,
				a.author,a.isPublished,
				a.lastUpdatedTime,
				a.publishedDateFrom,a.publishedDateTo,b.smallImage,b.defaultMeterial_Id as meterialId
		 FROM modalbases a join modals b on a.id=b.id where isdeleted=0 and isfrontmodal=1 and ".$where;

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

    public function getmodalTagOptions()
    {
        $this->db->select("id,name");
        $this->db->order_by("name","asc");
        $query = $this->db->get("modalTags");

        return $query->result();
    }

    public function getmodalMeterialOptions()
    {
        $this->db->select("id,name");
        $this->db->order_by("name","asc");
        $query = $this->db->get("modalMeterials");

        return $query->result();
    }

    public function getmodalCategoryOptions()
    {
        $this->db->select("id,name");
        $this->db->order_by("name","asc");
        $query = $this->db->get("modalCategories");

        return $query->result();
    }
}