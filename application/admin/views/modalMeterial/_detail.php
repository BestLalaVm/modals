<?php $CI =& get_instance(); ?>
<div class="detail">
	<div class="error">
    <?php if(isset($uniqueError))echo $uniqueError; ?>
    </div>
	<div class="control-group">
		<label class="control-label">名称<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("name",$name,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("name")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">材料类别<span class="required">*</span></label>
		<div class="controls">
		   <?php echo form_dropdown("meterialCategory_ID",$meterialCategory_list,$meterialCategory_ID,array("class"=>"medium  m-wrap"))?>
            <div class="form-validation-error"><?php echo form_error("meterialCategory_ID")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">颜色</label>
		<div class="controls">
			<?=form_hidden("color",$color)?>
			<?=$CI->load->view("/shared/_colorpicker",array("elementId"=>"color"),true)?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">价格<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("price",$price,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("price")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">精度<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("accuracy",$accuracy,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("accuracy")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">成型尺寸<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("size",$size,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("size")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">工艺<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("technology",$technology,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("technology")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">交工周期<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("workday",$workday,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("workday")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">特点<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("special",$special,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("special")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">图片</label>
		<div class="controls">
			<?=form_hidden("image",$image,array("class"=>"span6")) ?>
			<?=form_hidden("thumbImage",$thumbImage,array("class"=>"span6")) ?>
			<?=form_hidden("smallImage",$smallImage,array("class"=>"span6")) ?>
			<?=$CI->load->view("/shared/_imageUpload",array("imageElement"=>"input[name='image']","thumbImageElement"=>"input[name='thumbImage']","smallImageElement"=>"input[name='smallImage']","currentImage"=>$image),true)?>
			<div class="form-validation-error"><?php echo form_error("image")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">适合做<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("suitableProduct",$suitableProduct,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("suitableProduct")?></div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">不适合做<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("unSuitableProduct",$unSuitableProduct,array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("unSuitableProduct")?></div>
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
	<a href="<?=site_url("modalMeterial/index")?>" class="btn">取消</a>
	</div>
</div>