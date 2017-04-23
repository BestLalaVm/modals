<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 9:19 AM
 */
?>
<div class="row" id="divrequirementsContainer">
    <div class="col-xs-12">
        <div class="innerWrapper">
            <div class="orderBox myAddress wishList">
                <h4>我的模型需求</h4>
                <div class="table-responsive">
                    <div class="table">
                        <a href="#newRequirement" data-toggle="modal" class="btn btn-link">新增需求</a>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>我的需求</th>
                            <th width="400px">推荐模型</th>
                            <th width="100px"></th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach:datas">
                        <tr>
                            <td data-bind="html:description">Italian Winter Hat</td>
                            <td data-bind="html:modalName">In Stock</td>
                            <td class="col-md-2 col-sm-3">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-bind="click:$parent.events.remove"><span
                                            aria-hidden="true">×</span></button>
                            </td>
                        </tr>
                        </tbody>
                        <tbody data-bind="visible:(datas().length==0)">
                          <tr>
                              <td colspan="2" style="text-align: left;">无任何需求</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" data-backdrop="static" id="newRequirement" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="registerBlock">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title">我的模型需求</h3>
                </div>
                <div class="modal-body form-horizontal profile">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-2 col-sm-3 control-label">内容</label>
                            <div class="col-md-10 col-sm-9">
                                <textarea class="form-control" rows="10" style="height: 200px;"
                                          data-bind="value:description"></textarea>
                                <div data-bind="visible:!valdaitions.description()" class="form-validation-error">需求内容不能为空</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-10 col-md-2 col-sm-offset-9 col-sm-3">
                                <button type="button" id="btnSaveRequirement" class="btn btn-primary btn-block"
                                        data-bind="click:events.add">提交
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var requirementViewModel = function () {
                var self = this;

                self.description = ko.observable();
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

                self.toValidate = ko.observable(false);
                self.valdaitions = {
                    description: function () {
                        if (!self.toValidate()) {
                            return true;
                        }

                        if (!self.description()) {
                            return false;
                        }

                        return true;
                    }
                };

                self.query = function () {
                    $.get("<?php echo site_url("shop/profile/getRequirements")?>", {
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
                var $btnSaveRequirement = $("#btnSaveRequirement");
                var submitText = $btnSaveRequirement.html();
                self.events = {
                    add: function () {
                        if (isSubmiting) {
                            return;
                        }
                        self.toValidate(true);
                        if(!self.valdaitions.description())
                        {
                            return;
                        }
                        $btnSaveRequirement.html("正在保存..");
                        $btnSaveRequirement.attr("disabled", true);
                        var data = {
                            "description": self.description()
                        };
                        isSubmiting = true;
                        $.post("<?php echo site_url("shop/profile/createRequirement")?>", data, function (d) {
                            if (d.success) {
                                self.query();
                                $("#newRequirement").modal("hide");
                            } else {
                                alert(d.message);
                            }
                        }, "json").always(function () {
                            isSubmiting = false;
                            $btnSaveRequirement.html(submitText);
                            $btnSaveRequirement.attr("disabled", false);
                        });
                    },
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
                        $.post("<?php echo site_url("shop/profile/deleteRequirement")?>", data, function (d) {
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

            window.profile["requirements"]=new requirementViewModel();
            ko.applyBindings(window.profile["requirements"], $("#divrequirementsContainer")[0]);
            $("#newRequirement").on("shown.bs.modal",function () {
                window.profile["requirements"].toValidate(false);
                window.profile["requirements"].description("");
            });
        })
    </script>
</div>