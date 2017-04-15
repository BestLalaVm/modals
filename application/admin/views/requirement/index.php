<?php
$index = 0;
?>
<?php echo form_open(site_url("requirement/index"),array("method"=>"get","id"=>"frmSearch"))?>
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
            <th style="width: 50px;">编号</th>
            <th style="width: 150px;">Email</th>
            <th style="width: 500px;">需求描述</th>
            <th style="width: 280px;">推荐模型</th>
            <th style="width: 150px;">创建时间</th>
            <th style="width: 80px;"></th>
        </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php foreach ($datas as $item): ?>
            <tr class="<?= ($index % 2 == 0) ? "even" : "odd" ?>">
                <td class=" sorting_1"><?= $item->id; ?></td>
                <td class=" "><?= $item->email; ?></td>
                <td class=" "><?= $item->description; ?></td>
                <td class=" "><?= $item->modalName; ?></td>
                <td class="center "><?= $item->createdTime; ?></td>
                <td class=" "><a class="edit" href="<?= site_url("requirement/detail/") . $item->id ?>">编辑</a></td>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->load->view("shared/_pagination", array("pageIndex" => $pageIndex, "pageSize" => $pageSize, "totalCount" => $totalCount), TRUE); ?>
</div>