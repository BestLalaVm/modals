<?php
$uploadImageContainerId = uniqid("Upload");
$url = site_url("ajax/uploadImage");
?>
<div id="<?= $uploadImageContainerId ?>">
    <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="width: 300px;height: 240px; ;padding: 0px;float: none;">
        <div class="thumbnail" href="#" style="margin-bottom: 0px;width: 291px; height: 170px;">
            <img class="img-responsive" src="<?=site_url("../assets/uploads/images/cailiao4.jpg")?>" alt="" style="width: 291px;height: 168px;">
        </div>
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <input type="hidden">
            <div class="input-append">
                <div class="uneditable-input">
                    <i class="icon-file fileupload-exists"></i>
                    <span class="fileupload-preview"></span>
                </div>
                <span class="btn btn-primary" id="btnSelect" style="">选择图片</span>
                <!-- <button type="button" class="btn btn-primary">选择图片</button>-->
				<input type="file" class="default fileupload-input" name="imageFile">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var $uploadImageContainer = $("#<?=$uploadImageContainerId; ?>");
        var $fileuploadpreview = $uploadImageContainer.find(".fileupload-preview");
        var $imageElement = $("<?=$imageElement ?>");
        var $thumbimageElement = $("<?=$thumbImageElement ?>");
        var $smallimageElement = $("<?=$smallImageElement ?>");
        var currentImage = "<?=$currentImage ?>";
        $uploadImageContainer.find("img").attr("src",currentImage);
        if (!currentImage) {
              $uploadImageContainer.find("img").hide();
        }
        $uploadImageContainer.find('.fileupload').fileupload({
            dataType: 'json',
            method: "Post",
            param: "file",
            url: "<?=$url; ?>",
            add: function (e, data) {
                $fileuploadpreview.html(data.fileInput.val());
                data.submit();
            },
            done: function (e, data) {
                if (data.result.success) {
                    $uploadImageContainer.find("img").attr("src", data.result.imageUrl);
                    $imageElement.val(data.result.imageUrl);
                    $thumbimageElement.val(data.result.thumbImageUrl);
                    $smallimageElement.val(data.result.smallImageUrl);
                    $uploadImageContainer.find("img").show();
                    //$uploadImageContainer.find("#btnSelect").css("margin-top","-5px");
                }
            }
        });
    });
</script>


<style type="text/css">
    #<?= $uploadImageContainerId;?> .thumbnail {
        border: 1px solid #ddd;
    }
    .input-append
    {
        margin-top: 10px;
        height: 40px;
    }
    .input-append .uneditable-input
    {
        height: 36px;
        width: 200px;
        border: 1px solid #ddd;
        display: inline-block;
        line-height: 36px;
        padding-left: 5px;
    }
    .input-append .btn
    {
        display:inline-block !important;
        vertical-align: middle !important;
        height: 36px !important;
        margin-top: -30px ;
        width: 86px !important;
        text-align: center !important;
        cursor: pointer !important;
        line-height: 12px !important;
    }
    .input-append .fileupload-input
    {
        opacity: 0;
        position: relative;
        top: -52px;
        width: 300px;
        height: 40px;
    }
    #<?= $uploadImageContainerId;?>
    .thumbnail .image-file {
        position: relative;

        opacity: 0;
        width: 300px;
    }
</style>