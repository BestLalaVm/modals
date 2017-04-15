<div style="display: none">
    <?= form_open(site_url("home/login"), array("class" => "form-vertical login-form")) ?>
    <h3 class="form-title">登入</h3>
    <div class="alert alert-error <?php echo(empty($errorMessage) ? "hide" : "") ?>">
        <button class="close" data-dismiss="alert"></button>
        <span><?php echo $errorMessage; ?></span>
    </div>
    <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">用户名</label>
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-user"></i>
                <?php echo form_input("userName", $userName, array("placeholder" => "用户名", "class" => "m-wrap placeholder-no-fix")); ?>
                <div class="form-validation-error"><?php echo form_error("userName") ?></div>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">密码</label>
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <?php echo form_password("password", $password, array("placeholder" => "密码", "class" => "m-wrap placeholder-no-fix")); ?>
                <div class="form-validation-error"><?php echo form_error("password") ?></div>

            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn green pull-right">
            登入 <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
    <?= form_close(); ?>

</div>
<div class="alert alert-error form-validation-error <?php echo(empty($errorMessage) ? "hide" : "") ?>">
    <button class="close" data-dismiss="alert"></button>
    <span><?php echo $errorMessage; ?></span>
</div>
<div class="message">管理登录</div>
<div id="darkbannerwrap"></div>

<?= form_open(site_url("home/login"), array("class" => "form-vertical login-form")) ?>
    <input name="action" value="login" type="hidden">
<?php echo form_input("userName", $userName, array("placeholder" => "用户名", "class" => "m-wrap placeholder-no-fix")); ?>
<div class="form-validation-error"><?php echo form_error("userName") ?></div>
    <hr class="hr15">
<?php echo form_password("password", $password, array("placeholder" => "密码", "class" => "m-wrap placeholder-no-fix")); ?>
<div class="form-validation-error"><?php echo form_error("password") ?></div>
    <hr class="hr15">
<input value="登录" style="width:100%;" type="submit">

    <hr class="hr20">
<?= form_close(); ?>
<style type="text/css">
    .form-validation-error
    {
        color: red;
    }
</style>
