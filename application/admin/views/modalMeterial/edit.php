<?php
$CI = &get_instance();
?>
<?= form_open(site_url("modalMeterial/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modalMeterial/_detail") ?>
<?= form_close()?>