<?php
  $CI = &get_instance();
?>
<div class="portlet-body form">
<?= form_open(site_url("modaltag/create"),array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modaltag/_detail") ?>
<?= form_close()?>
</div>