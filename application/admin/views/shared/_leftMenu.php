<div class="page-sidebar nav-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu">
        <li>
            <a href="javascript:;" class="top-menu">
                <i class="icon-sitemap"></i>
                <span class="title">模型库管理</span><span class="top-menu-icon"></span><span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="menu-item sub-menu-item"><a href="<?= site_url("modalcategory/index") ?>">模型类别管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("modaltag/index") ?>"> 模型标签管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("modalMeterialCategory/index") ?>"> 模型材料分类管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("modalMeterial/index") ?>"> 模型材料管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("modal/index") ?>"> 3D模型管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("modalNew/index") ?>"> 3D新闻管理</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="top-menu"> <i class="icon-th"></i> <span
                        class="title">云端作业管理</span> <span class="top-menu-icon"></span><span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="menu-item sub-menu-item"><a href="<?= site_url("order/index") ?>">订单管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("question/index") ?>"> 在线问答管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("helpercenter/index/introducation") ?>"> 用户指南</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("helpercenter/index/helpcenter") ?>"> 帮助中心</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="top-menu"> <i class="icon-user"></i> <span
                        class="title">用户管理</span> <span class="top-menu-icon"></span><span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="menu-item sub-menu-item"><a href="<?= site_url("user/index") ?>">用户管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("modal/cmindex") ?>"> 用户模型管理</a></li>
                <li class="menu-item sub-menu-item"><a href="<?= site_url("requirement/index") ?>">模型需求管理</a></li>
            </ul>
        </li>
        <?php if (MyAuth::isSuperUser()): ?>
            <li>
                <a href="javascript:;" class="top-menu"> <i class="icon-briefcase"></i> <span
                            class="title">安全管理</span> <span class="top-menu-icon"></span><span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="menu-item sub-menu-item"><a href="<?= site_url("administrator/index") ?>"> 管理员管理</a></li>
                    <li class="menu-item sub-menu-item"><a href="<?= site_url("dbSecurity/index") ?>">数据库备份/还原</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu"> <i class="icon-cogs"></i> <span
                            class="title">系统设置</span> <span class="top-menu-icon"></span><span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="menu-item sub-menu-item"><a href="<?= site_url("settings/index") ?>">系统设置</a></li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<script type="text/javascript">
    $(function () {
        $menuItems = $(".sub-menu-item");
        $(".top-menu,.sub-menu").each(function () {
            $(this).parent().removeClass("active");

            $(this).find(".top-menu-icon").removeClass("selected");
            $(this).find(".arrow").removeClass("open");
        });

        $menuItems.each(function () {
            var itemhref = $(this).find("a").attr("href");
            if (window.location.href.indexOf(itemhref) == 0) {
                $(this).addClass("active");

                $(this).parent().parent().addClass("active");
                $(this).parent().parent().find(".top-menu .top-menu-icon").addClass("selected");
                $(this).parent().parent().find(".top-menu .arrow").addClass("open");
            }
        });
    });
</script>


