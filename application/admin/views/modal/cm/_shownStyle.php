<?php
$CI = &get_instance ();
?>
<div class="span6 modal-shown-style" id="shownContainer">
	<div class="control-group">
		<label class="control-label">展示风格</label>
		<div class="controls">
			<label class="radio">
				<div class="radio">
					<span><input type="radio" name="shownType" value="html"
						data-bind="checked:showType"></span>
				</div> HTML
			</label> <label class="radio">
				<div class="radio">
					<span class="checked"><input type="radio" name="shownType"
						value="image" data-bind="checked:showType"></span>
				</div> 图片
			</label> <label class="radio">
				<div class="radio">
					<span class="checked"><input type="radio" name="shownType"
						value="vedio" data-bind="checked:showType"></span>
				</div> 视频
			</label>
		</div>
	</div>
	<div class="control-group" data-bind="visible:(showType()=='html')">
		<div class="controls span12" style="margin-left: 80px;">
            <div class="content-editor">
                <?php echo $shownDescription;?>
            </div>
		</div>
	</div>
	<div class="control-group" data-bind="visible:(showType()=='image')">
		<div class="controls span12" style="margin-left: 80px;">		
		  <?php echo $CI->load->view("modal/_showImages",array(),true);?>
		</div>
	</div>
	<div class="control-group" data-bind="visible:(showType()=='vedio')">
		<div class="controls span12" style="margin-left: 80px;">		
		  <?php echo $CI->load->view("modal/_showVedios",array("fieldName"=>"shownDescription","content"=>$shownDescription),true);?>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	var modalShownItemImageViewModal = function(d,i,ti,si){
		var self = this;
		self.id = ko.observable(d);
		self.image = ko.observable(i);
		self.thumbImage = ko.observable(ti);
		self.smallImage = ko.observable(si);
		self.selected = ko.observable(false);
	}
	var modalShownStyleViewModel = function(){
		var self = this;
		var imageOriginalData=<?php echo json_encode($shownImages); ?>;
		var exchangedImages=[];
		for(var i=0;i<imageOriginalData.length;i++)
		{
			var itImage=imageOriginalData[i];
			exchangedImages.push(new modalShownItemImageViewModal(itImage.id,itImage.path,itImage.relativePath2,itImage.relativePath3));
		}
		self.showType = ko.observable("<?php echo $shownType;?>");
		self.images = ko.observableArray(exchangedImages);
		self.currentImage = new modalShownItemImageViewModal();
		self.selectedUploadFile = ko.observable();
		self.selectedUploadVedio = ko.observable();
		self.uploadedVedio = ko.observable();
		self.addedUploadVedio = ko.observable("<?php echo $shownVedio;?>");
		
		self.events={
			imageAdd:function(){
				if(self.currentImage.image())
				{
					var imageData = self.images();
					imageData.push(new modalShownItemImageViewModal("",self.currentImage.image(),self.currentImage.thumbImage(),self.currentImage.smallImage()));
					self.images(imageData);

					self.currentImage.image("");
					self.currentImage.thumbImage("");
					self.currentImage.smallImage("");
					self.selectedUploadFile("");
				}
			},
			imageRemoved:function(item){
				self.images.remove(item);
			},
			vedioAdd:function(){
				if(self.uploadedVedio())
				{
					self.addedUploadVedio(self.uploadedVedio());
					self.selectedUploadVedio("");
					self.uploadedVedio("");
				}
			}
        }
	}

	window.shownVm = new modalShownStyleViewModel();
	ko.applyBindings(window.shownVm,$("#shownContainer")[0]);
});
</script>