<?php
$url = site_url ( "ajax/uploadVedio" );
?>
<div id="shown-vedio-container">
	<div class="control-group">
		<div class="controls" style="margin-left: 0px;">
			<div class="fileupload fileupload-new" data-provides="fileupload">
				<input type="hidden">
                <div class="input-append" style="display: inline-block;">
                    <div class="uneditable-input">
                        <i class="icon-file fileupload-exists"></i><span
                                class="fileupload-preview" data-bind="html:selectedUploadVedio"></span>
                    </div>
                    <span class="btn btn-default" id="btnShownSelect"> <span class="fileupload-new">选择文件</span>
                        <input type="file" name="vedioFile"  class="default" style="width: 20px;opacity: 0;margin-top: -26px;height: 38px;">
					</span>
                </div>
                <a href="#" class="btn btn-info" data-bind="click:events.vedioAdd" style="margin-top: -30px;height: 34px;width: 80px;line-height: 8px;"><i
                            class="icon-plus"></i>添加</a>
                <span>支持的视频格式: wmv,3gp,mp4,rm,rmvb</span>
			</div>
		</div>
	</div>
	<div class="control-group" data-bind="visible:addedUploadVedio" style="margin-top: 20px;">
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
				    alert(data.result.error);
				 }
	        }
	    });
	});
	</script>