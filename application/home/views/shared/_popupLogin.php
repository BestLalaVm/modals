<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/23/2017
 * Time: 9:18 PM
 */
?>
<div style="display:none;" id="ajaxloginform" name="ajaxloginform">
    <input type="hidden" name="retURL" id="retURL" value=""/>
    <div class="login-c" style="background:#fff;">
        <div class="ajaxloginclose">X</div>
        <div class="login-head">
            账号密码登录
        </div>
        <div class="login-form">
            <div class="login-input">
                <i class="icon-email"></i>
                <input id="email" type="email" name="userEmail" placeholder="请输入登录邮箱"/>
                <i class="icon-clear"></i>
                <p></p>
            </div>
            <div class="login-input">
                <i class="icon-lock"></i>
                <input id="password" type="password" name="password" placeholder="请输入登录密码"/>
                <i class="icon-keyboard"></i>
            </div>
<!--
            <div class="login-row" style="height: 24px;">
                <input type="checkbox" id="rememberPWD" name="rememberPWD"/>记住我的密码一周？
            </div>-->
            <div class="login-row">
                <button class="login-sumbit" type="submit">登录</button>
            </div>
            <div class="login-row" style="height: 20px;">
                <a class="link" href="#" style="float: left;">忘记密码？</a>
                <a class="link" href="#" style="float: right;">免费注册</a>
            </div>

        </div>
        <div class="login-foot">
            <div class="hr"></div>
            <div class="hr"></div>
            <div class="hr"></div>
            <div class="hr"></div>
        </div>
    </div>
</div>
