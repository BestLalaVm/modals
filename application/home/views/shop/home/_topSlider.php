<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/3/2017
 * Time: 10:27 PM
 */
$topSliderConfig = $this->config->item("home", "3dmodal-shop")["topslider"];
?>
<!-- BANNER -->
<!--
<div class="bannercontainer bannerV1">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
            <ul>
                <?php for ($index = 0; $index < count($topSliderConfig); $index++): ?>
                <?php $item = $topSliderConfig[$index]; ?>
                <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700" data-title="Slide <?php echo($index + 1); ?>">
                    <img src="http://localhost/3dmodal/assets/front/shop/img/home/banner-slider/slider-bg.jpg"
                         alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                    <div class="slider-caption slider-captionV1 container">
                        <div class="tp-caption rs-caption-1 sft start"
                             data-hoffset="0"
                             data-x="370"
                             data-y="54"
                             data-speed="800"
                             data-start="1500"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            <img src="<?php echo site_url($item["image"]); ?>"
                                 alt="slider-image" style="width: 781px; height: 416px;">
                        </div>

                        <div class="tp-caption rs-caption-2 sft"
                             data-hoffset="0"
                             data-y="119"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Back.easeInOut"
                             data-endspeed="300">
                            <?php echo $item["title"]; ?>
                        </div>

                        <div class="tp-caption rs-caption-3 sft"
                             data-hoffset="0"
                             data-y="185"
                             data-speed="1000"
                             data-start="3000"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off">
                            <?php echo $item["title"]; ?>
                        </div>
                        <div class="tp-caption rs-caption-4 sft"
                             data-hoffset="0"
                             data-y="320"
                             data-speed="800"
                             data-start="3500"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="off">
                            <span class="page-scroll">
                                <a target="_blank" href="<?php echo $item["url"]; ?>"
                                                         class="btn primary-btn">Buy Now<i
                                            class="glyphicon glyphicon-chevron-right"></i></a></span>
                        </div>
                    </div>
                </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>
-->
<div class="bannercontainer">
    <div class="owl-carousel bannerV3">
        <?php for ($index = 0; $index < count($topSliderConfig); $index++): ?>
        <?php $item = $topSliderConfig[$index]; ?>
        <div class="slide">
            <div class="slider-title">
                <h3><?=$item["title"];?></h3>
            </div>
            <div class="slide-info">
                <div class="productImage">
                    <img src="<?php echo site_url($item["image"]); ?>" alt="Product Image">
                </div>
                <div class="productCaption">
                    <div class="banner-count clearfix">

                    </div>
                    <div>
                        <?=$item["description"];?>
                    </div>
                    <?php if(!empty($item["url"])):?>
                     <a target="_blank" href="<?php echo $item["url"]; ?>" class="btn primary-btn">点击详情<i class="glyphicon glyphicon-chevron-right"></i></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>
