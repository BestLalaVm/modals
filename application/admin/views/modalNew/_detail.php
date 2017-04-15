<?php
$CI = &get_instance ();
?>

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
		<label class="control-label">关键字</label>
		<div class="controls">		
		<?= form_input("keyword",$keyword,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("keyword")?></div>
		</div>
	</div>
    <div class="control-group">
        <label class="control-label">简介<span class="required">*</span></label>
        <div class="controls">
            <?= form_input("introducation",$introducation,array("class"=>"span6"))?>
            <div class="form-validation-error"><?php echo form_error("introducation")?></div>
        </div>
    </div>
		<div class="control-group">
		<label class="control-label">标签</label>
		<div class="controls">		
		<?php echo $CI->load->view("shared/_mutipleSelect",array("fieldName"=>"tags","options"=>$tag_list,"selectedValues"=>$tags,"placeHolder"=>"情选择可用的标签"),true);?>
		<div class="form-validation-error"><?php echo form_error("tags")?></div>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<label class="control-label" style="text-align: left;"><?= form_checkbox("isPublished",true,$isPublished,array("class"=>"span6"))?>是否发布</label>
			<div class="form-validation-error"><?php echo form_error("isPublished")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">发布时间</label>
		<div class="controls">		
		<?= $CI->load->view("shared/_datepicker",array("fieldName"=>"publishedDateFrom","value"=>$publishedDateFrom),true);?>
		<?= $CI->load->view("shared/_datepicker",array("fieldName"=>"publishedDateTo","value"=>$publishedDateTo),true);?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">内容</label>
		<div class="controls">		
		  <?php echo $CI->load->view("shared/_editor",array("fieldName"=>"content","content"=>$content),true);?>
		</div>
	</div>

	<div class="form-actions">
    <?=form_submit("","保存",array("class"=>"btn green"))?>
	<a href="<?=site_url("modalnew/index")?>" class="btn">取消</a>
	</div>
</div>