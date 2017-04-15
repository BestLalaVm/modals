<?php
  
?>
<?=form_multiselect($fieldName."[]",$options,$selectedValues,array("id"=>$fieldName,"data-placeholder"=>$placeHolder,"class"=>"form-control")) ?>
<script type="text/javascript">
$(function(){
	var $dateElement = $("#<?=$fieldName ?>");
	$dateElement.select2();
});
</script>