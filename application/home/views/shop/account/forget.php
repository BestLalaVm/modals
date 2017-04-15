<!-- LIGHT SECTION -->
<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="page-title">
                    <h2>忘记密码</h2>
                </div>
            </div>
            <div class="col-xs-6">
                <ol class="breadcrumb pull-right">
                    <li>
                        <a href="<?php echo site_url("shop/home/index");?>">首页</a>
                    </li>
                    <li class="active">忘记密码</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT SECTION -->
<section class="mainContent clearfix lostPassword">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>忘记密码</h3></div>
                    <div class="panel-body">
                        <?php if(empty($status)):?>
                        <form action="<?php echo site_url("shop/account/forget")?>" method="POST" role="form" id="frmForget">
                            <p class="help-block">请输入邮箱. 点击"找回密码"之后系统将发送邮件到你的邮箱找回密码.</p>
                            <div class="form-group">
                                <label for="">邮箱</label>
                                <input type="email" class="form-control" name="emailAddress" data-bind="value:emailAddress">
                                <div data-bind="visible:!validations.emailAddress()" class="form-validation-error">邮箱不能为空</div>
                                <?php if(!empty($error)):?>
                                <div class="form-validation-error"><?=$error?></div>
                                <?php endif;?>
                            </div>
                            <button type="button" id="btnSubmit" class="btn btn-primary btn-block" data-bind="click:events.forget">找回密码</button>
                        </form>
                        <?php else:?>
                            <div>系统已经自动为您重置密码,并发送到您的邮箱:<b><?=$status;?></b></div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style type="text/css">
    .footer
    {
        position: fixed;
        bottom: 0px;
    }
</style>
<script type="text/javascript">
    $(function () {
        var $frmForget = $("#frmForget");
        var forgetPasswordViewModel = function () {
            var self = this;
            self.emailAddress = ko.observable();

            self.toValidate = ko.observable(false);
            self.validations = {
                emailAddress: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.emailAddress()) {
                        return false;
                    }

                    return true;
                }
            }

            $btnSubmit = $("#btnSubmit");
            self.events = {
                forget: function () {
                    self.toValidate(true);

                    if (!self.validations.emailAddress()) {
                        return;
                    }
                    $btnSubmit.html("正在找回密码中....");
                    $("#frmForget").submit();
                }
            }
        }
        var vm = new forgetPasswordViewModel();

        ko.applyBindings(vm, $frmForget[0]);
    })
</script>