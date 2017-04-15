<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 9:20 AM
 */
?>
<div class="row" id="myOrders">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox">
                <h4 data-bind="visible:!isloadItem()">我的订单列表</h4>
                <div class="table-responsive" data-bind="visible:!isloadItem()">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>订单号</th>
                            <th>总金额</th>
                            <th>订单状态</th>
                            <th>下单时间</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach:datas">
                        <tr>
                            <td data-bind="html:number">#451231</td>
                            <td data-bind="html:totalPrice">Mar 25, 2016</td>
                            <td data-bind="html:status">2</td>
                            <td data-bind="html:createdTime">$99.00</td>
                            <td><a href="#" class="btn btn-default" data-bind="click:$parent.events.loadItems">查看详情</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div data-bind="with:orderDetail,visible:isloadItem">
                    <div class="thanksContent">
                        <h2>订单详细:<span data-bind="html:detail.number"></span>
                        </h2>
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
                                <tbody data-bind="foreach:items">
                                <tr>
                                    <td class="col-xs-3" data-bind="html:name"></td>
                                    <td class="col-xs-2">
                                        <div class="img-thumbnail">
                                            <img data-bind="attr:{src:smallImage}" style="width: 80px;height: 60px;"/>
                                        </div>
                                    </td>
                                    <td class="col-xs-2" data-bind="html:name"></td>
                                    <td class="col-xs-1" data-bind="html:weight"></td>
                                    <td class="col-xs-1" data-bind="html:size"></td>
                                    <td class="col-xs-1" data-bind="html:quantity"></td>
                                    <td class="col-xs-1" data-bind="html:totalPrice"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 10px;">
                            <h3>送货信息</h3>
                            <div class="thanksInner">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12 tableBlcok">
                                        <address>
                                            <div class="address-item">
                                                <span>收货人:</span> <span data-bind="html:shippingAddress.name"></span> <br>
                                            </div>
                                            <div class="address-item">
                                                <span>手机:</span> <span data-bind="html:shippingAddress.telephone"></span> <br>
                                            </div>
                                            <div class="address-item">
                                                <span>送货地址:</span><span data-bind="html:shippingAddress.address"></span>
                                            </div>
                                        </address>
                                        <div class="return-link">
                                            <a  href="#" data-bind="click:$parent.events.returnList" >返回订单列表</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var orderViewModel = function () {
                var self = this;

                self.datas = ko.observableArray([]);
                self.paginations = {
                    totalCount: ko.observable(0),
                    pageIndex: ko.observable(1),
                    pageSize: ko.observable(1)
                }

                self.isloadItem = ko.observable(false);
                self.query = function () {
                    $.get("<?php echo site_url("shop/profile/getOrders")?>", {}, function (d) {
                        self.datas(d.datas);
                        self.paginations.totalCount(d.totalCount);
                        self.paginations.pageIndex(d.pageIndex);
                        self.paginations.pageSize(d.pageSize);
                    }, "json");
                };

                self.orderDetail={
                  detail:{
                      number:ko.observable(),
                      status:ko.observable(),
                      totalPrice:ko.observable(),
                  },
                  shippingAddress:{
                      name:ko.observable(),
                      telephone:ko.observable(),
                      address:ko.observable()
                  },
                  items:ko.observableArray()
                };
                self.events={
                    loadItems:function (d) {
                        self.isloadItem(true);
                        $.get("<?php echo site_url("shop/profile/getOrderItems")?>/"+d.number, {}, function (rs) {
                            self.orderDetail.shippingAddress.name(rs.data.shippingAddress.name);
                            self.orderDetail.shippingAddress.telephone(rs.data.shippingAddress.telephone);
                            self.orderDetail.shippingAddress.address(rs.data.shippingAddress.address);

                            self.orderDetail.detail.number(rs.data.detail.number);
                            self.orderDetail.detail.totalPrice(rs.data.detail.totalPrice);
                            self.orderDetail.detail.status(rs.data.detail.status);

                            self.orderDetail.items(rs.data.items);
                        }, "json");
                    },
                    returnList:function () {
                        self.isloadItem(false);
                    }
                }
            }

            window.profile["orders"]=new orderViewModel();
            ko.applyBindings(window.profile["orders"], $("#myOrders")[0]);
        })
    </script>
</div>
