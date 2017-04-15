<?php
$relativeTagIds = array();
foreach ($data["tags"] as $tagItem) {
    $relativeTagIds[] = $tagItem["id"];
}
?>
<!-- MAIN CONTENT SECTION -->
<section class="mainContent clearfix">
    <div class="container">
        <div class="row singleProduct">
            <div class="col-xs-12" id="dvmodalContainer">
                <div class="media" style="margin-bottom: 0px;">
                    <div class="media-left" style="width: 600px">
                        <?php if ($data["shownType"] == "html"): ?>
                          <div class="shown-content">
                            <?php echo $data["shownDescription"]; ?>
                          </div>
                        <?php else: ?>
                            <?php if ($data["shownType"] == "vedio"): ?>
                                <video src="<?=$data["shownVedio"];?>" controls="controls" class="vjs-tech media-left"
                                       style="width: 489px;height: 400px;border: 1px solid #ddd;margin-right: 10px;">
                                    您的浏览器不之处视频播放
                                </video>
                            <?php else: ?>
                                <div class="productSlider">
                                    <div id="carousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php for ($index = 0; $index < count($data["shownImages"]); $index++): ?>
                                                <?php $item = $data["shownImages"][$index]; ?>
                                                <div class="item <?php echo ($index == 0) ? "active" : "" ?>"
                                                     data-thumb="<?php echo $index; ?>">
                                                    <img src="<?php echo $item["path"]; ?>" style="width: 600px;">
                                                </div>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                            <div class="carousel-inner">
                                                <?php for ($index = 0; $index < count($data["shownImages"]); $index++): ?>
                                                    <?php $item = $data["shownImages"][$index]; ?>
                                                    <div data-target="#carousel" data-slide-to="<?= $index ?>"
                                                         class="thumb">
                                                        <img src="<?php echo $item["path"]; ?>" style="max-width: 107px;">
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                            <a class="left carousel-control" href="#thumbcarousel" role="button"
                                               data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#thumbcarousel" role="button"
                                               data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="media-body">
                        <ul class="list-inline">
                            <?php if (empty($data["wishId"])): ?>
                                <li>
                                    <a href="#"
                                       onclick="window.modalUtil.addAddWishList('<?php echo $data["id"]; ?>');"><i
                                                class="fa fa-heart" aria-hidden="true"></i>收藏</a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>已收藏</a>
                                </li>
                            <?php endif; ?>
                            <?php if ($data["isDownloadable"] == "1"): ?>
                                <li><a href="<?=$data["attachment"];?>"><i class="fa fa-download" aria-hidden="true"></i>下载</a></li>
                            <?php endif; ?>
                        </ul>
                        <h2><?php echo $data["name"] ?></h2>
                        <div style="font-size: 14px;margin-left: 10px;">
                            <span><strong>模型大小:</strong></span><span><?php echo $data["attachmentSize"]; ?></span>
                        </div>
                        <div style="font-size: 14px;margin-left: 10px;margin-top: 10px;margin-bottom: 10px;">
                            <span><strong>分&nbsp;&nbsp;类:</strong> </span><span><?php echo $data["categoryName"]; ?></span>
                        </div>

                        <p style="margin-left: 10px;"><?php echo $data["introducation"]; ?> </p>
                        <span class="quick-drop" style="margin-bottom: 20px;">
                            <div class="dropdown" style="display: inline-flex;"
                                 data-bind="visible:(meterials().length>0)">
                                <div class="dropdown-input" data-bind="html:meterialText" style="padding: 5px;"></div>
                                <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
                                        data-bind="click:events.openMeterials"
                                        data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1"
                                    data-bind="foreach:meterials"
                                    style="position: fixed;width: auto;top:0px;left: 100px;">
                                    <li role="presentation" style="border-bottom: 1px solid #ddd;padding: 10px 0px;">
                                        <a role="menuitem" tabindex="-1" href="#"
                                           data-bind="click:$parent.events.selectMeterial">
                                            <div class="row-fluid"
                                                 style="margin-bottom: 2px;"><strong>材料名称:</strong> <span
                                                        data-bind="html:name"></span></div>
                                            <div style="display: inline-block; vertical-align: top;">
                                                <img data-bind="attr:{src:smallImage}" style="width:60px;height:50px;">
                                            </div>
                                            <div style="display: inline-block;">
                                                <div class="col-sm-4">精度:<span data-bind="html:accuracy"></span></div>
                                                <div class="col-sm-6" style="margin-bottom: 5px;">尺寸:<span
                                                            data-bind="html:size"></span></div>
                                                <div class="col-sm-4">单价:<span data-bind="html:price"></span></div>
                                                <div class="col-sm-6">周期:<span data-bind="html:workday"></span></div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <span><b>单价:</b><span data-bind="html:selectedPrice"></span></span>
                        </span>
                        <div class="quick-drop" style="margin-bottom: 20px;">
                            <span style="display: inline-block;width: 60px;"><b>尺寸:</b></span><input type="text"
                                                                                                     style="height: 40px;font-size: 20px;padding-left: 6px; width: 152px;"
                                                                                                     data-bind="value:size,css:(!validations.size()?'form-validate-error':'')">
                            <span style="display: inline-block;width: 40px;"><b>重量:</b></span>
                            <input type="number" style="height: 40px;font-size: 20px;width: 76px;padding-left: 6px;"
                                   min="1" max="10000000"
                                   data-bind="value:weight,css:(!validations.weight()?'form-validate-error':'')">
                        </div>
                        <br>
                        <div class="quick-drop" style="margin-bottom: 20px;">
                            <span style="display: inline-block;width: 54px;"><b>数量:</b></span>
                            <input type="number" style="height: 40px;font-size: 20px;width: 106px;padding-left: 6px;"
                                   min="1" max="100"
                                   data-bind="value:quantity,css:(!validations.quantity()?'form-validate-error':'')">
                            <span style="margin-left: 10px;"><label style="margin-right: 5px;">总报价:</label><span
                                        data-bind="html:totalPrice"></span></span>
                        </div>
                        <div class="btn-area">
                            <a href="#" class="btn btn-primary btn-block" data-bind="click:events.buy" style="width: 150px;">立即购买<i
                                        class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                        <!--
                        <div class="tabArea">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#details">详细介绍</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="details" class="tab-pane fade in active">
                                    <?php echo $data["description"]; ?>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="tabArea" style="margin-bottom: 100px;">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#details">详细介绍</a></li>
            </ul>
            <div class="tab-content">
                <div id="details" class="tab-pane fade in active" style="margin-top: 10px;">
                    <?php echo $data["description"]; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php echo $this->load->view("shop/modal/_relativeModals", array("tags" => $relativeTagIds, "excludeModalId" => $data["id"]), true); ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        var modaldetailViewModal = function () {
            var self = this;

            self.quantity = ko.observable(1);
            self.weight = ko.observable(1);
            self.size = ko.observable(1);

            self.meterialId = ko.observable();
            var ms = <?=json_encode($data["meterials"])?>;
            self.meterials = ko.observableArray(ms);
            console.log("id" + self.meterials()[0].id + "   name=" + self.meterials()[0].name);
            self.selectedMeterial = ko.observable();
            self.meterialText = ko.computed(function () {
                var xd = self.selectedMeterial();
                if (xd != null) {
                    self.meterialId(xd.id);
                    return "<div class='col-sm-3'><img src='" + xd.smallImage + "' style='height: 40px;'></div><div class='col-sm-9'>" +
                        "<div class='col-sm-12' style='padding: 0px;'>" + xd.name +
                        "</div><div class='col-sm-4' style='padding: 0px;'>精度:" + xd.accuracy + "</div><div class='col-sm-8' style='padding: 0px;'>尺寸:" + xd.size + "</div>";
                }
            });
            self.selectedPrice = ko.computed(function () {
                var xd = self.selectedMeterial();
                if (xd != null) {
                    return xd.price;
                }
                return "0.00";
            });

            self.meterialId.subscribe(function (id) {
                var meterialItems = self.meterials();
                if (meterialItems == null) {
                    return;
                }
                for (var index = 0; index < meterialItems.length; index++) {
                    if (meterialItems[index].id == id) {
                        self.selectedMeterial(meterialItems[index]);
                    }
                }
            });
            if (self.meterials().length > 0) {
                self.meterialId(self.meterials()[0].id);
            }

            self.totalPrice = ko.computed(function () {
                if (self.quantity() <= 0) {
                    self.quantity(1);
                }
                if (self.weight() <= 0) {
                    self.weight(1);
                }

                var tl = self.quantity() * self.selectedPrice() * self.weight();

                return tl.toFixed(2);
            });

            self.toValidate = ko.observable(false);
            self.validations = {
                quantity: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.quantity()) {
                        return false;
                    }

                    return true;
                },
                weight: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.weight()) {
                        return false;
                    }

                    return true;
                },
                size: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.size()) {
                        return false;
                    }

                    return true;
                },
                meterialId: function () {
                    if (!self.toValidate()) {
                        return true;
                    }

                    if (!self.meterialId()) {
                        return false;
                    }

                    return true;
                }
            }

            self.events = {
                openMeterials: function () {
                    refrashDropdown();
                },
                selectMeterial: function (d) {
                    self.selectedMeterial(d);
                },
                buy: function () {
                    self.toValidate(true);
                    if (self.validations.meterialId() & self.validations.quantity() & self.validations.size() & self.validations.weight()) {
                        var data = {
                            "modalId": "<?=$data["id"]?>",
                            "quantity": self.quantity(),
                            "weight": self.weight(),
                            "size": self.size(),
                            "meterialId": self.meterialId(),
                        }
                        $.post("<?=site_url("shop/shoppingcart/addAndBuy")?>", {"data": data}, function (d) {
                            if (d.success) {
                                if(d.redirectUrl){
                                    window.location.href = d.redirectUrl;
                                }
                            } else {
                                alert(d.message);
                            }
                        }, "json");
                    }
                }
            }
        }

        var vm = new modaldetailViewModal();
        ko.applyBindings(vm, $("#dvmodalContainer")[0]);

        $(document).scroll(function () {
            refrashDropdown();
        });
    })

    function refrashDropdown() {
        $btn = $("#dropdownMenu1");
        var offset = $btn.offset();
        $element = $("ul[aria-labelledby='dropdownMenu1']");
        $element.css("left", offset.left - $element.width() - 10);

        var scrollTop = $(document).scrollTop();
        $element.css("top", offset.top + 46 - scrollTop);
    }
</script>
<style type="text/css">
    .productImage img {
        height: 250px;
    }

    .form-validate-error {
        border: 1px solid red;
    }
</style>