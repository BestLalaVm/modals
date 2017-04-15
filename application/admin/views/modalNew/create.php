<?php
  $CI = &get_instance();
?>
<div class="portlet-body form">
<?= form_open(site_url("modalnew/create"),array("class"=>'form-horizontal')) ?>
   <?php $CI->load->view("modalnew/_detail") ?>
<?= form_close()?>
</div>