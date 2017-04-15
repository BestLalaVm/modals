<?php
$CI = &get_instance ();
?>
<div class="tabbable tabbable-custom boxless">

	<ul class="nav nav-tabs">

		<li class="active"><a href="#tab_1" data-toggle="tab">基本信息</a></li>

		<li><a class="" href="#tab_2" data-toggle="tab">展示方式</a></li>
	</ul>

	<div class="tab-content">

		<div class="tab-pane active" id="tab_1"><?php echo $CI->load->view("modal/_basic",null,true);?></div>
		<div class="tab-pane " id="tab_2">
			<?php echo $CI->load->view("modal/_shownStyle",array("shownType"=>$shownType,"shownDescription"=>$shownDescription),true);?>
		</div>
	</div>
</div>
<div class="form-actions">

	<button type="submit" class="btn blue">
		<i class="icon-ok"></i> 保存
	</button>
	<a href="<?=site_url("modal/index")?>" class="btn">取消</a>
</div>