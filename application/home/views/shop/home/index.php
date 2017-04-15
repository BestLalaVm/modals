<?php
$CI = &get_instance();
?>


<!--第一板块:图片展-->
<?php echo $CI->load->view("shop/home/_topSlider", array(), true); ?>

<!-- MAIN CONTENT SECTION -->
<section class="home mainContent clearfix">
    <div class="container">
        <!--第二板块:3D模型是什么-->
        <?php echo $CI->load->view("shop/home/_secondBlock", array(), true); ?>
        <!--第二板块:可用材料-->
        <?php echo $CI->load->view("shop/home/_thirdBlock", array(), true); ?>
        <!--第二板块:系统模型库-->
        <?php echo $CI->load->view("shop/home/_forthBlock", array(), true); ?>
        <!--第二板块:个人模型库-->
        <?php echo $CI->load->view("shop/home/_fifthBlock", array(), true); ?>
    </div>
</section>