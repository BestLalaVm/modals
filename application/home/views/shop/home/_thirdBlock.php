<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/3/2017
 * Time: 10:29 PM
 */
?>
<div class="row" id="dvmeterialBlock">
    <div class="col-xs-12">
        <div class="yun_border"></div>
        <div class="yun_box beijing">
            <div class="sw-grid" style="padding-left: 28px">
                <h3 class="block-title" style="padding-right: 28px"><span class="title-inner">多种打印材料可选</span></h3>
                <ul class="cailiao">
                    <!--ko foreach:items-->
                    <li class="col-1-3">
                        <div class="cailiao_block">
                            <img class="lazydown" data-bind="attr:{src:image}" style="display: inline;">
                            <h4  data-bind="html:name">光敏树脂</h4>
                            <div class="cai_k1">
                                <ul>
                                    <li>
                                        <div class="tedian left">特点</div>
                                        <div class="tedian_con left" data-bind="html:special">精度高，边界清晰，表面光滑，有质感。颜色选择有限，可以打印透明效果。容易上色。强度一般。</div></li>
                                    <li>
                                        <div class="tedian left">精度</div>
                                        <div class="tedian_con left" ><!--ko text:accuracy--><!--/ko-->mm</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="cai_k2">
                                <div class="shihe left"><span class="icon-ok"></span>适合做</div>
                                <p class="shihe-con left" style="padding-top:8px;" data-bind="html:suitableProduct">复杂的设计和各类雕塑<br>高精度模型，工业手板</p>
                            </div>
                            <div class="cai_k3">
                                <div class="shihe left"><span class="icon-no"></span>不适合做</div>
                                <p class="shihe-con left " style="padding-top:15px;" data-bind="html:unSuitableProduct">超大型件</p>
                            </div>
                        </div>
                    </li>
                    <!--/ko-->

                    <li class="col-1-3">
                        <div class="cailiao_block" style="background:url('http://res.mohou.com/images/new/cloud-show/cailiao6.jpg') no-repeat;height: 584px;">
                            <p style="margin-top: 180px; color: #fff;font-size: 17px;text-align: center;line-height: 30px;">除了以上材料，还有<br><span style="font-size: 20px;font-weight: bold;">金属、透明树脂、<br>ABS、陶瓷、红/蓝蜡</span><br>等等</p>
                            <a class="btn-jianbian btn-carousel" style="display: block;margin: 0 auto; width: 180px;font-size: 24px;margin-top: 16px;" href="#">更多材料</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var meterialViewModel = function () {
            var self = this;

            self.items = ko.observableArray([]);

            var init=function () {
                var mdata =  <?=json_encode($data["meterials"]);?>;
                self.items(mdata.datas);
            }

            init();
        }

        ko.applyBindings(new meterialViewModel(), $("#dvmeterialBlock")[0]);
    })
</script>