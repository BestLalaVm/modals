<?php
   $userNameAttrs = array("class"=>"span6");
   if(isset($id))
   {
   	  $userNameAttrs["readonly"]=true;
   }
?>

<div class="detail">
    <div class="error">
    <?php if(isset($uniqueError))echo $uniqueError; ?>
    </div>
	<div class="control-group">
		<label class="control-label">用户名<span class="required">*</span></label>
		<div class="controls">		
		<?= form_input("userName",$userName,$userNameAttrs)?>
		<div class="form-validation-error"><?php echo form_error("userName")?></div>
		</div>
	</div>
	<?php if(isset($id)):?>
	<div class="control-group">		
		<div class="controls">		
		<label class="control-label" style="text-align: left;"><?= form_checkbox("isPasswordChanged",true,$isPasswordChanged,array("class"=>"span6","data-bind"=>"checked:isPasswordChanged"))?>更改密码</label>		
		<div class="form-validation-error"><?php echo form_error("isPasswordChanged")?></div>
		</div>
	</div>	
	<?php endif;?>	
	<div class="control-group" data-bind="visible:isPasswordChanged">
		<label class="control-label">密码<span class="required">*</span></label>
		<div class="controls">		
		<?= form_password("password","",array("class"=>"span6"))?>
		<div class="form-validation-error"><?php echo form_error("password")?></div>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<label class="control-label" style="text-align: left;"><?= form_checkbox("isSuper","1",$isSuper,array("class"=>"span6")) ?>超级管理员&nbsp;</label>
			<div class="form-validation-error"><?php echo form_error("isSuper")?></div>		
	</div>
	</div>
	<div class="form-actions">
    <?=form_submit("","保存",array("class"=>"btn green"))?>
	<a href="<?=site_url("administrator/index")?>" class="btn">取消</a>
	</div>
</div>
<script type="text/javascript">
$(function(){
	var administratorModel = function(){
		var self = this;
		
		self.isPasswordChanged= ko.observable(<?=($isPasswordChanged=="1") ?>);
    }

    var vm = new administratorModel();
    ko.applyBindings(vm,$(".detail")[0]);
});
</script>