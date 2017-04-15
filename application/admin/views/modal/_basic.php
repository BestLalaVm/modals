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
        <label class="control-label">采编人</label>
        <div class="controls">
            <?= form_input("author",$author,array("class"=>"span6"))?>
            <div class="form-validation-error"><?php echo form_error("author")?></div>
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
		<label class="control-label">类别</label>
		<div class="controls">
		   <?php echo form_dropdown("category_id",$category_list,$category_id,array("class"=>"medium  m-wrap"))?>
		   <div class="form-validation-error"><?php echo form_error("category_id")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">可用材料</label>
		<div class="controls">		
		<?php echo $CI->load->view("shared/_mutipleSelect",array("fieldName"=>"meterials","options"=>$meterial_list,"selectedValues"=>$meterials,"placeHolder"=>"情选择可用的材料"),true);?>
		<div class="form-validation-error"><?php echo form_error("meterials")?></div>
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
		<label class="control-label">图片</label>
		<div class="controls">
			<?=form_hidden("image",$image,array("class"=>"span6"))?>
			<?=form_hidden("thumbImage",$thumbImage,array("class"=>"span6"))?>
			<?=form_hidden("smallImage",$smallImage,array("class"=>"span6"))?>
			<?=$CI->load->view("/shared/_imageUpload",array("imageElement"=>"input[name='image']","thumbImageElement"=>"input[name='thumbImage']","smallImageElement"=>"input[name='smallImage']","currentImage"=>$image),true)?>
			<div class="form-validation-error"><?php echo form_error("image")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">附件</label>
		<div class="controls">
		    <?= form_upload("newattachment","",array("onchange"=>"selectAttachment()","id"=>"newattachment"))?>
		    <?php echo form_hidden("attachment",$attachment)?>
		    <?php echo form_hidden("attachmentSize",$attachmentSize) ?>  
		    <?php if(!empty($attachment)):?>
		    <a href="<?php echo $attachment; ?>" target="_blank">下载附件:<?php echo $attachmentSize; ?>kb</a>
		    <?php endif;?>
			<div class="form-validation-error"><?php echo form_error("attachment")?></div>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<label class="control-label" style="text-align: left;"><?= form_checkbox("isDownloadable",true,$isDownloadable,array("class"=>"span6"))?>是否可被下载</label>
			<div class="form-validation-error"><?php echo form_error("isDownloadable")?></div>
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
		  <?php echo $CI->load->view("shared/_editor",array("fieldName"=>"description","content"=>$description),true);?>
		</div>
	</div>
</div>
<script type="text/javascript">
function selectAttachment()
{
	$("input[name='attachment']").val($("#newattachment").val());
}
</script>