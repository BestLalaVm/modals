<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/23/2017
 * Time: 9:34 PM
 */
?>
<div class="list-scd">

    <div class="list_top">
        <div class="tuijian"><a href="#">精选分类</a></div>
        <a name="nav_ul"></a>
        <div class="list_more">
            <a href="<?=site_url("modal/index")?>">更多...</a>
        </div>
    </div>
    <div class="newestmodal-container">
        <div class="nav_two">
            <div class="line_1"></div>
            <div class="line_2"></div>
            <ul class="nav_ul">
                <a href="#">
                    <li id="licategory" class="active category-item" data-bind="click:function(){events.loadBycategory('');}">全部</li>
                </a>
                <?php foreach ($categories as $item): ?>
                    <a href="<?php echo(site_url("home/index") . "?categoryId=" . $item["id"]); ?>" class="active">
                        <li id="licategory<?php echo $item["id"];?>" data-bind="click:function(){events.loadBycategory('<?php echo $item["id"];?>');}" class="category-item"><?php echo $item["name"] ?></li>
                    </a>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="down_1120" class="main_list" data-bind="foreach:shownDatas">
            <!-- 输出模型列表开始 -->
            <div class="one_main">
                <a  data-bind="attr:{href:'<?=site_url("modal/detail")?>/'+id}">
                    <img width="226px" height="168px" data-bind="attr:{alt:name,src:thumbImage}">
                    <p class="main_p1" data-bind="html:name"></p>
                    <div class="hover_bg"></div>
                </a>
                <div class="main_btn">
                    <div  class="main_down" data-bind=""><a data-bind="attr:{href:attachment},visible:isDownloadable==1" target="_blank">模型下载</a></div>
                    <div  class="main_shou" data-bind="visible:addWishable,click:function(){window.modalUtil.addAddWishList(id,function(){addWishable(false);})}">收藏</div>
                    <div  class="main_shou-ex" style="margin-left: 130px;margin-top: 10px;" data-bind="visible:!addWishable()">已收藏</div>
                </div>
            </div>
            <!-- 输出模型列表结束 -->
        </div>
        <div class="empty-modals" data-bind="visible:shownDatas()==0" style="display: none;">
            找不到模型数据!
        </div>
    </div>


    <!--第五板块-->
    <div style="margin-bottom: 60px;" class="bottom_type">
        <?php echo $this->config->item("home", "3dmodal-site")["registerIntroducation"]; ?>
    </div>
    <!--第六板块-->
</div>
<script type="text/javascript">
    $(function () {
        var newestmodalViewModel = function () {
            var self = this;

            var categories = <?php echo json_encode($categories)?>;
            self.items = {};

            self.shownDatas = ko.observableArray([]);
            self.items["all"]=ko.observableArray([]);
            for (var index = 0; index < categories.length; index++) {
                var category = categories[index];
                self.items[category.id] = ko.observableArray([]);
            }

            var categoryModalsContainer = {};
            self.loadDatas=function (categoryId) {
                $(".newestmodal-container .category-item").each(function () {
                    $(this).removeClass("active");
                });
                $("#licategory"+categoryId).addClass("active");
                if(categoryModalsContainer[categoryId]){
                    self.shownDatas(categoryModalsContainer[categoryId]);
                    return;
                }
                $.get("<?php echo site_url("modal/getByCategoryId");?>", {
                    categoryId: categoryId
                }, function (d) {
                   if(categoryId)
                   {
                       self.items[categoryId](d);
                   }else
                   {
                       self.items["all"](d);
                   }
                   var ds =[];
                   for(var index=0;index<d.length;index++){
                       d[index].addWishable=ko.observable(false);
                       if(!d[index].wishId){
                           d[index].addWishable(true);
                       }
                       ds.push(d[index]);
                   }
                    categoryModalsContainer[categoryId]=ds;
                    self.shownDatas(ds);
                    setTimeout(function () {
                        initHomeSecondBlock("#down_1120");
                    },200)
                }, "json");
            }

            self.events = {
                loadBycategory: function (categoryId) {
                    self.loadDatas(categoryId);
                }
            }
        }

        var vm = new newestmodalViewModel();
        ko.applyBindings(vm, $(".newestmodal-container")[0]);
        vm.loadDatas("");
    })
</script>