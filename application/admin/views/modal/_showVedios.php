<?php
$url = site_url ( "ajax/uploadVedio" );
?>
<div id="shown-vedio-container">
	<div class="control-group">
		<div class="controls" style="margin-left: 0px;">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<input type="hidden">
				<div class="input-append">
					<div class="uneditable-input">
						<i class="icon-file fileupload-exists"></i><span
							class="fileupload-preview" data-bind="html:selectedUploadVedio"></span>
					</div>
					<span class="btn btn-file"> <span class="fileupload-new">选择文件</span>
						<span class="fileupload-exists">Change</span> <input type="file"
						name="vedioFile" class="default">
					</span> <a href="#" class="btn fileupload-exists"
						data-dismiss="fileupload">Remove</a>
				</div>
				<a href="#" class="btn blue" data-bind="click:events.vedioAdd"><i
					class="icon-plus"></i>添加</a>
                <span>支持的视频格式: wmv,3gp,mp4,rm,rmvb</span>
			</div>
		</div>
	</div>
	<div class="control-group" data-bind="visible:addedUploadVedio">
	<video src="#" controls="controls" data-bind="visible:addedUploadVedio,attr:{src:addedUploadVedio}"></video>
    <a data-bind="attr:{href:addedUploadVedio}">视频文件下载</a>
	</div>
	<input type="hidden" name="shownVedio" data-bind="value:addedUploadVedio">
	<div>

	</div>
</div>

<script type="text/javascript">
	$(function () {
		var $uploadVedioContainer = $("#shown-vedio-container");
		$uploadVedioContainer.find('.fileupload').fileupload({
	        dataType: 'json',
	        method:"Post",
	        param:"file",
	        url: "<?=$url; ?>",
	        add: function (e, data) {
	        	window.shownVm.selectedUploadVedio(data.fileInput.val());
	            data.submit();
	        },
	        done: function (e, data) {
		        if(data.result.success)
		        {
		        	window.shownVm.uploadedVedio(data.result.vedioUrl);
			    }else
			    {
			    	window.shownVm.selectedUploadVedio("");
				    //alert("您所提供的视频文件无效!(有效格式为: wmv|asf|asx|rm|rmvb|mpg|mpeg|mpe|3gp|mov|mp4|m4v|avi|dat|mkv|flv|vob|qsv|flv)!");
                    alert(data.result.error);
				    //console.log();
				 }
	        }
	    });
	});
	</script>