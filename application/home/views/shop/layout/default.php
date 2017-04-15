<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from themes.iamabdus.com/bigbag/1.1/index-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Mar 2017 09:36:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo site_url("../assets/images/favicon.ico")?>">
    <title>云端作业子系统</title>
    <?=$css_for_layout?>
    <?= $js_for_layout ?>
</head>

<body class="body-wrapper">
<div class="main-wrapper">

    <!-- HEADER -->
<?php echo $this->load->view("shop/shared/_head",array(),true);?>
    <?= $content_for_layout ?>
    <!-- LIGHT SECTION -->
    <!-- FOOTER -->
    <?php echo $this->load->view("shop/shared/_footer",array(),true);?>
</div>

<!-- LOGIN MODAL -->
<?php echo $this->load->view("shop/shared/_login",array(),true);?>

<!-- SIGN UP MODAL -->
<?php echo $this->load->view("shop/shared/_register",array(),true);?>

<!-- PORDUCT QUICK VIEW MODAL -->

<?php echo $this->load->view("shared/_siteconfig",array(),true);?>
</body>
<!-- Mirrored from themes.iamabdus.com/bigbag/1.1/index-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Mar 2017 09:37:51 GMT -->
</html>