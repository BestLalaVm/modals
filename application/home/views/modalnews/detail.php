<div class="container content-body">
    <div class="row">
        <div class="section-box">
            <div class="section-nav">
                <a href="<?=site_url("home/index");?>">首页</a>
                &gt; <a href="<?=site_url("modalnews/index")?>">模型新闻</a> &gt;
                <a href="#"><?php echo "新闻详细";?></a></div>

            <div class="section-title">
                <h1 class="content_c_title text-center"><?php echo $data->name; ?></h1>
            </div>

            <div class="section-info">
                <p>
                </p>
                <div class="grey14">

                    <span class="glyphicon glyphicon-calendar"></span><?php echo (new DateTime($data->createdTime))->format("Y年m月d日");?>
                </div>
                <p></p>
            </div>
            <div class="section-body justify">
               <?php echo $data->content;?>
            </div>
        </div>
    </div>
</div>