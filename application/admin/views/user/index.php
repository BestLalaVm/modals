<?php
$index = 0;
?>
<?php echo form_open(site_url("user/index"),array("method"=>"get","id"=>"frmSearch"))?>
<div class="row-fluid filter-block">
    <div class="span3">
        <div class="control-group">
            <label class="control-label span4" for="firstName">关键字</label>
            <div class="controls span8">
                <input type="text" id="keyword" name="keyword" class="m-wrap span12" placeholder="关键字"
                       value="<?php echo $filterKeyword; ?>">
            </div>
        </div>
    </div>
    <div class="span7">
    </div>
    <div class="span2 block-right">
        <button type="submit" class="btn blue">搜索</button>
        <button type="button" class="btn btn-primary btn-reset">重置</button>
    </div>
</div>

<?php echo form_close();?>
<div class="portlet-body">
    <table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1"
           aria-describedby="sample_editable_1_info">
        <thead>
        <tr role="row">
            <th style="width: 120px;">编号</th>
            <th style="width: 300px;">Email</th>
            <th style="width: 100px;">积分</th>
            <th style="width: 240px;">头像</th>
            <th style="width: 180px;">电话</th>
            <th style="width: 180px;">姓名</th>
            <th style="width: 420px;">收货地址</th>
            <th style="width: 380px;">描述</th>
            <th style="width: 260px;">创建时间</th>
        </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php foreach ($datas as $item): ?>
            <tr class="<?= ($index % 2 == 0) ? "even" : "odd" ?>">
                <td class=" sorting_1"><?= $item->id; ?></td>
                <td class=" "><?= $item->email; ?></td>
                <td class=" "><?= $item->points; ?></td>
                <td class=" " style="padding: 0px;">
                    <?php if(!empty($item->image)):?>
                        <img src="<?=$item->image?>" style="max-width: 70px;max-height: 60px;">
                    <?php endif;?>
                </td>
                <td class=" "><?= $item->telephone; ?></td>
                <td class=" "><?= $item->shippingName; ?></td>
                <td class=" "><?= $item->shippingAddress; ?></td>
                <td class=" "><?= $item->note; ?></td>
                <td class="center "><?= $item->createdTime; ?></td>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->load->view("shared/_pagination", array("pageIndex" => $pageIndex, "pageSize" => $pageSize, "totalCount" => $totalCount), TRUE); ?>
</div>