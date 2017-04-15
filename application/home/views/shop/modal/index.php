<section class="mainContent clearfix productsContent modalsContent">
    <div class="container">
        <div class="row">
            <?php foreach ($datas as $item): ?>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="productBox">

                    <div class="productImage clearfix">
                        <img src="<?=$item->thumbImage;?>" alt="<?=$item->name;?>">
                        <div class="productMasking">
                            <ul class="list-inline btn-group" role="group">
                                <?php if(MyAuth::isLogin()):?>
                                    <li><a data-toggle="modal" href="#" onclick="window.modalUtil.addAddWishList('<?=$item->id?>');" class="btn btn-default"><i class="fa fa-heart"></i></a></li>
                                <?php if(!empty($item->meterial_Id)):?>
                                     <li><a href="#" onclick="window.modalUtil.addShoppingCart('<?=$item->id?>','<?=$item->meterial_Id?>',1);" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php endif;?>
                                <?php endif;?>
                                <?php if(!empty($item->attachment) && $item->isDownloadable==1):?>
                                <li><a class="btn btn-default" data-toggle="modal" href="<?=$item->attachment?>" target="_blank" ><i class="fa fa-download"></i></a></li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                    <div class="productCaption clearfix">
                        <a href="<?php echo site_url("shop/modal/detail/".$item->id);?>">
                            <h5><?=$item->name;?></h5>
                        </a>
                        <h3><?php echo $item->introducation;?></h3>
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
                array("url" => "shop/modal/index?".$queryString,
                      "pageIndex" => $pageIndex, "pageSize" => $pageSize,
                      "totalCount" => $totalCount), true); ?>
        </div>
    </div>
</section>
