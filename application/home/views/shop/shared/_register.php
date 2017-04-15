<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/3/2017
 * Time: 10:24 PM
 */
?>
<?php if(!MyAuth::isLogin()):?>
<div class="modal fade" data-backdrop="static" id="signup" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="registerBlock">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">注册成为云端用户</h3>
            </div>
            <div class="modal-body">
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
                <div class="form-group">
                    <label for="">确认密码</label>
                    <input type="password" class="form-control" data-bind="value:confirmPassword">
                    <div data-bind="visible:!validations.confirmPassword()" class="form-validation-error">确认密码不正确</div>
                </div>
                <button type="button" id="btnRegister" class="btn btn-primary btn-block"
                        data-bind="click:events.register">开始注册
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var registerViewModel = function () {
            var self = this;
            self.emailAddress = ko.observable();
            self.password = ko.observable();
            self.confirmPassword = ko.observable();

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
                },
                confirmPassword: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (self.confirmPassword() != self.password()) {
                        return false;
                    }

                    return true;
                }
            }

            $btnRegister = $("#btnRegister");
            var registerText = $btnRegister.html();
            self.events = {
                register: function () {
                    self.toValidate(true);

                    if (!self.validations.emailAddress() || !self.validations.password() || !self.validations.confirmPassword()) {
                        return;
                    }

                    var data = {
                        "emailAddress": self.emailAddress(),
                        "password": self.password()
                    };

                    $btnRegister.html("正在注册..");
                    $btnRegister.attr("disabled", true);
                    $.post("<?php echo site_url("shop/account/register")?>", data, function (d) {
                        if (d.success) {
                            $("#signup").modal("hide");
                            $("#login").modal("show");
                            alert("注册成功,马上登入!");
                        } else {
                            alert(d.message);
                        }
                    }, "json").always(function () {
                        $btnRegister.html(registerText);
                        $btnRegister.attr("disabled", false);
                    });
                }
            }
        }
        var vm = new registerViewModel();

        ko.applyBindings(vm, $("#registerBlock")[0]);

        $("#signup").on("shown.bs.modal",function () {
            vm.emailAddress("");
            vm.password("");
            vm.confirmPassword("");
        })
    })
</script>
<?php endif;?>