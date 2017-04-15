<?= form_open(site_url("helpercenter/index")."/".$id,array("class"=>'form-horizontal')) ?>
<div class="detail">
    <div class="error">
        <?php if(isset($uniqueError))echo $uniqueError; ?>
    </div>
    <div class="control-group">
        <label class="control-label">标题<span class="required">*</span></label>
        <div class="controls">
            <?= form_input("title",$title,array("class"=>"span6"))?>
            <div class="form-validation-error"><?php echo form_error("title")?></div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">内容</label>
        <div class="controls">
            <?php echo $this->load->view("shared/_editor",array("fieldName"=>"content","content"=>$content),true);?>
        </div>
    </div>

    <div class="form-actions">
        <?=form_submit("","保存",array("class"=>"btn green"))?>
    </div>
</div>
<?= form_close()?>


