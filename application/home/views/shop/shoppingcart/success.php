<!-- LIGHT SECTION -->
<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="page-title">
                    <h2>购物车</h2>
                </div>
            </div>
            <div class="col-xs-6">
                <ol class="breadcrumb pull-right">
                    <li>
                        <a href="<?php echo site_url("shop/home/index"); ?>">首页</a>
                    </li>
                    <li class="active">订单完成</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT SECTION -->
<section class="mainContent clearfix cartListWrapper setp5" id="shoppingCartContainer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="innerWrapper clearfix stepsPage">
                    <?=$this->load->view("shop/shoppingcart/_shippingcartNav",array("step"=>"5"),true);?>
                    <div class="thanksContent">
                        <h2>谢谢您的订单 <small>我们将尽快完成模型制作并发货</small></h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>模型名称</th>
                                    <th></th>
                                    <th>材料</th>
                                    <th>重量(g)</th>
                                    <th>尺寸</th>
                                    <th>数量</th>
                                    <th>单价(元/g)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data["items"] as $item):?>
                                <tr>
                                    <td class="col-xs-3">
                                        <a href="<?=site_url("shop/modal/detail/".$item["modalId"])?>" style="color: #000;"><?php echo $item["modalName"];?></a>
                                    </td>
                                    <td class="col-xs-2">
                                        <div class="img-thumbnail">
                                            <img src="<?php echo $item["modalSmallImage"];?>" style="width: 80px;height: 60px;"/>
                                        </div>

                                    </td>
                                    <td class="col-xs-2">
                                        <?php echo $item["meterialName"];?>
                                    </td>
                                    <td class="col-xs-1">
                                        <?php echo $item["weight"];?>
                                    </td>
                                    <td class="col-xs-1">
                                        <?php echo $item["size"];?>
                                    </td>

                                    <td class="col-xs-1">
                                        <?php echo $item["quantity"];?>
                                    </td>
                                    <td class="col-xs-1">
                                        <?php echo $item["price"];?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <h3>送货信息</h3>
                        <div class="thanksInner">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 tableBlcok">
                                    <address>
                                        <span>收货人:</span> <a href="#"><?php echo $data["shippingTelephone"];?></a> <br>
                                        <span>手机:</span> <a href="#"><?php echo $data["shippingName"];?></a> <br>
                                        <span>送货地址:</span><?php echo $data["shippingAddress"];?>
                                    </address>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="well">
                                        <h2><small>订单号</small><?=$data["number"]?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>