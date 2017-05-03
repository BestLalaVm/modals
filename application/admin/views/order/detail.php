<?php
$orderStatus = array(order_model::SUCCESS => "已付款", order_model::SHIPPINGTOCUSTOMER => "已发货", order_model::DONE => "用户已收货")
?>
<?= form_open(site_url("order/detail") . "/" . $data["detail"]["id"], array("class" => 'form-horizontal')) ?>
    <div class="detail">
        <div class="error">
            <?php if (isset($uniqueError)) echo $uniqueError; ?>
        </div>
        <div class="control-group">
            <label class="control-label">订单号</label>
            <div class="controls">
                <?= form_input("number", $data["detail"]["number"], array("class" => "span6", "disabled" => "disabled")) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">总金额</label>
            <div class="controls">
                <?= form_input("totalPrice", $data["detail"]["totalPrice"], array("class" => "span6", "disabled" => "disabled")) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">订单状态</label>
            <div class="controls">
                <?php if ($data["detail"]["status"] != order_model::FAILED): ?>
                    <?php echo form_dropdown("status", $orderStatus, $data["detail"]["status"], array("class" => "medium  m-wrap")) ?>
                <?php else: ?>
                    <?php echo order_model::getOrderStatus($data["detail"]["status"]); ?>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <div class="control-group">
                <label class="control-label">收货人</label>
                <div class="controls">
                    <?= form_input("shippingAddress.name", $data["shippingAddress"]["name"], array("class" => "span6", "disabled" => "disabled")) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">手机</label>
                <div class="controls">
                    <?= form_input("shippingAddress.telephone", $data["shippingAddress"]["telephone"], array("class" => "span6", "disabled" => "disabled")) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">收货地址</label>
                <div class="controls">
                    <?= form_input("shippingAddress.address", $data["shippingAddress"]["address"], array("class" => "span6", "disabled" => "disabled")) ?>
                </div>
            </div>
        </div>
        <div>
            <table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1"
                   aria-describedby="sample_editable_1_info">
                <thead>
                <tr role="row">
                    <th style="width: 380px;">模型名</th>
                    <th style="width: 140px;"></th>
                    <th style="width: 380px;">材料名</th>
                    <th style="width: 200px;">重量</th>
                    <th style="width: 200px;">尺寸</th>
                    <th style="width: 150px;">数量</th>
                    <th style="width: 150px;">单价</th>
                </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                <?php for ($index = 0; $index < count($data["items"]); $index++): ?>
                    <?php $item = $data["items"][$index]; ?>
                    <tr class="<?= ($index % 2 == 0) ? "even" : "odd" ?>">
                        <td class=" sorting_1"><a
                                    href="<?= site_url("modal/edit/{$item["modalId"]}") ?>"><?= $item["name"]; ?></a>
                        </td>
                        <td class=" "><img src="<?= $item["smallImage"] ?>" style="width: 80px;height: 60px;"/></td>
                        <td class=" "><?= $item["meterialName"]; ?></td>
                        <td class=" "><?= $item["weight"]; ?></td>
                        <td class=" "><?= $item["size"]; ?></td>
                        <td class="center "><?= $item["quantity"]; ?></td>
                        <td class="center "><?= $item["price"]; ?></td>
                        </td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
        <div class="form-actions">
            <?php if ($data["detail"]["status"] != order_model::FAILED): ?>
                <?= form_submit("", "保存", array("class" => "btn green")) ?>
            <?php endif; ?>
            <a href="<?= site_url("order/index") ?>" class="btn">返回</a>
        </div>
    </div>
<?= form_close() ?>