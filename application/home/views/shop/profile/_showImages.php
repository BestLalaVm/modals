<?php
$url = site_url("ajax/uploadImage");
?>
<div id="shown-image-container">
    <div class="control-group">
        <div class="controls" style="margin-left: 0px;">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <input type="hidden">
                <div class="input-append" style="display: inline-block;">
                    <div class="uneditable-input">
                        <i class="icon-file fileupload-exists"></i><span
                                class="fileupload-preview" data-bind="html:selectedUploadFile"></span>
                    </div>
                    <div style="display: inline-block;" id="btnContainer">
                        <span class="btn btn-default" id="btnShownSelect"> <span class="fileupload-new">选择文件</span>
                        <input type="file" name="imageFile" class="default"
                               style="width: 20px;opacity: 0;margin-top: -26px;height: 38px;">
					    </span>
                        <a href="#" id="btnShownTypeAdd" class="btn btn-info" data-bind="click:events.imageAdd"><i
                                    class="icon-plus"></i>添加</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div>
        <table
                class="table table-striped table-hover table-bordered dataTable"
                id="sample_editable_1" aria-describedby="sample_editable_1_info">
            <thead>
            <tr role="row">
                <th role="columnheader" rowspan="1" colspan="1"
                    aria-label="Username">图像
                </th>
                <th class="sorting" role="columnheader" tabindex="0"
                    aria-controls="sample_editable_1" rowspan="1" colspan="1"
                    aria-label="Delete: activate to sort column ascending"
                    style="width: 150px;"></th>
            </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all"
                   data-bind="foreach:images">
            <tr class="odd">
                <td>
                    <input type="hidden" name="shownImages[]" data-bind="value:id">
                    <input type="hidden" name="shownImages[]" data-bind="value:image">
                    <input type="hidden" name="shownImages[]" data-bind="value:thumbImage">
                    <input type="hidden" name="shownImages[].relativePath3" data-bind="value:smallImage">
                    <img data-bind="attr:{src:smallImage}" style="max-height: 80px;"/>
                </td>
                <td class=" " style="text-align:center;">
                    <a class="delete" href="javascript:;" style="color: #000;font-size: 15px;"
                                                            data-bind="click:$parent.events.imageRemoved">删除</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var $uploadImageContainer = $("#shown-image-container");
        $uploadImageContainer.find('.fileupload').fileupload({
            dataType: 'json',
            method: "Post",
            param: "file",
            url: "<?=$url; ?>",
            add: function (e, data) {
                window.shownVm.selectedUploadFile(data.fileInput.val());
                $("#btnContainer").css("margin-top", "2px");
                data.submit();
            },
            done: function (e, data) {
                if (data.result.success) {
                    window.shownVm.currentImage.image(data.result.imageUrl);
                    window.shownVm.currentImage.thumbImage(data.result.thumbImageUrl);
                    window.shownVm.currentImage.smallImage(data.result.smallImageUrl);
                } else {
                    alert(data.result.error);
                }
            }
        });
    });
</script>