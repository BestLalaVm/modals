<div class="row productsContent modalsContent" id="relativeModal">
    <div class="col-xs-12">
        <div class="page-header">
            <h4>相关模型</h4>
        </div>
    </div>
    <!--ko foreach:datas-->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="productBox">
            <div class="productImage clearfix">
                <img src="#" alt="products-img" data-bind="attr:{alt:name,src:thumbImage}">
                <div class="productMasking">
                    <ul class="list-inline btn-group" role="group">
                        <li><a data-toggle="modal" href="#" class="btn btn-default"><i
                                        class="fa fa-heart"></i></a>
                        </li>
                        <li><a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <li><a class="btn btn-default" data-bind="visible:isDownloadable=='1',attr:{href:attachment}" href="#"><i
                                        class="fa fa-download"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <a data-bind="attr:{href:('<?= site_url("shop/modal/detail?id=")?>'+id)}">
                    <h5 data-bind="html:name"></h5>
                    <h3 data-bind="html:introducation"></h3>
                </a>
            </div>
        </div>
    </div>
    <!--/ko-->
    <div class="col-md-3 col-sm-6 col-xs-12" data-bind="visible:(datas().length==0)">
        无相关模型
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var relativeModalViewModel = function () {
            var self = this;

            self.datas = ko.observableArray([]);
            self.query = function () {
                $.post("<?php echo site_url("modal/getRelativeOverviewModals")?>", {
                    "relativeTagIds":<?php echo json_encode($tags);?>,
                    "excludeModalId": "<?php echo $excludeModalId;?>"
                }, function (d) {
                    self.datas(d.datas);
                }, "json");
            }
        }

        var rvm = new relativeModalViewModel();
        rvm.query();

        ko.applyBindings(rvm, $("#relativeModal")[0]);
    })
</script>