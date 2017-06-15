<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/4/2017
 * Time: 1:18 PM
 */
class user_model extends MY_Model
{
    public $id;
    public $email;
    public $password;
    public $image;
    public $telephone;
    public $note;
    public $shippingName;
    public $shippingAddress;

    public function register($data)
    {
        $email = $data["emailAddress"];
        $email = $this->escapeSqlValue($email);
        $existsSql = "select count(1) as total from users where email=$email";
        $row = $this->db->query($existsSql)->row();
        if($row->total>=1)
        {
            throw new Exception("用户已经注册过了.");
        }

        $user = array("id"=>uniqid("U"),"email"=>$data["emailAddress"],"password"=>md5($data["password"]) ,"createdTime"=>date("Y-m-d H:i:s"));
        $this->db->insert("users",$user);
    }

    public function login($data)
    {
        $email = $data["emailAddress"];
        $this->db->where("email",$email);
        $query = $this->db->get("users",1);

        $d = $query->row();

        if($d==null)
        {
            throw new Exception("用户不存在!");
        }
        $encryptedPassword=md5($data["password"]);
        if($d->password!=$encryptedPassword)
        {
            throw new Exception("密码不正确!");
        }
        $user = array("id"=>$d->id,"email"=>$d->email,"image"=>$d->image ,"createdTime"=>$d->createdTime,
                      "telephone"=>$d->telephone,"shippingName"=>$d->shippingName,
                      "shippingAddress"=>$d->shippingAddress,"note"=>$d->note);

        return $user;
    }

    public function changeUserInfo($id, $data)
    {
        if($data["isChangedPassword"]=="true")
        {
            $user = $this->db->query("SELECT password from users where id='$id'")->row();
            if($user->password!=md5($data["oldPassword"]))
            {
                throw new Exception("原密码不正确!");
            }
        }

        $this->db->where("id",$id);
        $this->db->set("shippingName",$data["shippingName"]);
        $this->db->set("shippingAddress",$data["shippingAddress"]);
        $this->db->set("note",$data["note"]);
        $this->db->set("telephone",$data["telephone"]);
        $this->db->set("image",$data["image"]);
        if($data["isChangedPassword"]=="true")
        {
            $this->db->set("password",md5($data["newPassword"]));
        }
        $this->db->update("users");

        return $data;
    }

    public function forgetPassword($email)
    {
        $this->db->where("email",$email);
        $user = $this->db->get("users")->row();
        if(is_null($user) )
        {
            throw new Exception("用户不存在!");
        }

        $newPassword=uniqid();
        $this->db->set("password",md5($newPassword));
        $this->db->update("users");

        $CI = &get_instance();
        $smtpUser = "modal3d@163.com";

        $CI->email->from($smtpUser, 'modal3d@163.com');
        $CI->email->to($email);

        $CI->email->subject('云端系统找回密码');
        $CI->email->message("您的新的随机密码为:$newPassword");

        $data = array();
        if($CI->email->send())
        {
            $data["message"]="新密码已经发送到您的邮箱:".$email;
        }else{
            var_dump($this->email->print_debugger());
        }

        return $data;
    }
}