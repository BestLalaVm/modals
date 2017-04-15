<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/23/2017
 * Time: 9:05 PM
 */
if(empty($siteName))
{
    $siteName="3dmodal-site";
}
?>
<div class="jbr_footer">
    <div class="w1202 jbr_footerw">

        <div class="jbr_FooterLeftBt">
            <?php echo $this->config->item("footer",$siteName)?>
        </div>
    </div>
</div>
