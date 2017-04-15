<?php
$index = 0;
$CI =& get_instance();
$filterName = "";
$filterKeyword = "";
$filterStartDate = "";
$filterEndDate = "";
if (isset($_REQUEST["name"])) {
    $filterName = $_REQUEST["name"];
}
if (isset($_REQUEST["keyword"])) {
    $filterKeyword = $_REQUEST["keyword"];
}
if (isset($_REQUEST["startDate"])) {
    $filterStartDate = $_REQUEST["startDate"];
}
if (isset($_REQUEST["endDate"])) {
    $filterEndDate = $_REQUEST["endDate"];
}
?>
<?php echo form_open(site_url("modalNew/index"),array("method"=>"get","id"=>"frmSearch"))?>
<div class="row-fluid filter-block">
    <div class="span3">
        <div class="control-group">
            <label class="control-label span4" for="firstName">标题</label>
            <div class="controls span8">
                <input type="text" id="name" name="name" class="m-wrap span12" placeholder="标题"
                       value="<?php echo $filterName; ?>">
            </div>
        </div>
    </div>
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
            <label class="control-label span2" for="firstName">发布时间从</label>
            <div class="controls span4">
                <?php echo $CI->load->view("shared/_datepicker", array("fieldName" => "startDate", "value" => $filterStartDate), true) ?>
            </div>
            <label class="control-label span1" for="firstName">到</label>
            <div class="controls span4">
                <?php echo $CI->load->view("shared/_datepicker", array("fieldName" => "endDate", "value" => $filterEndDate), true) ?>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span1">
        <a class="btn blue" href="<?= site_url("modalnew/create") ?>">新增</a>
    </div>
    <div class="span9"></div>
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
            <th style="width: 407px;">标题</th>
            <th style="width: 200px;">关键字</th>
            <th style="width: 80px;">是否发布</th>
            <th style="width: 150px;">开始发布时间</th>
            <th style="width: 150px;">结束发布时间</th>
            <th style="width: 160px;">采编人</th>
            <th style="width: 160px;">创建时间</th>
            <th style="width: 80px;"></th>
            <th style="width: 80px;"></th>
        </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php foreach ($datas as $item): ?>
            <tr class="<?= ($index % 2 == 0) ? "even" : "odd" ?>">
                <td class=" sorting_1"><?= $item->id; ?></td>
                <td class=" "><?= $item->name; ?></td>
                <td class=" "><?= $item->keyword; ?></td>
                <td class=" "><?php echo form_checkbox("", 1, $item->isPublished, array("disabled" => "disabled")) ?></td>
                <td class="center "><?= (is_null($item->publishedDateFrom)?"":(new DateTime($item->publishedDateFrom))->format("Y-m-d")); ?></td>
                <td class="center "><?= (is_null($item->publishedDateTo)?"":(new DateTime($item->publishedDateTo))->format("Y-m-d")); ?></td>
                <td class=" "><?= $item->author; ?></td>
                <td class="center "><?= $item->lastUpdatedTime; ?></td>
                <td class=" "><a class="edit" href="<?= site_url("modalnew/edit/") . $item->id ?>">编辑</a></td>
                <td class=" "><a class="delete" href="#" data-url="<?= site_url("modalnew/delete/") . $item->id ?>">删除</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $CI->load->view("shared/_pagination", array("pageIndex" => $pageIndex, "pageSize" => $pageSize, "totalCount" => $totalCount), TRUE); ?>
</div>