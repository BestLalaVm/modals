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
                    <li class="active">我的购物车</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT SECTION -->
<section class="mainContent clearfix cartListWrapper stepsWrapper" id="shoppingCartContainer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="innerWrapper clearfix stepsPage">
                    <?=$this->load->view("shop/shoppingcart/_shippingcartNav",array("step"=>"1"),true);?>
                    <div class="shopping-items" data-bind="visible:step()==0" style="min-height: 100px;">
                        <div class="cartListInner" data-bind="visible:hasItems">
                            <form action="#">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>模型名称</th>
                                            <th>材料</th>
                                            <th>单价(元/g)</th>
                                            <th>重量(g)</th>
                                            <th>尺寸</th>
                                            <th>数量</th>
                                            <th>总价</th>
                                        </tr>
                                        </thead>
                                        <tbody data-bind="foreach:items">
                                        <tr data-bind="css:(meterials.length>0)?'':'warn'">
                                            <td class="col-xs-1">
                                                <button type="button" class="close" data-bind="click:$parent.events.remove">
                                                    <span aria-hidden="true" >&times;</span>
                                                </button>
                                                <span class="cartImage"><img data-bind="attr:{src:smallimage,alt:name}"
                                                                             style="width: 50px;height: 48px;"></span>
                                            </td>
                                            <td class="col-xs-2">
                                                <a href="#" data-bind="attr:{href:('<?=site_url("shop/modal/detail/")?>'+modal_id)},html:name" target="_blank" style="color: #000;"></a>
                                            </td>
                                            <td class="col-xs-3">
                                                <div class="dropdown" style="display: inline-flex;" data-bind="visible:(meterials.length>0)">
                                                    <div class="dropdown-input" data-bind="html:meterialText" style="padding: 5px;"></div>
                                                    <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
                                                            data-toggle="dropdown" >
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" data-bind="foreach:meterials">
                                                        <li role="presentation" style="border-bottom: 1px solid #ddd;padding: 10px 0px;">
                                                            <a role="menuitem" tabindex="-1" href="#" data-bind="click:$parent.events.selectMeterial">
                                                                <div class="row-fluid" style="margin-bottom: 2px;"><strong>材料名称:</strong> <span data-bind="html:name"></span></div>
                                                                <div style="display: inline-block; vertical-align: top;">
                                                                    <img data-bind="attr:{src:smallImage}" style="width:60px;height:50px;">
                                                                </div>
                                                                <div style="display: inline-block;">
                                                                    <div class="col-sm-4">精度:<span data-bind="html:accuracy"></span></div>
                                                                    <div class="col-sm-6" style="margin-bottom: 5px;">尺寸:<span data-bind="html:size"></span></div>
                                                                    <div class="col-sm-4">单价:<span data-bind="html:price"></span></div>
                                                                    <div class="col-sm-6">周期:<span data-bind="html:workday"></span></div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div data-bind="visible:(meterials.length==0)" class="warn-text">对不起, 无相应的材料信息,因此无法购买!</div>
                                            </td>
                                            <td class="col-xs-2" data-bind="html:selectedPrice"></td>
                                            <td class="col-xs-1">
                                                <input type="number" data-bind="value:weight" min="1">
                                            </td>
                                            <td class="col-xs-1">
                                                <input type="text" data-bind="value:size">
                                            </td>
                                            <td class="col-xs-1">
                                                <input type="number" data-bind="value:quantity" min="1">
                                            </td>
                                            <td class="col-xs-1" data-bind="html:totalPrice">$ 99.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row totalAmountArea">
                                    <div class="col-sm-4 col-sm-offset-8 col-xs-12">
                                        <ul class="list-unstyled">
                                            <li>总金额<span class="grandTotal" data-bind="html:totalPrice">$ 810.00</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="checkBtnArea">
                                    <a href="#" data-bind="click:events.next" class="btn btn-primary btn-block">下一步<i
                                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                </div>
                            </form>
                        </div>
                        <div class="empty" data-bind="visible:!hasItems()" style="display: none;">
                            购物车为空, 无任何模型!
                        </div>
                    </div>
                    <div class="shopping-address" data-bind="visible:step()==1">
                        <form action="#" class="row" method="POST" role="form">
                            <div class="col-xs-12">
                                <div class="page-header">
                                    <h4>收货人详细信息</h4>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12">
                                <label for="">收货人</label>
                                <input type="text" class="form-control" data-bind="value:shippingAddress.firstName">
                                <div class="form-validation-error" data-bind="visible:!validations.firstName()">收货地址无效!</div>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12">
                                <label for="">联系电话</label>
                                <input type="text" class="form-control"  data-bind="value:shippingAddress.telephone">
                                <div class="form-validation-error" data-bind="visible:!validations.telephone()">收货地址无效!</div>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12">
                                <label for="">收货地址</label>
                                <input type="email" class="form-control"  data-bind="value:shippingAddress.address">
                                <div class="form-validation-error" data-bind="visible:!validations.address()">收货地址无效!</div>
                            </div>
                            <div class="col-xs-12">
                                <div class="well well-lg clearfix">
                                    <ul class="pager">
                                        <li class="previous"><a href="#" class="hideContent" style="display: inline-block;" data-bind="click:events.prev">上一步</a></li>
                                        <li class="next"><a href="#" data-bind="click:events.checkout,enable:!issubmit()">马上下单</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="loading-shoppingcart" style="display: block;">
    <div class="loading-image"></div>
