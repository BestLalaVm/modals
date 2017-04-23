<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 4/22/2017
 * Time: 11:10 AM
 */
class errors extends CI_Controller
{
  public function notfound(){
      $this->output->set_status_header("404");
      $this->layout->view("errors/notfound");
  }
}