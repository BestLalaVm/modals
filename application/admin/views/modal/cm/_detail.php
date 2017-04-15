<?php
$CI = &get_instance();
?>
<div class="tabbable tabbable-custom boxless">

    <ul class="nav nav-tabs">

        <li class="active"><a href="#tab_1" data-toggle="tab">基本信息</a></li>

        <li><a class="" href="#tab_2" data-toggle="tab">展示方式</a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane active" id="tab_1"><?php echo $CI->load->view("modal/cm/_basic", null, true); ?></div>
        <div class="tab-pane " id="tab_2">
            <?php echo $CI->load->view("modal/cm/_shownStyle", array("shownType" => $shownType, "shownDescription" => $shownDescription), true); ?>
        </div>
    </div>
</div>
