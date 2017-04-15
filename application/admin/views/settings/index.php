<?php echo form_open(site_url("settings/index"), array("method" => "POST")); ?>
<div class="detail">
    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <label><input type="checkbox" name="clearFrontCache" value="1">清空前台缓存</label>
        </div>
    </div>
    <div class="form-actions">
        <?= form_submit("", "保存", array("class" => "btn green")) ?>
    </div>
</div>
<?php echo form_close(); ?>
