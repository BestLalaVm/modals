<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 9:19 AM
 */
?>
<div class="row" id="divwistListContainer">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox myAddress wishList">
                <h4>收藏列表</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>模型名称</th>
                            <th>简介</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach:datas">
                        <tr>
                            <td class="col-md-2 col-sm-3">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-bind="click:$parent.events.remove"><span
                                            aria-hidden="true">×</span></button>
                                <span class="cartImage"><img data-bind="attr:{src:smallImage,alt:name}" alt="image" style="max-width: 80px;max-height: 80px;"></span>
                            </td>
                            <td data-bind="html:name"></td>
                            <td data-bind="html:introducation"></td>
                            <td>
                                <a class="btn btn-default" href="#" data-bind="visible:alreadyInShippingCart" style="background-color: #d0d0d0;">已在购物车</a>
                                <a class="btn btn-default" href="#" data-bind="click:$parent.events.add2ShoppingCart,visible:!alreadyInShippingCart()"  >加入购物车<span data-bind="html:$parent.alreadyInShippingCart"></span></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var wishlistViewModel = function () {
                var self = this;
                self.datas = ko.observableArray();

                self.paginations = {
                    totalCount: ko.observable(0),
                    pageIndex: ko.observable(1),
                    pageSize: ko.observable(6)
                }
                self.paginations.totalPages = ko.computed(function () {
                    return Math.ceil(self.paginations.totalCount() / self.paginations.pageSize());
                });

                self.paginations.pageIndex.subscribe(function (nv) {
                    self.query();
                });

                self.query = function () {
                    $.get("<?php echo site_url("shop/profile/getWishList")?>", {
                        pageIndex:self.paginations.pageIndex(),
                        pageSize:self.paginations.pageSize()
                    }, function (d) {
                        var ds=[];
                        for(var index=0;index<d.datas.length;index++){
                            var item = d.datas[index];
                            item.alreadyInShippingCart = ko.observable(false);
                            if(item.shoppingCartId){
                                item.alreadyInShippingCart(true);
                            }
                            ds.push(item);
                        }
                        self.datas(ds);
                        self.paginations.totalCount(d.totalCount);
                        self.paginations.pageIndex(d.pageIndex);
                        self.paginations.pageSize(d.pageSize);
                    }, "json");
                };

                self.events={
                    add2ShoppingCart:function (d) {
                        window.modalUtil.addShoppingCart(d.modal_id,d.meterial_id, 1,function () {
                            d.alreadyInShippingCart(true);
                        });
                    },
                    remove:function (d) {
                        if(!confirm("是否确认删除该数据?")){
                            return;
                        }
                        window.modalUtil.removeWishList(d.modal_id,function () {
                            self.datas.remove(d);
                        });
                    }
                }
            }

            window.profile["wishlist"]=new wishlistViewModel();
            ko.applyBindings(window.profile["wishlist"], $("#divwistListContainer")[0]);
        })
    </script>
</div>