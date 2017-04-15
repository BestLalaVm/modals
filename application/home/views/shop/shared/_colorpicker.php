<?php 
   $colorpickerContainerId = uniqid("colorPicker");
?>
<div id="<?=$colorpickerContainerId ?>" class="input-append color colorpicker-default"
	data-color="#3865a8" data-color-format="hex">
	<input type="text" class="m-wrap color-text"  readonly="readonly">
	<span class="add-on" style="padding-top: 8px; padding-bottom: 0px;">
	   <i class="color-label"></i>
	</span>
</div>
<script type="text/javascript">
$(function(){
	$colorElement = $("input[name='<?=$elementId ?>']");
	$colorValue = $colorElement.val();

	$colorTextShownElement =$('#<?=$colorpickerContainerId ?> .color-text');
	$('#<?=$colorpickerContainerId ?>').attr("data-color",$colorValue);
	$colorTextShownElement.val($colorValue);
	$('#<?=$colorpickerContainerId ?>').colorpicker().on("changeColor",function(ev){
		var vl=ev.color.toHex();
		$colorTextShownElement.val(vl);
		$colorElement.val(vl);
	});
});
</script>