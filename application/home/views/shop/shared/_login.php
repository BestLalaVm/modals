<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/3/2017
 * Time: 10:24 PM
 */
?>
<?php if(true || !MyAuth::isLogin()):?>
<div class="modal fade login-modal" id="login" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="loginBlock">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">登入云端系统</h3>
            </div>
            <div class="modal-body">
                <?=$this->load->view("shop/shared/_loginBlock",array("sucessCallback"=>"successCallBack","uniqueId"=>"toplayoutLoginBlock"),true);?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>