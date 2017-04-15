<?php
$index = 0;
?>
<?php echo form_open(site_url("order/index"),array("method"=>"get","id"=>"frmSearch"))?>
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
    <div class="span6">
        <div class="control-group">
            <label class="control-label span2" for="startDate">时间从</label>
            <div class="controls span4">
                <?php echo $this->load->view("shared/_datepicker",array("fieldName"=>"startDate","value"=>$filterStartDate),true) ?>
            </div>
            <label class="control-label span1" for="endDate">到</label>
            <div class="controls span4">
                <?php echo $this->load->view("shared/_datepicker",array("fieldName"=>"endDate","value"=>$filterEndDate),true) ?>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">

    <div class="span10"></div>
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
            <th style="width: 140px;">订单号</th>
            <th style="width: 180px;">状态</th>
            <th style="width: 200px;">收货人</th>
            <th style="width: 300px;">电话</th>
            <th style="width: 700px;">收货地址</th>
            <th style="width: 150px;">总额</th>
            <th style="width: 250px;">创建时间</th>
            <th style="width: 80px;"></th>
        </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php foreach ($datas as $item): ?>
            <tr class="<?= ($index % 2 == 0) ? "even" : "odd" ?>">
                <td class=" sorting_1"><?= $item->number; ?></td>
                <td class=" "><?= $item->status; ?></td>
                <td class=" "><?= $item->shippingName; ?></td>
                <td class=" "><?= $item->shippingTelephone; ?></td>
                <td class=" "><?= $item->shippingAddress; ?></td>
                <td class="center "><?= $item->totalPrice; ?></td>
                <td class="center "><?= $item->createdTime; ?></td>
                <td class=" "><a class="edit" href="<?= site_url("order/detail/") . $item->id ?>">查看</a></td>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->load->view("shared/_pagination", array("pageIndex" => $pageIndex, "pageSize" => $pageSize, "totalCount" => $totalCount), TRUE); ?>
</div>