<?php
$CI = &get_instance ();
?>

<?= form_open(site_url("requirement/detail/$id"),array("class"=>'form-horizontal')) ?>
<div class="detail">
    <div class="error">
        <?php if(isset($uniqueError))echo $uniqueError; ?>
    </div>
    <div class="control-group" data-bind="visible:!shownModal()">
        <label class="control-label">需求描述</label>
        <div class="controls">
            <?= form_textarea("description",$description,array("class"=>"span6","disabled"=>"disabled","style"=>"width:760px;height:260px"))?>
        </div>
    </div>
    <div class="control-group" data-bind="visible:!shownModal()">
        <label class="control-label">推荐模型<span class="required">*</span></label>
        <div class="controls">
            <?= form_input("modal_name",$name,array("class"=>"span6","disabled"=>"disabled","data-bind"=>"value:modalName"))?><a class="btn btn-default" data-bind="click:events.openModals">选择模型</a>
            <?= form_input("modal_id",$modal_id,array("class"=>"span6","data-bind"=>"value:modalId","style"=>"display:none;"))?>
            <div class="form-validation-error"><?php echo form_error("modal_id")?></div>
        </div>
    </div>
    <div class="control-group" data-bind="visible:shownModal">
        <div class="row" style="margin-left: 25px;">
            <h2>选择推荐的模型</h2>
        </div>
    </div>
    <div class="control-group" data-bind="visible:shownModal">
        <div class="row" style="margin-left: 25px;">
            <?=$this->load->view("requirement/_modalOptions",array(),true);?>
        </div>
    </div>
    <div class="form-actions">
        <?=form_submit("","保存",array("class"=>"btn green"))?>
        <a href="<?=site_url("requirement/index")?>" class="btn">取消</a>
    </div>
</div>
<?= form_close()?>
