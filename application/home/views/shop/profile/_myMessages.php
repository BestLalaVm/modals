<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 9:20 AM
 */
?>
<div class="row" id="divMessageContainer">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox">
                <h4>我的消息</h4>
                <div class="table-responsive" data-bind="foreach:datas">
                    <div class="alert alert-success fade in">
                        <div data-bind="html:content">
                            Change a few things up and try submitting again.
                        </div>
                        <div style="text-align: right;"><span><i class="fa fa-calendar" aria-hidden="true"></i><label style="margin-left: 5px;" data-bind="html:createdTime">2015-01-01 11:01:02</label></span></div>
                    </div>
                </div>
                <div class="table-responsive" data-bind="visible:datas().length==0">
                    暂无消息
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var messagesViewModel = function () {
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
                    $.get("<?php echo site_url("shop/profile/getMessages")?>", {
                        pageIndex:self.paginations.pageIndex(),
                        pageSize:self.paginations.pageSize()
                    }, function (d) {
                        self.datas(d.datas);
                        self.paginations.totalCount(d.totalCount);
                        self.paginations.pageIndex(d.pageIndex);
                        self.paginations.pageSize(d.pageSize);
                    }, "json");
                };
            }

            window.profile["message"]=new messagesViewModel();
            ko.applyBindings(window.profile["message"], $("#divMessageContainer")[0]);
        })
    </script>
</div>
