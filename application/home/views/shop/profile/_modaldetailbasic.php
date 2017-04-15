<div class="row">
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label">标题<span class="required">*</span></label>
        <div class="col-md-10 col-sm-9">
            <?= form_input("name",$name,array("class"=>"form-control"))?>
            <div class="form-validation-error"><?php echo form_error("name")?></div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label">关键字</label>
        <div class="col-md-10 col-sm-9">
            <?= form_input("keyword",$keyword,array("class"=>"form-control"))?>
            <div class="form-validation-error"><?php echo form_error("keyword")?></div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label">简介<span class="required">*</span></label>
        <div class="col-md-10 col-sm-9">
            <?= form_input("introducation",$introducation,array("class"=>"form-control"))?>
            <div class="form-validation-error"><?php echo form_error("introducation")?></div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 col-sm-3 control-label">类别</label>
        <div class="col-md-10 col-sm-9">
            <?php echo form_dropdown("category_id", $category_list, $category_id, array("class" => "medium form-control")) ?>
            <div class="form-validation-error"><?php echo form_error("category_id") ?></div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label">可用材料</label>
        <div class="col-md-10 col-sm-9">
            <?php echo $this->load->view("shop/shared/_mutipleSelect",array("fieldName"=>"meterials","options"=>$meterial_list,"selectedValues"=>$meterials,"placeHolder"=>"情选择可用的材料"),true);?>
            <div class="form-validation-error"><?php echo form_error("meterials")?></div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label">标签</label>
        <div class="col-md-10 col-sm-9">
            <?php echo $this->load->view("shop/shared/_mutipleSelect",array("fieldName"=>"tags","options"=>$tag_list,"selectedValues"=>$tags,"placeHolder"=>"情选择可用的标签"),true);?>
            <div class="form-validation-error"><?php echo form_error("tags")?></div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label"></label>
        <div class="col-md-10 col-sm-9">
            <?= form_upload("newattachment","",array("onchange"=>"selectAttachment()","id"=>"newattachment","class"=>"form-control"))?>
            <?php echo form_hidden("attachment",$attachment)?>
            <?php echo form_hidden("attachmentSize",$attachmentSize) ?>
            <?php if(!empty($attachment)):?>
                <a href="<?php echo $attachment ?>" target="_blank">下载附件:<?php echo $attachmentSize; ?>kb</a>
            <?php endif;?>
            <div class="form-validation-error"><?php echo form_error("attachment")?></div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label"></label>
        <div class="col-md-10 col-sm-9 ">
            <label class="control-label form-control" style="text-align: left;"><?= form_checkbox("isDownloadable",true,$isDownloadable,array("class"=>"span6"))?>是否可被下载</label><br/>
            <label class="control-label form-control" style="text-align: left;"><?= form_checkbox("isPublished",true,$isPublished,array("class"=>"span6"))?>是否发布</label>
        </div>
    </div>

    <div class="form-group" style="margin-bottom: 0px;">
        <label class="col-md-2 col-sm-3 control-label">图片</label>
        <div class="col-md-10 col-sm-9">
            <?=form_hidden("image",$image,array("class"=>"span6"))?>
            <?=form_hidden("thumbImage",$thumbImage,array("class"=>"span6"))?>
            <?=form_hidden("smallImage",$smallImage,array("class"=>"span6"))?>
            <?= $this->load->view("shop/shared/_imageUpload",
                array("imageElement" => "input[name='image']",
                    "thumbImageElement" => "input[name='thumbImage']",
                    "smallImageElement" => "input[name='smallImage']", "currentImage" => $image), true) ?>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label">发布时间</label>
        <div class="col-md-10 col-sm-9">
            <?= $this->load->view("shop/shared/_datepicker", array("fieldName" => "publishedDateFrom", "value" => $publishedDateFrom), true); ?>
            <?= $this->load->view("shop/shared/_datepicker", array("fieldName" => "publishedDateTo", "value" => $publishedDateTo), true); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-2 col-sm-3 control-label">内容</label>
        <div class="col-md-10 col-sm-9">
            <?php echo $this->load->view("shop/shared/_editor", array("fieldName" => "description", "content" => $description), true); ?>
        </div>
    </div>
</div>