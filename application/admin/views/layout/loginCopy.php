<?php $CI =& get_instance(); ?>
<!DOCTYPE html>
<html>
<head>
<title><?=$title_for_layout?></title>
<link rel="shortcut icon" href="<?php echo site_url("/assets/images/favicon.ico")?>">
 <?= $CI->load->view("/shared/_head",null,true);?>
</head>
<body class="login">
	<div class="logo">
		3D模型-云端后台管理系统
	</div>
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<?=$content_for_layout?>		
		<!-- END LOGIN FORM -->
	</div>

	<!-- BEGIN FOOTER -->
  <?= $CI->load->view("/shared/_footer",null,true);?>
	<!-- END FOOTER -->
	<!-- END BODY -->
</body>
</html>