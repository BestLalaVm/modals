<?php
$CI = &get_instance();
?>
<?= form_open(site_url("question/edit")."/".$id,array("class"=>'form-horizontal')) ?>
   <div class="detail">
      <div class="error">
          <?php if(isset($uniqueError))echo $uniqueError; ?>
      </div>
      <div class="control-group">
         <label class="control-label">发布人</label>
         <div class="controls">
             <?= form_input("email",$email,array("class"=>"span6","disabled"=>"disabled"))?>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label">问题<span class="required">*</span></label>
         <div class="controls">
             <?= form_textarea("question",$question,array("class"=>"span6","disabled"=>"disabled"))?>
         </div>
      </div>
      <div class="control-group">
         <label class="control-label">答案</label>
         <div class="controls">
             <?php echo form_textarea("answer",$answer,array("class"=>"span6"))?>
            <div class="form-validation-error"><?php echo form_error("question")?></div>
         </div>
      </div>

      <div class="form-actions">
          <?=form_submit("","保存",array("class"=>"btn green"))?>
         <a href="<?=site_url("question/index")?>" class="btn">取消</a>
      </div>
   </div>
<?= form_close()?>