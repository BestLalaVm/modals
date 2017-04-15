<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_Config extends  CI_Config
{
    public function __construct()
    {
        $this->config =& get_config();
        $isBaseUrlEmpty=empty($this->config['base_url']);
        parent::__construct();

        if($isBaseUrlEmpty==true){
            $server_addr = $_SERVER['HTTP_HOST'];

            $base_url = (is_https() ? 'https' : 'http').'://'.$server_addr
                .substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));

            $this->set_item('base_url', $base_url);
        }
    }
}