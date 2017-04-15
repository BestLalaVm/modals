<div class="detail">
    <div class="error">
    <?php if(isset($uniqueError))echo $uniqueError; ?>
    </div>
	<div class="control-group">
		<label class="control-label">标题<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("name",$name,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("name")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">内容</label>
		<div class="controls">		
		<?= form_textarea("description",$description,array("class"=>"span6","rows"=>15))?>
		<div class="form-validation-error"><?php echo form_error("description")?></div>
		</div>
	</div>
	<div class="form-actions">
    <?=form_submit("","保存",array("class"=>"btn green"))?>
	<a href="<?=site_url("modaltag/index")?>" class="btn">取消</a>
	</div>
</div>