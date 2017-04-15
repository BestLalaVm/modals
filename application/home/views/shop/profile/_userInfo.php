<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 9:19 AM
 */
?>
<div class="row" id="dvuserinfoBlock">
    <div class="col-xs-12">
        <div class="innerWrapper profile">
            <div class="orderBox">
                <h4>用户信息</h4>
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="thumbnail">
                        <div style="height: 154px;width: 154px;border: 1px solid #dddddd;">
                            <img data-bind="attr:{src:image}" alt="profile-image">
                        </div>
                        <div class="caption fileupload">
                            <input type="file" style="display: none;" name="imageFile">
                            <a href="#" class="btn btn-primary btn-block" role="button" data-bind="click:events.select">选择图片</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-2 col-sm-3 control-label">姓名</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value:shippingName">
                                <div data-bind="visible:!validations.shippingName()" class="form-validation-error">姓名不能为空</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 col-sm-3 control-label">手机</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value:telephone">
                                <div data-bind="visible:!validations.telephone()" class="form-validation-error">手机号码不能为空</div>
                                <div data-bind="visible:(validations.telephone() && !validations.validTelephone())" class="form-validation-error">手机号码无效</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 col-sm-3 control-label">Email Address</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="email" class="form-control" id="" placeholder="" data-bind="value:emailAddress" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 col-sm-3 control-label">送货地址</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="text" class="form-control" id="" placeholder="" data-bind="value:shippingAddress">
                                <div data-bind="visible:!validations.shippingAddress()" class="form-validation-error">送货地址不能为空</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-2 col-sm-3 control-label">描述</label>
                            <div class="col-md-10 col-sm-9">
                               <textarea class="form-control" rows="10" style="height: 200px;" data-bind="value:note"></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 2px;">
                            <label for="" class="col-md-2 col-sm-3 control-label"></label>
                            <div class="col-md-10 col-sm-9">
                               <label  class="checkbox"><input type="checkbox" data-bind="checked:isChangedPassword">修改密码?</label>
                            </div>
                        </div>
                        <div class="form-group" data-bind="visible:isChangedPassword">
                            <label for="" class="col-md-2 col-sm-3 control-label">原密码</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="password" class="form-control" id="" placeholder="" data-bind="value:oldPassword">
                                <div data-bind="visible:!validations.oldPassword()" class="form-validation-error">原密码不能为空</div>
                            </div>
                        </div>
                        <div class="form-group" data-bind="visible:isChangedPassword">
                            <label for="" class="col-md-2 col-sm-3 control-label">新密码</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="password" class="form-control" id="" placeholder="" data-bind="value:newPassword">
                                <div data-bind="visible:!validations.newPassword()" class="form-validation-error">新密码不能为空</div>
                            </div>
                        </div>
                        <div class="form-group" data-bind="visible:isChangedPassword">
                            <label for="" class="col-md-2 col-sm-3 control-label">确认密码</label>
                            <div class="col-md-10 col-sm-9">
                                <input type="password" class="form-control" id="" placeholder="" data-bind="value:confirmPassword">
                                <div data-bind="visible:!validations.confirmPassword()" class="form-validation-error">确认密码与新密码不一致</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
                                <button type="button" id="btnSave" class="btn btn-primary btn-block" data-bind="click:events.save">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var userInfoViewModel = function () {
            var self = this;
            self.telephone = ko.observable("<?= MyAuth::getCurrentUser()->telephone;?>");
            self.shippingName = ko.observable("<?= MyAuth::getCurrentUser()->shippingName;?>");
            self.shippingAddress = ko.observable("<?= MyAuth::getCurrentUser()->shippingAddress;?>");
            self.note = ko.observable("<?= MyAuth::getCurrentUser()->note;?>");
            self.isChangedPassword=ko.observable(false);
            self.emailAddress = ko.observable("<?= MyAuth::getCurrentUser()->email;?>");
            self.oldPassword = ko.observable();
            self.newPassword = ko.observable();
            self.confirmPassword = ko.observable();
            self.image = ko.observable("<?php echo MyAuth::getCurrentUser()->image;?>");

            self.toValidate = ko.observable(false);
            self.validations = {
                telephone: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.telephone()) {
                        return false;
                    }

                    return true;
                },
                validTelephone: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    var re = /^1\d{10}$/
                    if(!re.test(self.telephone())){
                        return false;
                    }
                    return true;
                },
                shippingName: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.shippingName()) {
                        return false;
                    }

                    return true;
                },
                shippingAddress: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.shippingAddress()) {
                        return false;
                    }

                    return true;
                },
                oldPassword: function () {
                    if (!self.toValidate() || !self.isChangedPassword()) {
                        return true;
                    }

                    if (!self.oldPassword()) {
                        return false;
                    }

                    return true;
                },
                newPassword: function () {
                    if (!self.toValidate()|| !self.isChangedPassword()) {
                        return true;
                    }

                    if (!self.newPassword()) {
                        return false;
                    }

                    return true;
                },
                confirmPassword: function () {
                    if (!self.toValidate()|| !self.isChangedPassword()) {
                        return true;
                    }

                    if (self.confirmPassword() != self.newPassword()) {
                        return false;
                    }

                    return true;
                }
            }

            $btnSave = $("#btnSave");
            var submitText = $btnSave.html();
            self.events = {
                save: function () {
                    self.toValidate(true);

                    if (!self.validations.oldPassword() ||!self.validations.confirmPassword() || !self.validations.telephone()|| !self.validations.validTelephone()||
                        !self.validations.shippingName()||!self.validations.shippingAddress()) {
                        return;
                    }

                    var data = {
                        "emailAddress": self.emailAddress(),
                        "oldPassword": self.oldPassword(),
                        "newPassword":self.newPassword(),
                        "confirmPassword":self.confirmPassword(),
                        "shippingName":self.shippingName(),
                        "shippingAddress":self.shippingAddress(),
                        "telephone":self.telephone(),
                        "note":self.note(),
                        "image":self.image(),
                        "isChangedPassword":self.isChangedPassword()
                    };

                    $btnSave.html("正在保存..");
                    $btnSave.attr("disabled", true);
                    $.post("<?php echo site_url("shop/profile/userInfo")?>", data, function (d) {
                        if (d.success) {
                            self.isChangedPassword(false);
                            self.oldPassword("");
                            self.newPassword("");
                            self.confirmPassword("");
                            self.toValidate(false);
                            alert("保存成功!");
                        } else {
                            alert(d.message);
                        }
                    }, "json").always(function () {
                        $btnSave.html(submitText);
                        $btnSave.attr("disabled", false);
                    });
                },
                select:function () {
                    $("input[type='file']").trigger("click");
                }
            }
        }
        var vm = new userInfoViewModel();

        $userBlockContainer =$("#dvuserinfoBlock");
        ko.applyBindings(vm, $userBlockContainer[0]);

        $userBlockContainer.find('.fileupload').fileupload({
            dataType: 'json',
            method:"Post",
            param:"file",
            url: "<?=site_url("ajax/uploadImage"); ?>",
            add: function (e, data) {
                data.submit();
            },
            done: function (e, data) {
                if(data.result.success)
                {
                    vm.image(data.result.imageUrl);
                }
            }
        });
    })
</script>