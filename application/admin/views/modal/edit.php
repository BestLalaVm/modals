<?php
$CI = &get_instance();
?>
<?= form_open_multipart(site_url("modal/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modal/_detail") ?>
<?= form_close()?>