</div>

<script type="text/javascript">
    $(function () {
        var shoppingCartItem = function (d,$p) {
            var self = this;

            self.id = d.id;
            self.modal_id = d.modal_id;
            self.quantity = ko.observable(d.quantity);
            self.weight = ko.observable(d.weight);
            self.size = ko.observable(d.size);

            self.name = d.name;
            self.shoppingcartMeterialId = ko.observable();
            self.smallimage = d.smallimage;
            self.meterials = d.meterials;

            self.selectedMeterial=ko.observable();
            self.meterialText = ko.computed(function () {
                var xd = self.selectedMeterial();
                if(xd!=null)
                {
                    self.shoppingcartMeterialId(xd.id);
                    return "<div class='col-sm-3'><img src='"+xd.smallImage+"' style='height: 40px;'></div><div class='col-sm-9'>"+
                            "<div class='col-sm-12' style='padding: 0px;'>"+xd.name+
                            "</div><div class='col-sm-4' style='padding: 0px;'>精度:"+xd.accuracy+"</div><div class='col-sm-8' style='padding: 0px;'>尺寸:"+xd.size+"</div>";
                }
            });
            self.selectedPrice=ko.computed(function () {
                var xd = self.selectedMeterial();
                if(xd!=null)
                {
                    return xd.price;
                }
                return "0.00";
            });

            self.shoppingcartMeterialId.subscribe(function (id) {
                var meterialItems = self.meterials;
                if(meterialItems==null){
                    return;
                }
                for(var index=0;index<meterialItems.length;index++){
                    if(meterialItems[index].id==id){
                        self.selectedMeterial(meterialItems[index]);
                    }
                }
            });
            self.shoppingcartMeterialId(d.shoppingcartMeterialId);

            self.totalPrice=ko.computed(function () {
                if(self.quantity()<=0){
                    self.quantity(1);
                }
                if(self.weight()<=0){
                    self.weight(1);
                }

                $p.triggerTotalPoints($p.triggerTotalPoints());
                var tl = self.quantity() * self.selectedPrice() * self.weight();

                return tl.toFixed(2);
            });

            self.events={
                selectMeterial:function (d) {
                    self.selectedMeterial(d);
                }
            }
        }

        var shoppingCartViewModel = function () {
            var self = this;

            self.triggerTotalPoints = ko.observable();
            var isInitialzie=false;
            self.items = ko.observableArray();
            self.hasItems=ko.computed(function () {
               var flag = self.items().length>0;
               if(!isInitialzie){
                   return true;
               }

               return flag;
            });
            var getItems = function () {
                $.get("<?php echo site_url("shop/shoppingcart/getShoppingCartItems")?>", {}, function (d) {
                    if (d.success) {
                        var dis = [];
                        for (var i = 0; i < d.data.length; i++) {
                            dis.push(new shoppingCartItem(d.data[i],self));
                        }
                        self.items(dis);
                        $(".loading-shoppingcart").hide();
                    } else {
                        window.location.href = d.redirectUrl;
                    }
                    isInitialzie=true;
                }, "json");
            }
            self.step=ko.observable(0);
            self.ishoppingcartChanged=ko.observable(false);
            self.shippingAddress={
                firstName:ko.observable('<?=MyAuth::getCurrentUser()->shippingName;?>'),
                telephone:ko.observable('<?=MyAuth::getCurrentUser()->telephone;?>'),
                address:ko.observable('<?=MyAuth::getCurrentUser()->shippingAddress;?>'),
            };

            self.issubmit=ko.observable(false);
            self.toValidate=ko.observable(false);
            self.validations ={
                firstName:function () {
                    if(!self.toValidate()){
                        return true;
                    }

                    if(!self.shippingAddress.firstName()){
                        return false;
                    }

                    return true;
                },
                telephone:function () {
                    if(!self.toValidate()){
                        return true;
                    }

                    if(!self.shippingAddress.telephone()){
                        return false;
                    }

                    return true;
                },
                address:function () {
                    if(!self.toValidate()){
                        return true;
                    }

                    if(!self.shippingAddress.address()){
                        return false;
                    }

                    return true;
                }
            }
            self.events={
                remove:function (d) {
                    $.post("<?=site_url("shop/shoppingcart/removeItem");?>/"+d.id,{},function (x) {
                        if(x.success){
                            self.items.remove(d);
                        }else{
                            if(x.redirectUrl){
                                window.location.href=x.redirectUrl;
                            }else{
                                alert(x.message);
                            }
                        }
                    },"json").always(function () {

                    });
                },
                next:function () {
                    var data=[];
                    for(var index=0;index<self.items().length;index++){
                        var item = self.items()[index];
                        data.push({
                            id:item.id,
                            quantity:item.quantity(),
                            weight:item.weight(),
                            size:item.size(),
                            meterialId:item.shoppingcartMeterialId()
                        });
                    }

                    $.post("<?=site_url("shop/shoppingcart/update")?>",{"data":data},function (d) {
                        if(d.success){
                            self.step(1);
                        }else {
                            alert("chengg111!");
                        }
                    },"json").always(function () {

                    });
                },
                prev:function () {
                    self.step(0);
                },
                checkout:function () {
                    self.toValidate(true);
                    if(self.validations.firstName() && self.validations.address() && self.validations.telephone()) {
                        self.issubmit(true);
                        var shippingAddress={
                            shippingName:self.shippingAddress.firstName(),
                            shippingTelephone:self.shippingAddress.telephone(),
                            shippingAddress:self.shippingAddress.address()
                        };
                        $.post("<?=site_url("shop/order/checkout")?>",{"shippingAddress":shippingAddress},function (d) {
                            if(d.success){
                                window.location.href=d.redirectUrl;
                            }else {
                                alert(d.message);
                                setTimeout(function () {
                                    window.location.reload();
                                },2000);
                            }
                        },"json").always(function () {
                            self.issubmit(false);
                        });
                    }
                }
            }

            var init = function () {
                getItems();
            }

            self.totalPrice=ko.computed(function () {
                var x=self.triggerTotalPoints();
                var tl=0;
                for(var index=0;index<self.items().length;index++){
                    tl+=parseFloat(self.items()[index].totalPrice());
                }

                return tl.toFixed(2);
            });
            init();
        }

        var vm = new shoppingCartViewModel();
        ko.applyBindings(vm, $("#shoppingCartContainer")[0]);
    })
</script>