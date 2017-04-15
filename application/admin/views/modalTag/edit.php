<?php
$CI = &get_instance();
?>
<?= form_open(site_url("modaltag/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modaltag/_detail") ?>
<?= form_close()?>