<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dbSecurity  extends My_Controller
{
    //const DB_BACKUP_DIR="assets/db/security/backup/";
    const DB_BACKUPFILEPATH="assets/db/security/backup/3dmodal-backup.sql";
    function __construct()
    {
        parent::__construct();

        $this->load->helper("file");
    }

	public function index()
	{
		$this->layout->title("Database backup");

		$bklist = array();

		/*
		if($filelist= get_filenames("assets/db/security/backup",false))
        {
            foreach($filelist as $item)
            {
                $bklist[]=array("fileName"=>$item,"downloadUrl"=>site_url(DB_BACKUP_DIR.$item),"createdTime"=>date("Y-m-d h:m:s",filemtime(self::DB_BACKUPFILEPATH)));
            }
        }
        */

        $data = array("isbackupExists"=>is_file(self::DB_BACKUPFILEPATH),"backupLink"=>site_url("../".self::DB_BACKUPFILEPATH),"backupTime"=>"","backupFileName"=>"");
        if(is_file(self::DB_BACKUPFILEPATH))
        {
            $data["backupTime"] = date("Y-m-d h:m:s",filemtime(self::DB_BACKUPFILEPATH));
            $data["backupFileName"] =basename(self::DB_BACKUPFILEPATH);
        }

		$this->layout->view("dbSecurity/index",$data);
	}

	public function backup()
    {
        if(!$this->is_post())
        {
            $data=array("success"=>false,"message"=>"It is not allowed to call this method without post");

            echo json_encode($data);
            return;
        }
        $this->load->dbutil();
        $backup = $this->dbutil->backup(array("format"=>"sql","newline"=>"\r\n "));

        $this->load->helper("directory");
        ensureDirectory(self::DB_BACKUPFILEPATH);
        $this->load->helper("file");
        write_file(self::DB_BACKUPFILEPATH,$backup);


        $data=array("success"=>true,"link"=>site_url(self::DB_BACKUPFILEPATH),"createdTime"=>date("Y-m-d h:m:s",time()));

        echo json_encode($data);
    }

    public function restore()
    {
        if(!$this->is_post())
        {
            $data=array("success"=>false,"message"=>"It is not allowed to call this method without post");

            echo json_encode($data);
            return;
        }
        $this->load->dbutil();
        $backup = $this->dbutil->backup();

        $path="assets/db/security/backup-restored/bk".date("Ymdhms",time()).".zip";
        $this->load->helper("directory");
        ensureDirectory($path);

        $this->load->helper("file");
        write_file($path,$backup);

        if(is_file(self::DB_BACKUPFILEPATH))
        {
            $xapth=FCPATH.self::DB_BACKUPFILEPATH;
            $restore_file  = $xapth;//self::DB_BACKUPFILEPATH;
            $server_name   = $this->db->hostname;
            $username      = $this->db->username;
            $password      = $this->db->password;
            $database_name = $this->db->database;

            $cmd = "mysql -h {$server_name} -u {$username} -p{$password} {$database_name} < $restore_file";
            exec($cmd);
            system("mysql -u {$username} -p{$password} -D {$database_name} < {$restore_file}");


            $sqlConetent = file_get_contents(self::DB_BACKUPFILEPATH);

            $this->load->helper("database");
            restore($sqlConetent,$server_name,$database_name,$username,$password);
            /*
            $pdo = new \PDO("mysql:host=".$server_name.";dbname=".$database_name,$username,$password,array(\PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES'utf8';"));
            $pdo->query($sqlConetent);
            unset($pdo);*/
        }

        $data=array("success"=>true,"link"=>site_url($path),"createdTime"=>date("Y-m-d h:m:s",time()));

        echo json_encode($data);
    }
}