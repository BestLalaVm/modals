<?php
  $CI = &get_instance();
?>
<div class="portlet-body form">
<?= form_open(site_url("modalcategory/create"),array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modalcategory/_detail") ?>
<?= form_close()?>
</div>