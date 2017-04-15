<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/3/2017
 * Time: 10:24 PM
 */
$loginContainerId =$uniqueId;
if(empty($loginContainerId)){
   $loginContainerId=uniqid("datePicker");
}
?>
<div id="<?=$loginContainerId?>">
    <div class="form-group">
        <label for="">邮箱</label>
        <input type="email" class="form-control" data-bind="value:emailAddress">
        <div data-bind="visible:!validations.emailAddress()" class="form-validation-error">邮箱不能为空</div>
    </div>
    <div class="form-group">
        <label for="">密码</label>
        <input type="password" class="form-control" data-bind="value:password">
        <div data-bind="visible:!validations.password()" class="form-validation-error">密码不能为空</div>
    </div>
    <!--
    <div class="checkbox">
        <label>
            <input type="checkbox" data-bind="checked:rememberMe"> 记住密码
        </label>
    </div>-->
    <button type="button" id="btnLogin" class="btn btn-primary btn-block" data-bind="click:events.login">马上登入</button>
    <a class="btn btn-link btn-block" href="<?php echo site_url("shop/account/forget");?>">忘记密码?</a>
</div>

<script type="text/javascript">
    $(function () {
        var loginViewModel = function () {
            var self = this;
            self.emailAddress = ko.observable();
            self.password = ko.observable();
            self.rememberMe=ko.observable(false);

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
                },
                password: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.password()) {
                        return false;
                    }

                    return true;
                }
            }

            $btnLogin = $("#btnLogin");
            var loginText = $btnLogin.html();
            self.events = {
                login: function () {
                    self.toValidate(true);

                    if (!self.validations.emailAddress() || !self.validations.password()) {
                        return;
                    }

                    var data = {
                        "emailAddress": self.emailAddress(),
                        "password": self.password(),
                        "rememberMe":self.rememberMe()
                    };

                    $btnLogin.html("正在登入..");
                    $btnLogin.attr("disabled", true);
                    var isLogined=false;
                    $.post("<?php echo site_url("shop/account/login")?>", data, function (d) {
                        if (d.success) {
                            isLogined=true;
                            var flag = typeof <?=(empty($sucessCallback)?"null":$sucessCallback)?> == 'function';
                            if(flag){
                                <?=$sucessCallback?>();
                            }else
                            {
                                window.location.reload();
                            }
                        } else {
                            alert(d.message);
                        }
                    }, "json").always(function () {
                        setTimeout(function () {
                            if(!isLogined)
                            {
                                $btnLogin.html(loginText);
                                $btnLogin.attr("disabled", false);
                            }
                        },100);

                    });
                }
            }
        }
        var vm = new loginViewModel();

        ko.applyBindings(vm, $("#<?=$loginContainerId?>")[0]);

        /*
        $("#login").on("shown.bs.modal",function () {
            vm.emailAddress("");
            vm.password("");
        })*/
    })
</script>