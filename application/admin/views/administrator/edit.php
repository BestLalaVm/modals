<?php
$CI = &get_instance();
?>
<?= form_open(site_url("administrator/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("administrator/_detail") ?>
<?= form_close()?>