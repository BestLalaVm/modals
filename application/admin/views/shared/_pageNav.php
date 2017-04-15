<?php
?>
<div class="row-fluid"> 
   <div class="span12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB--> 
    <h3 class="page-title"> <?php if(isset($pageNavTitle)) echo  $pageNavTitle ?> <small><?php if(isset($pageNavdescription)) echo $pageNavdescription; ?></small></h3> 
    <ul class="breadcrumb"> 
     <li> <i class="icon-home"></i> <a href="<?=site_url("dashboard/index") ?>">首页</a> <i class="icon-angle-right"></i> </li> 
     <li><a href="<?php echo $_SERVER["REQUEST_URI"]?>"><?php if(isset($pageName)) echo $pageName; else echo "当前页";?></a></li> 
    </ul> 
    <!-- END PAGE TITLE & BREADCRUMB--> 
   </div> 
</div>