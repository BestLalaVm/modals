<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/3/2017
 * Time: 10:40 PM
 */
?>
<div class="row featuredProducts margin-bottom" id="dvmodalBlock">
    <div class="col-xs-12">
        <div class="page-header">
            <h4>最新模型库</h4>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="owl-carousel featuredProductsSlider">
            <?php foreach ($data["modals"] as $item): ?>
                <div class="slide">
                    <div class="productImage">
                        <img src="<?php echo $item["thumbImage"] ?>"
                             alt="featured-product-img">
                        <div class="productMasking">
                            <ul class="list-inline btn-group" role="group">
                                <?php if (MyAuth::isLogin()): ?>
                                    <li><a data-toggle="modal" href="#"
                                           onclick="window.modalUtil.addAddWishList('<?= $item["id"] ?>');"
                                           class="btn btn-default"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <?php if (!empty($item["meterial_Id"])): ?>
                                        <li><a href="#"
                                               onclick="window.modalUtil.addShoppingCart('<?= $item["id"] ?>','<?=$item["meterial_Id"]?>',1);"
                                               class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <li><a data-toggle="modal"
                                       href="<?php echo site_url("shop/modal/detail/" . $item['id']) ?>"
                                       class="btn btn-default"><i class="fa fa-eye"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="productCaption">
                        <a href="<?php echo site_url("shop/modal/detail?id=" . $item['id']) ?>">
                            <h5><?php echo $item["name"]; ?></h5>
                        </a>
                        <h3>
                            <?php echo $item["introducation"]; ?>
                        </h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
