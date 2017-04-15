<?php
  $CI = &get_instance();
?>
<div class="portlet-body form">
<?= form_open(site_url("modalmeterialcategory/create"),array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modalmeterialcategory/_detail") ?>
<?= form_close()?>
</div>