<section class="mainContent clearfix productsContent modalsContent">
    <div class="container">
        <div class="row">
            <?php foreach ($datas as $item): ?>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="productBox">

                    <div class="productImage clearfix">
                        <img src="<?=$item["thumbImage"];?>" alt="<?=$item["name"];?>">
                        <div class="productMasking">
                            <ul class="list-inline btn-group" role="group">
                                <li><a data-toggle="modal" href="#" onclick="window.modalUtil.addAddWishList('<?=$item["id"]?>');" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#" onclick="window.modalUtil.addShoppingCart('<?=$item["id"]?>',1);" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <li><a class="btn btn-default" href="<?=($item["isDownloadable"]==1?$item["attachment"]:"#")?>"  target="_blank"><i class="fa fa-download"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="productCaption clearfix">
                        <a href="<?php echo site_url("shop/modal/detail?id=".$item["id"]);?>">
                            <h5><?=$item["name"];?></h5>
                        </a>
                        <h3><?php echo $item["introducation"];?></h3>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php if(count($datas)==0):?>
               <h3>找不到任何模型数据!</h3>
            <?php endif;?>
        </div>
        <div class="row">
            <?php echo $this->load->view("shared/_pagination",
                array("url" => "shop/modal/cmindex?".$queryString,
                      "pageIndex" => $pageIndex, "pageSize" => $pageSize,
                      "totalCount" => $totalCount), true); ?>
        </div>
    </div>
</section>
