<?php
class MY_Model extends CI_Model
{
	public $id;
	public $name;
	public $keyword;
	public $isPublished;
	public $publishedTime;
	public $operatorUserName;
	public $operatorName;
	public $createdTime;
	
	function __construct()
	{
		parent::__construct();
	}

    protected function escapeSqlValue($value)
    {
        return $this->db->escape($value);
    }

    protected function escapeLikeSqlValue($value)
    {
        return $this->db->escape_like_str($value);
    }
}