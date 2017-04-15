<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">
		<div class="container-fluid">
			<!-- BEGIN LOGO -->
			<a class="brand" href="<?=site_url("dashboard/index")?>">3D模型-云端后台管理系统 </a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->

			<a href="javascript:;" class="btn-navbar collapsed"
				data-toggle="collapse" data-target=".nav-collapse"> <img
				src="<?=base_url("assets/media/image/menu-toggler.png")?>" alt="" />
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<ul class="nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
                    <a href="#" class="dropdown-toggle"
					data-toggle="dropdown">
                        <!--
                        <img alt=""
						src="<?=base_url("assets/media/image/avatar1_small.jpg") ?>" /> --><span
						class="username"><?php echo MyAuth::getCurrentUser()->userName;?></span></a>
                <li>
                    <a href="<?php echo site_url("home/logout")?>"><i
						class="icon-key"></i> 退出</a></li>
				<!-- END USER LOGIN DROPDOWN --> 
     </ul> 
     <!-- END TOP NAVIGATION MENU --> 
    </div> 
   </div> 
   <!-- END TOP NAVIGATION BAR --> 
  </div>