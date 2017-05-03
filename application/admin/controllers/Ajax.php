<?php
class Ajax extends My_Controller
{
    private $webRootDirName;
	function __construct(){
		parent::__construct();
		
		$this->load->helper("url");
		$this->webRootDirName=WebUtil::$appRootDirName;
	}
	
	function uploadImage()
	{
		$image=uniqid("img");
		$data["success"]=false;		
		$relativePath = "assets/uploads/images";
		$config["upload_path"]= $relativePath;
		$config["allowed_types"]="gif|jpg|png|jpeg";	
		$config["file_name"]=$image;
		$this->load->library("upload",$config);
		
		if($this->upload->do_upload("imageFile"))
		{
			$d = $this->upload->data();
			$data["success"]=true;
			$thumbimageName=("thumb_").$d["file_name"];
			$smallimageName=("small_").$d["file_name"];
			$data["imageUrl"]=("/".$relativePath."/".$d["file_name"]);
            $data["thumbImageUrl"]=("/".$relativePath."/".$thumbimageName);
            $data["smallImageUrl"]=("/".$relativePath."/".$smallimageName);
            //$data["imageUrl"]=("/{$this->webRootDirName}/".$relativePath."/".$d["client_name"]);
			//$data["thumbImageUrl"]=("/{$this->webRootDirName}/".$relativePath."/".$thumbimageName);
			//$data["smallImageUrl"]=("/{$this->webRootDirName}/".$relativePath."/".$smallimageName);
			
			$this->load->library("image_lib");
			$this->createUploadThumbImage(array("source_image"=>$d["full_path"],"new_image"=>$thumbimageName,"width"=>270,"height"=>200));
			$this->createUploadThumbImage(array("source_image"=>$d["full_path"],"new_image"=>$smallimageName,"width"=>270,"height"=>270));
		}else {
			$errors = $this->upload->display_errors();
			$data["error"]=$errors;
		}
		
		echo json_encode($data);
	}
	
	function uploadVedio()
	{
		$data["success"]=false;
		$relativePath = "assets/uploads/vedios";
		$config["upload_path"]= $relativePath;
        $config["file_name"]=uniqid("vedio");
		$config["allowed_types"]="wmv|3gp|mp4|rm|rmvb|flv";
		$this->load->library("upload",$config);
	
		if($this->upload->do_upload("vedioFile"))
		{
			$d = $this->upload->data();
			$data["success"]=true;
			$data["vedioUrl"]=("/".$relativePath."/".$d["file_name"]);
		}else {
			$errors = $this->upload->display_errors();
			$data["error"]="您选择的文件无效,请联系管理员!";
		}
	
		echo json_encode($data);
	}

	function uploadEditorImage(){
        $image=uniqid("edimg");
        $relativePath = "assets/uploads/editor/images";
        $config["upload_path"]= $relativePath;
        $config["allowed_types"]="gif|jpg|png|jpeg";
        $config["file_name"]=$image;
        $this->load->library("upload",$config);

        if($this->upload->do_upload("upload"))
        {
            $d = $this->upload->data();
            //$imageUrl=("/{$this->webRootDirName}/".$relativePath."/".$d["client_name"]);
            $imageUrl= ("/".$relativePath."/".$d["file_name"]);
            $fn=$_GET['CKEditorFuncNum'];

            echo "<script>window.parent.CKEDITOR.tools.callFunction($fn,'$imageUrl','上传成功!');</script>";
        }else {
            $errors = $this->upload->display_errors();
            echo "<div>$errors</div><script>alert('上传失败!');</script>";
        }
    }

	private function createUploadThumbImage($dconfig){
		$config=$dconfig;
		$config["image_library"]="gd2";
		$config["maintain_radio"]=TRUE;
		
		$this->image_lib->initialize($config);
		
		//$this->image_lib->initialize($config);
		
		if(!$this->image_lib->resize())
		{
		    $errors = $this->image_lib->display_errors();	
		}		
	}
}