<?php
$CI = &get_instance();
?>
<div class="model1120">
    <!--第一板块-->
    <?php echo $CI->load->view("home/_topBanner", array(), true); ?>
    <!--第二板块-->
    <?php echo $CI->load->view("home/_secondBlock", array(), true); ?>

    <?php echo $CI->load->view("home/_mainContent", array(), true); ?>
</div>