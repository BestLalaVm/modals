<?php
$CI = &get_instance();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>3D模型库_3D模型免费下载_</title>
    <meta content="3D模型库,提供大量的模型下载，每个3D模型都是精选而出，全力打造国内最好最全的3D模型网.凭着最新最酷最漂亮的模型，让设计师更好选择好的3D模型进行下载." name="description">
    <meta content="3D模型库，3D模型免费下载，3D模型下载网,快速成型" name="keywords">
    <?php echo $CI->load->view("shared/_head", array(), true); ?>
</head>

<body style="background:#fff;">
<?php echo $CI->load->view("shared/_popupLogin", array(), true); ?>
<!-- 弹窗登录结束 -->
<div class="main-header">
    <?php echo $CI->load->view("shared/_topNav", array(), true); ?>
</div>

<div class="main-content">
    <div style="clear: both;margin: 0 auto;width: 100%;overflow: hidden; margin-top: 60px;">
        <?= $content_for_layout ?>
    </div>
</div>
<?php echo $this->load->view("shared/_siteconfig",array(),true);?>
<!-- 脚部开始 -->
<div class="main-footer">
    <?php echo $CI->load->view("shared/_footer", array(), true); ?>
</div>
<!--底部结束-->
</body>
</html>