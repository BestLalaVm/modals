<?php
$CI = &get_instance();
?>
<?= form_open(site_url("modalcategory/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modalcategory/_detail") ?>
<?= form_close()?>