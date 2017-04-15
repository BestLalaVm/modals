<?php 
   $datepickerContainerId = uniqid("datePicker");
?>
<div id="datepicker<?=$fieldName ?>" class="input-append date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
	<input class="m-wrap m-ctrl-medium date-picker" readonly="readonly" name="<?=$fieldName ?>"
		size="16" type="text" value=""><span class="add-on"><i
		class="icon-calendar"></i></span>
</div>

<script type="text/javascript">
$(function(){
	//var $dateElement = $("input[name='<?=$fieldName ?>']");
	
	var $datepickerContainer = $('#datepicker<?=$fieldName ?>');
	//$datepickerContainer.attr("data-date",$dateValue);
	$datepickerContainer.datepicker({
		toggleActive:true
	}).on("changeDate",function(ev){
		//$dateElement.val($datepickerContainer.find("input.date-picker").val());
		$(this).datepicker('hide');
	});
	var dateValue = "<?php echo $value; ?>";
	if(dateValue)
	{
		var selectedDate = new Date(dateValue);
		$datepickerContainer.datepicker("setDate",selectedDate);
	}
});
</script>