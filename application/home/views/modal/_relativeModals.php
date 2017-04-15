<div style="text-align: center;" id="relativeModal">
    <div class="relative-modal-list" data-bind="foreach:datas">
        <div class="item">
            <div class="one_main">
                <img width="226px" height="168px" data-bind="attr:{alt:name,src:thumbImage}">
                <div class="item-description">
                    <a href="#" data-bind="attr:{href:('<?php echo site_url("modal/detail"); ?>'+'/'+id)}">
                        <div class="title" data-bind="html:name"></div>
                    </a>
                    <div class="intro" data-bind="html:introducation"></div>
                </div>

                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var relativeModalViewModel = function () {
            var self = this;

            self.datas = ko.observableArray([]);
            self.query = function () {
                $.post("<?php echo site_url("modal/getRelativeOverviewModals")?>", {"relativeTagIds":<?php echo json_encode($tags);?>,"excludeModalId":"<?php echo $excludeModalId;?>"}, function (d) {
                    self.datas(d.datas);
                }, "json");
            }
        }

        var rvm = new relativeModalViewModel();
        rvm.query();

        ko.applyBindings(rvm, $("#relativeModal")[0]);
    })
</script>