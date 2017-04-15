<?php
$CI = &get_instance ();
?>
<div class="portlet-body form">
<?= form_open_multipart(site_url("modal/create"),array("class"=>'form-horizontal'))?>
   <?php $CI->load->view("modal/_detail") ?>
<?= form_close()?>
</div>