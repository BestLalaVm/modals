<?php
class ajax extends My_Controller
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
            $fileName =$d["file_name"];
			$thumbimageName=("thumb_").$fileName;
			$smallimageName=("small_").$fileName;
			$data["imageUrl"]=("/".$relativePath."/".$fileName);
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
        $config["allowed_types"]="wmv|3gp|mp4|rm|rmvb";
        $this->load->library("upload",$config);
	
		if($this->upload->do_upload("vedioFile"))
		{
			$d = $this->upload->data();
			$data["success"]=true;
            $fileName =$d["file_name"];
            $data["vedioUrl"]=("/".$relativePath."/".$d["file_name"]);
		}else {
			$errors = $this->upload->display_errors();
			$data["error"]=$errors;
		}
	
		echo json_encode($data);
	}

    function uploadEditorImage(){
        $image=uniqid("editImg");
        $relativePath = "assets/uploads/editor/images";
        $config["upload_path"]= $relativePath;
        $config["allowed_types"]="gif|jpg|png|jpeg";
        $config["file_name"]=$image;
        $this->load->library("upload",$config);

        if($this->upload->do_upload("upload"))
        {
            $d = $this->upload->data();
            $fileName =$d["file_name"];
            //$imageUrl=("/{$this->webRootDirName}/".$relativePath."/".$d["client_name"]);
            $imageUrl= ("/".$relativePath."/".$fileName);
            $fn=$_GET['CKEditorFuncNum'];

            echo "<script>window.parent.CKEDITOR.tools.callFunction($fn,'$imageUrl','上传成功!');</script>";
        }else {
            $errors = $this->upload->display_errors();
            echo "<div>$errors</div><script>alert('上传失败!');</script>";
        }
    }

	function addWishList()
    {
        $data=array("success"=>true);
        if(MyAuth::isLogin()){
            if(!$this->is_post())
            {
                $data["success"]=false;
                $data["message"]="操作无效!";
            }else{
                try{
                    $this->load->model("wishlist_model","wishlist");
                    $this->wishlist->add(MyAuth::getCurrentUser()->id,$_POST["modalId"]);
                }catch (Exception $e)
                {
                    $data["success"]=false;
                    $data["message"]=$e->getMessage();
                }
            }
        }else{
            $data["code"]="401";
            $data["redirectUrl"]=site_url("shop/home/login");
            $data["success"]=false;
        }

        echo json_encode($data);
    }

    function removeWishList(){
        $data=array("success"=>true);
        if(MyAuth::isLogin()){
            if(!$this->is_post())
            {
                $data["success"]=false;
                $data["message"]="操作无效!";
            }else{
                try{
                    $this->load->model("wishlist_model","wishlist");
                    $this->wishlist->remove(MyAuth::getCurrentUser()->id,$_POST["modalId"]);
                }catch (Exception $e)
                {
                    $data["success"]=false;
                    $data["message"]=$e->getMessage();
                }
            }
        }else{
            $data["code"]="401";
            $data["redirectUrl"]=site_url("shop/home/login");
            $data["success"]=false;
        }

        echo json_encode($data);
    }

    function addShoppingCart()
    {
        $data=array("success"=>true);
        if(MyAuth::isLogin()){
            if(!$this->is_post())
            {
                $data["success"]=false;
                $data["message"]="操作无效!";
            }else{
                try{
                    $this->load->model("shoppingcart_model","shoppingcart");
                    $this->shoppingcart->add(MyAuth::getCurrentUser()->id,$_POST["modalId"],$_POST["meterialId"],$_POST["quantity"]);
                }catch (Exception $e)
                {
                    $data["success"]=false;
                    $data["message"]=$e->getMessage();
                }
            }
        }else{
            $data["code"]="401";
            $data["success"]=false;
        }

        echo json_encode($data);
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

	function clearCache()
    {
        MyAuth::clearCachePages();
        echo "<script>alert('缓存清除成功!')</script>";
    }
}