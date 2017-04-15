<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/23/2017
 * Time: 9:31 PM
 */

$homeitems= $this->config->item("home","3dmodal-site");
$topbanners = $homeitems["topbanner"];

?>
<div class="header">
    <div id="ppt" class="fcnt">
        <div id="mpc" class="mimg">
            <?php foreach ($topbanners as $item):?>
            <div style="display: block;"><a href="<?php echo $item["url"];?>"><img alt="" src="<?php echo site_url($item["image"]);?>"></a></div>
            <?php endforeach;?>
        </div>
        <div id="tri" style="top: 0px;"></div>
        <ul id="mpc_child">
            <?php foreach ($topbanners as $item):?>
                <li class="cur"><img alt="" src="<?php echo site_url($item["image"]);?>"></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
