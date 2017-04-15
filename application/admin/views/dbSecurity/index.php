<button type="button" class="btn blue" id="btnBackUp">马上备份</button>
<div style="<?php echo($isbackupExists ? "" : "display:none"); ?>" class="backup-container ">
    <div class="panel-heading">
        <h3>备份文件信息</h3>
    </div>
    <div class="panel-body">
        <div class="control-group">
            <label class="control-label">备份文件:</label>
            <div class="controls">
                <span class="backup-name"><?php echo $backupFileName; ?></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">备份时间:</label>
            <div class="controls">
                <span class="backup-time"><?php echo $backupTime; ?></span>
            </div>
        </div>
        <div class="control-group">
            <a href="<?php echo $backupLink; ?>" class="backup">下载备份文件</a>
        </div>
        <div class="control-group">
           <button type="button" class="btn danger" id="btnstore">马上还原</button>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(function () {
        var $btnBackUp = $("#btnBackUp");
        var $btnstore=$("#btnstore");
        var normalBtnBackUpLabel = $btnBackUp.html();
        var normalBtnStoreLabel = $btnstore.html();
        var lastbackupTime ="<?php echo $backupTime;?>";
        $btnBackUp.click(function () {
            $btnBackUp.html("正在执行备份,请稍等...");
            $btnstore.attr("disabled","disabled");
            $.post("<?php echo site_url("dbSecurity/backup")?>", {}, function (data) {
                if (data.success) {
                    $(".backup-container").show();
                    $(".backup").attr("href", data.link);
                    $(".backup-time").html(data.createdTime);
                    lastbackupTime=data.createdTime;
                } else {
                    alert(data.message);
                }
            }, "json").always(function () {
                $btnBackUp.html(normalBtnBackUpLabel);
                $btnstore.attr("disabled",false);
            });
        });

        $btnstore.click(function () {
            var message="";
            $btnstore.html("正在将数据库还原至:"+lastbackupTime+"版本, 请耐心等待并且停止一些动作...");
            $btnBackUp.attr("disabled","disabled");
            $.post("<?php echo site_url("dbSecurity/restore")?>", {}, function (data) {
                if (data.success) {
                    alert("数据库已经成功被还原至:"+lastbackupTime+"!");
                } else {
                    alert(data.message);
                }
            }, "json").always(function () {
                $btnstore.html(normalBtnStoreLabel);
                $btnBackUp.attr("disabled",false);
            });
        });
    })
</script>