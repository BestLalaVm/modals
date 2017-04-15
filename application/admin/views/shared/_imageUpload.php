<?php
   $uploadImageContainerId = uniqid("Upload");
   $url = site_url("ajax/uploadImage");
?>
<div id="<?=$uploadImageContainerId ?>">
	<div class="thumbnail" style="width: 291px; height: 170px;">
		<img alt="" style="max-width: 291px; max-height:170px;">
	</div>
	<div class="space10"></div>
	<div class="fileupload fileupload-new" data-provides="fileupload">
		<input type="hidden">
		<div class="input-append">
			<div class="uneditable-input">
				<i class="icon-file fileupload-exists"></i> 
				<span class="fileupload-preview"></span>
			</div>
			<span class="btn btn-file"><span class="fileupload-new">选择图片</span>
				<span class="fileupload-exists">更改</span> 
				<input type="file" class="default fileupload-input" name="imageFile">
			</span> 
			<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">删除</a>
		</div>
	</div>
	<script type="text/javascript">
	$(function () {
		var $uploadImageContainer = $("#<?=$uploadImageContainerId; ?>");
		var $fileuploadpreview = $uploadImageContainer.find(".fileupload-preview");
		var $imageElement = $("<?=$imageElement ?>");
		var $thumbimageElement = $("<?=$thumbImageElement ?>");
		var $smallimageElement = $("<?=$smallImageElement ?>");
		var currentImage ="<?=$currentImage ?>";
		$uploadImageContainer.find("img").attr("src",currentImage);
		if(!currentImage)
		{
			$uploadImageContainer.find("img").hide();
		}
		$uploadImageContainer.find('.fileupload').fileupload({
	        dataType: 'json',
	        method:"Post",
	        param:"file",
	        url: "<?=$url; ?>",
	        add: function (e, data) {
	        	$fileuploadpreview.html(data.fileInput.val());
	            data.submit();
	        },
	        done: function (e, data) {
		        if(data.result.success)
		        {
		        	$uploadImageContainer.find("img").attr("src",data.result.imageUrl);
		        	$imageElement.val(data.result.imageUrl);
		        	$thumbimageElement.val(data.result.thumbImageUrl);
		        	$smallimageElement.val(data.result.smallImageUrl);
		        	$uploadImageContainer.find("img").show();
			    }
	        }
	    });
	});
	</script>
</div>