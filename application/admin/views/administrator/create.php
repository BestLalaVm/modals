<?php
  $CI = &get_instance();
?>
<div class="portlet-body form">
<?= form_open(site_url("administrator/create"),array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("administrator/_detail") ?>
<?= form_close()?>
</div>