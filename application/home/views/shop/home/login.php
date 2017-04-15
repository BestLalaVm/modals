<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="page-title">
                </div>
            </div>
            <div class="col-xs-6">
                <ol class="breadcrumb pull-right">
                    <li>
                        <a href="<?=site_url("shop/home/index")?>">首页</a>
                    </li>
                    <li class="active">登入</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="mainContent clearfix logIn">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>登入云端系统</h3></div>
                    <div class="panel-body">
                        <form action="#" method="POST" role="form">
                            <?=$this->load->view("shop/shared/_loginBlock",array("sucessCallback"=>"successCallBack","uniqueId"=>"loginPage"),true);?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function successCallBack() {
        window.location.href='<?=site_url("shop/home/index");?>';
    }
</script>