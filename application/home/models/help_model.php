<?php
class help_model extends CI_Model
{
    const INTRODUCATION = "introducation";
    const HELPCENTER = "helpcenter";

	public function get($id)
	{		
		$result = $this->db->get_where("helps",array("id"=>$id));
		
		return $result->row();
	}
}