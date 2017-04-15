<div id="datepicker<?=$fieldName ?>" class="input-append date date-picker"
     data-date-format="yyyy-mm-dd" data-date-viewmode="years"
    style="display:inline-block;width: 200px;">
	<input class="m-wrap m-ctrl-medium form-control date-picker" readonly="readonly" name="<?=$fieldName ?>"
		size="16" type="text" value=""><span class="add-on"><i
		class="icon-calendar"></i></span>
</div>

<script type="text/javascript">
$(function(){
	var $datepickerContainer = $('#datepicker<?=$fieldName ?>');
	$datepickerContainer.datepicker({
		toggleActive:true
	}).on("changeDate",function(ev){
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