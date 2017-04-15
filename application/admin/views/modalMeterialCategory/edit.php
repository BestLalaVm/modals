<?php
$CI = &get_instance();
?>
<?= form_open(site_url("modalmeterialcategory/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modalmeterialcategory/_detail") ?>
<?= form_close()?>