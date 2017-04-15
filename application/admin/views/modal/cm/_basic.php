<?php
$CI = &get_instance ();
?>

<div class="detail">
	<div class="error">
    <?php if(isset($uniqueError))echo $uniqueError; ?>
    </div>
	<div class="control-group">
		<label class="control-label">标题</label>
		<div class="controls">		
		<?= form_input("name",$name,array("class"=>"span6","disabled"=>"disabled"))?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">关键字</label>
		<div class="controls">		
		<?= form_input("keyword",$keyword,array("class"=>"span6","disabled"=>"disabled"))?>
		</div>
	</div>
    <div class="control-group">
        <label class="control-label">采编人</label>
        <div class="controls">
            <?= form_input("author",$author,array("class"=>"span6","disabled"=>"disabled"))?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">简介</label>
        <div class="controls">
            <?= form_input("introducation",$introducation,array("class"=>"span6","disabled"=>"disabled"))?>
        </div>
    </div>
	<div class="control-group">
		<label class="control-label">类别</label>
		<div class="controls">
		   <?php echo form_dropdown("category_id",$category_list,$category_id,array("class"=>"medium  m-wrap","disabled"=>"disabled"))?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">可用材料</label>
		<div class="controls">		
		<?php echo $CI->load->view("shared/_mutipleSelect",array("fieldName"=>"meterials","options"=>$meterial_list,"disabled"=>"disabled",
                                                                 "selectedValues"=>$meterials,"placeHolder"=>"情选择可用的材料"),true);?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">标签</label>
		<div class="controls">		
		<?php echo $CI->load->view("shared/_mutipleSelect",array("fieldName"=>"tags","options"=>$tag_list,
                                                                 "disabled"=>"disabled","selectedValues"=>$tags,
                                                                 "placeHolder"=>"情选择可用的标签"),true);?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">图片</label>
		<div class="controls">
			<?=form_hidden("image",$image,array("class"=>"span6"))?>
			<?=form_hidden("thumbImage",$thumbImage,array("class"=>"span6"))?>
			<?=form_hidden("smallImage",$smallImage,array("class"=>"span6"))?>
			<?=$CI->load->view("/shared/_imageUpload",array("imageElement"=>"input[name='image']",
                                                            "thumbImageElement"=>"input[name='thumbImage']",
                                                            "smallImageElement"=>"input[name='smallImage']","currentImage"=>$image),true)?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">附件</label>
		<div class="controls">

		    <?php echo form_hidden("attachment",$attachment)?>
		    <?php echo form_hidden("attachmentSize",$attachmentSize) ?>  
		    <?php if(!empty($attachment)):?>
		    <a href="<?php echo $attachment ?>" target="_blank">下载附件:<?php echo $attachmentSize; ?>kb</a>
		    <?php endif;?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<label class="control-label" style="text-align: left;"><?= form_checkbox("isDownloadable",true,$isDownloadable,array("class"=>"span6","disabled"=>"disabled"))?>是否可被下载</label>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<label class="control-label" style="text-align: left;"><?= form_checkbox("isPublished",true,$isPublished,array("class"=>"span6","disabled"=>"disabled"))?>是否发布</label>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">发布时间</label>
		<div class="controls">
        <?php echo form_input("publishedDateFrom",$publishedDateFrom,array("class"=>"span6","disabled"=>"disabled","style"=>"width:200px;"));?>
        <?php echo form_input("publishedDateTo",$publishedDateTo,array("class"=>"span6","disabled"=>"disabled","style"=>"width:200px;"));?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">内容</label>
		<div class="controls">		
		  <div class="content-editor">
              <?php echo $description;?>
          </div>
		</div>
	</div>
    <div class="form-actions">
        <?php if ($ispassed == 1): ?>
            <input type="hidden" name="ispassed" value="0">
            <button type="submit" class="btn blue">
                <i class="icon-ok"></i> 取消审核通过
            </button>
        <?php else: ?>
            <input type="hidden" name="ispassed" value="1">
            <button type="submit" class="btn blue">
                <i class="icon-ok"></i> 点击审核通过
            </button>
        <?php endif; ?>

        <a href="<?= site_url("modal/cmindex") ?>" class="btn">取消</a>
    </div>
</div>
<style type="text/css">
    .fileupload-new
    {
        display: none;
    }
    .content-editor
    {
        border: 1px solid #ddd;
        padding: 10px;
        min-height: 420px;
    }
</style>