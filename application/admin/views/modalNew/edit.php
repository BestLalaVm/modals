<?php
$CI = &get_instance();
?>
<?= form_open(site_url("modalnew/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modalnew/_detail") ?>
<?= form_close()?>