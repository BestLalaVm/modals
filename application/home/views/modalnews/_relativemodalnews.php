<div style="text-align: center;" id="relativeModalNew">
    <div class="section-box relative-modalnew-list" data-bind="foreach:datas">
        <div class="list-box clearfix">
            <h1 class="text-overflow list-title">
                <a href="#" data-bind="html:name,attr:{href:('<?= site_url("modalnews/detail")?>/'+id)}">军民融合“海淀之路”是怎样趟出来的？</a>
            </h1>
            <div class="list-body justify" data-bind="html:introducation"></div>
            <div class="grey14 " style="text-align: right;margin-top: 10px;"><span class="glyphicon glyphicon-calendar"></span><label data-bind="html:createdTimeLabel"></label></div>
        </div>

    </div>

    <div class="">
        <div class="item">
            <a ></a>
            <div ></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var relativeModalNewsViewModel = function () {
            var self = this;

            self.datas = ko.observableArray([]);
            self.query = function () {
                $.post("<?php echo site_url("modalnews/getRelativeOverviewNews")?>", {"relativeTagIds":<?php echo json_encode($tags);?>}, function (d) {
                    self.datas(d.datas);
                }, "json");
            }
        }

        var rvm = new relativeModalNewsViewModel();
        rvm.query();

        ko.applyBindings(rvm, $("#relativeModalNew")[0]);
    })
</script>