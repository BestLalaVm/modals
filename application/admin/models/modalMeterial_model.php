<?php
class modalMeterial_model extends MY_Model
{
	public $id;
	public $name;
	public $color;
	public $price;
	public $accuracy;
	public $size;
	public $technology;
	public $workday;
	public $special;
	public $suitableProduct;
	public $unSuitableProduct;
	public $image;
	public $thumbImage;
	public $smallImage;
	public $meterialCategory_ID;
	public $description;
	public $createdTime;

	public function getAll(){
		$sql=
		"SELECT a.id,a.name,a.color,
				a.price,a.accuracy,a.size,a.technology,a.workday,
				a.smallImage,b.name as categoryName,a.createdTime 
		FROM modalmeterials a left join modalmaterialcategories b on a.meterialCategory_ID=b.id order by a.id desc";
		$query = $this->db->query($sql);

		return $query->result();
	}

	public function save($data)
	{
		if(isset($data["id"]))
		{
			$this->db->where("id",$data["id"]);
			$dbData=array(
					"name"=>$data["name"],"color"=>$data["color"],"price"=>$data["price"],
					"accuracy"=>$data["accuracy"],"size"=>$data["size"],"technology"=>$data["technology"],
					"workday"=>$data["workday"],"special"=>$data["special"],"suitableProduct"=>$data["suitableProduct"],
					"unSuitableProduct"=>$data["unSuitableProduct"],"description"=>$data["description"],"image"=>$data["image"],
					"thumbImage"=>$data["thumbImage"],"smallImage"=>$data["smallImage"],"meterialCategory_ID"=>$data["meterialCategory_ID"]
			);
			$this->db->update("modalMeterials",$dbData);
				
			return $data["id"];
		}else {
			$dbData=array(
					"name"=>$data["name"],"color"=>$data["color"],"price"=>$data["price"],
					"accuracy"=>$data["accuracy"],"size"=>$data["size"],"technology"=>$data["technology"],
					"workday"=>$data["workday"],"special"=>$data["special"],"suitableProduct"=>$data["suitableProduct"],
					"unSuitableProduct"=>$data["unSuitableProduct"],"description"=>$data["description"],"image"=>$data["image"],
					"thumbImage"=>$data["thumbImage"],"smallImage"=>$data["smallImage"],"meterialCategory_ID"=>$data["meterialCategory_ID"]
			);
			$dbData["createdTime"]=date("Y-m-d H:i:s");
				
			$this->db->insert("modalMeterials",$dbData);
			return $this->db->insert_id();
		}
	}

	public function get($id)
	{
		$result = $this->db->get_where("modalMeterials",array("id"=>$id));

		return $result->row();
	}

	public function delete($id)
	{
	    $this->db->select("count(1) as count");
	    $result = $this->db->get_where("modalMeterials",array("id"=>$id));
	    if($result->row()->count>0)
        {
            throw new Exception("该材料已被模型库使用, 请更改对应模型(用户模型及系统模型)之后在进行删除!");
        }

		$this->db->where("id",$id)->delete("modalMeterials");
	}
	
	public function getOptions()
	{
		$this->db->select("id,name");
		$this->db->order_by("name","asc");
		$query = $this->db->get("modalMeterials");
	
		return $query->result();
	}
}