<?= form_open_multipart(site_url("modal/cmedit")."/".$id,array("class"=>'form-horizontal')) ?>
   <?php $this->load->view("modal/cm/_detail") ?>
<?= form_close()?>