<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 9:19 AM
 */
?>
<div class="row" id="divModalContainer">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox myAddress wishList">
                <h4>我的模型列表</h4>
                <div class="table-responsive">
                    <div class="table">
                        <a href="<?= site_url("shop/profile/modaldetail") ?>" data-toggle="modal" class="btn btn-link">新增模型</a>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>模型名称</th>
                            <th>关键字</th>
                            <th>是否发布</th>
                            <th>开始发布时间</th>
                            <th>结束发布时间</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--ko foreach:datas-->
                        <tr>
                            <td class="col-md-2 col-sm-3">
                                <span data-bind="click:$parent.events.remove" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></span>
                                <span class="cartImage"><img data-bind="attr:{src:smallImage,alt:name}" style="max-width: 70px;max-height: 68px;"></span>
                            </td>
                            <td>
                                <a data-bind="html:name,attr:{href:'<?=site_url("shop/profile/modaldetail/")?>'+id}" style="font-size: 12px; color: #fff;"></a>
                            </td>
                            <td data-bind="html:keyword"></td>
                            <td><input type="checkbox" disabled="disabled" data-bind="checked:(isPublished==1)"> </td>
                            <td data-bind="html:publishedDateFrom"></td>
                            <td data-bind="html:publishedDateTo"></td>
                            <td>
                                <a class="btn btn-default" href="#" data-bind="click:function(){window.modalUtil.addShoppingCart(id,meterialId,1);},visible:meterialId">加入购物车</a>
                            </td>
                        </tr>
                        <!--/ko-->
                        <tr data-bind="visible:paginations.totalPages()>1">
                            <td><a href="#" class="btn btn-default" data-bind="css:(paginations.pageIndex()<=1?'disabled':''),click:function(){if(paginations.pageIndex()<=1)return;paginations.pageIndex(paginations.pageIndex()-1);}">上一页</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="#" class="btn btn-default" data-bind="css:(paginations.pageIndex()>=paginations.totalPages()?'disabled':''),click:function(){if(paginations.pageIndex()>=paginations.totalPages())return;paginations.pageIndex(paginations.pageIndex()+1);}">下一页</a></td>
                        </tr>
                        <tr data-bind="visible:(datas().length==0)">
                            <td colspan="2" style="text-align: left;">无任何模型</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var modalViewModel = function () {
                var self = this;

                self.datas = ko.observableArray([]);
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
                    $.get("<?php echo site_url("shop/profile/getModals")?>", {
                        pageIndex:self.paginations.pageIndex(),
                        pageSize:self.paginations.pageSize()
                    }, function (d) {
                        self.datas(d.datas);
                        self.paginations.totalCount(d.totalCount);
                        self.paginations.pageIndex(d.pageIndex);
                        self.paginations.pageSize(d.pageSize);
                    }, "json");
                };
                var isSubmiting = false;
                self.events={
                    remove:function ($d) {
                        if (isSubmiting) {
                            return;
                        }
                        var data={
                            id:$d.id
                        };
                        if(!confirm("是否确认删除该数据?")){
                            return;
                        }
                        $.post("<?php echo site_url("shop/profile/modaldelete")?>", data, function (d) {
                            if (d.success) {
                                self.query();
                            } else {
                                alert(d.message);
                            }
                        }, "json").always(function () {

                        });
                    }
                }
            }

            window.profile["modals"]=new modalViewModel();
            ko.applyBindings(window.profile["modals"], $("#divModalContainer")[0]);
        })
    </script>
</div>
<style type="text/css">
    #divModalContainer a{
        color: rgb(51, 122, 183) !important;
        text-decoration: underline;
    }
</style>