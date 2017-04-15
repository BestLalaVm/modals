<?php

?>
<?php if (empty($disabled)): ?>
    <?= form_multiselect($fieldName . "[]", $options, $selectedValues, array("id" => $fieldName, "data-placeholder" => $placeHolder, "class" => "chosen span6")) ?>

    <?php else: ?>
    <?= form_multiselect($fieldName . "[]", $options, $selectedValues, array("id" => $fieldName, "data-placeholder" => $placeHolder, "class" => "chosen span6","disabled"=>"disabled")) ?>
<?php endif; ?>
<script type="text/javascript">
    $(function () {
        var $dateElement = $("#<?=$fieldName ?>");
        $dateElement.select2();
    });
</script>
