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
}