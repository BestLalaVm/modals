<div class="row progress-wizard" style="border-bottom:0;">
    <div class="col-xs-3 progress-wizard-step complete <?=($step=="1"?"":"fullBar")?>" data-bind="css:(step()==1?'fullBar':'')">
        <div class="text-center progress-wizard-stepnum">购物车</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" class="progress-wizard-dot"></a>
    </div>

    <div class="col-xs-3 progress-wizard-step <?=($step=="5"?"complete fullBar":"")?>" data-bind="css:(step()==1?'active':'disabled')">
        <div class="text-center progress-wizard-stepnum">送货地址</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" class="progress-wizard-dot"></a>
    </div>

    <div class="col-xs-3 progress-wizard-step <?=($step=="5"?"complete fullBar":"disabled")?>">
        <div class="text-center progress-wizard-stepnum">支付宝支付</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" class="progress-wizard-dot"></a>
    </div>

    <div class="col-xs-3 progress-wizard-step <?=($step=="5"?"complete fullBar":"")?>">
        <div class="text-center progress-wizard-stepnum">订单成功</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a href="#" class="progress-wizard-dot"></a>
    </div>
</div>