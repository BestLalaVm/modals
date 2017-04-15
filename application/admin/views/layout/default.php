<?php $CI =& get_instance(); ?>
<!DOCTYPE html>
<html>
<head>
 <title><?=$title_for_layout?></title>
    <link rel="shortcut icon" href="<?php echo site_url("../assets/images/favicon.ico")?>">
 <?= $CI->load->view("/shared/_head",null,true);?>
</head>
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	 <?= $CI->load->view("/shared/_topNav",null,true);?>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<?= $CI->load->view("/shared/_leftMenu",null,true);?>
		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->
		<div class="page-content">
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<?= $CI->load->view("/shared/_pageNav",null,true);?>
				<!-- END PAGE HEADER-->
				<div id="dashboard">
					<?=$content_for_layout?>
				</div>

			</div>
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
  <?= $CI->load->view("/shared/_footer",null,true);?>
	<!-- END FOOTER -->	
<!-- END BODY -->
    <div class="loading">
        <div class="loading-image"></div>
    </div>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                beforeSend:function () {
                    $(".loading").show();
                },
                complete:function () {
                    $(".loading").hide();
                }
            });

        })
    </script>
</body>
</html>