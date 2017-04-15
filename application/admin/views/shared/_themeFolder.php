<?php ?>
<div id="themeFolders">
<div class="clearfix">
  <div class="btn-group">
	<button id="sample_editable_1_new" class="btn green" data-bind="click:events.create">Add New <i class="icon-plus"></i></button>
  </div>
</div>
<div class="dataTables_wrapper form-inline" style="margin-top: 10px;">
<table class="table table-striped table-bordered table-advance table-hover">
<thead>
  <tr>
      <th width="50%">主题</th>
      <th width="30%">描述</th>
      <th>数量</th>
      <th width="100px"></th>
      <th width="100px"></th>
   </tr>
</thead>
<tbody data-bind="foreach:datas">
<tr>
      <td>
        <input placeholder="主题" class="m-wrap" type="text" data-bind="value:name,visible:isEditModel,css:validations.name()?'':'input-validation-error'" style="width:92%">
        <a data-bind="visible:!isEditModel(),html:name,attr:{href:'theme.php?folder_id='+id()}" href="#"></a>
      </td>
      <td>
        <input placeholder="描述" class="m-wrap" type="text" data-bind="value:description,visible:isEditModel,css:validations.description()?'':'input-validation-error'" style="width:92%">
        
        <span data-bind="visible:!isEditModel(),html:description"></span>
      </td>
      <td data-bind="html:amount"></td>
      <td>
        <a class="edit" href="#" data-bind="click:events.edit,visible:!isEditModel()">Edit</a>
        <a class="edit" href="#" data-bind="click:events.save,visible:isEditModel">Save</a>
        <a class="edit" href="#" data-bind="click:events.cancel,visible:(isEditModel())">Cancel</a>
      </td>
      <td>
        <a class="delete" href="#" data-bind="click:$parent.events.remove">Delete</a>
      </td>
</tr>
</tbody>
</table>
</div>
</div>


<script type="text/javascript">
$(function(){
	var themeItemViewModel = function(id,name,description){
       var self = this;

       self.id =ko.observable(id);
       self.name = ko.observable(name);
       self.description = ko.observable(description);
       self.amount = 0;
       
       self.isEditModel = ko.observable(false);

       self.toValidate = ko.observable(false);
	   self.validations = {
		 name:function(){
			 if(!self.toValidate()){
				 return true;
		     }

			 if(!self.name()){
			     return false;
			 }

			 return true;
	     },
	     description:function(){
			 if(!self.toValidate()){
				 return true;
		     }

		     if(!self.description()){
			     return false;
			 }

			 return true;
		 }
       }

       self.validate = function(){
	       return self.validations.name() && self.validations.description();
	   }
	   
       self.events = {
    	  edit:function(){
			self.isEditModel(true);
          },
          save:function(){
              self.toValidate(true);
              if(!self.validate()){
                  return;
              }

              var data = {
                 id:self.id(),
                 name:self.name(),
                 description:self.description()
              }
              $.ajax({
                  url: "modules/themefolder.php",
                  type: "POST",
                  data: data,
                  dataType: "json",
                  beforeSend: function () {
                     
                  }
              }).done(function (rs) {
                  if (rs.Success) {
                	  self.isEditModel(false);
                	  loadThemeFolders();
                  } else {
                  	 alert("失败!");
                  }
              }).fail(function () {
      			alert("error");
              });        	  
          },
          cancel:function(){
        	  self.isEditModel(false);
          }
       }
    };
    
	var themeViewModel = function(){
		var self = this;

		self.events={
		   create:function(){
			   var item = new themeItemViewModel();
			   item.isEditModel(true);
			   item.toValidate(true);
			   self.datas.splice(0,0,item);
		   },
		   remove:function(data){
	              $.ajax({
	                  url: "modules/themefolder.php",
	                  type: "POST",
	                  data: { deletedId:data.id},
	                  dataType: "json",
	                  beforeSend: function () {
	                     
	                  }
	              }).done(function (rs) {
	                  if (rs.Success) {
	                	  loadThemeFolders();
	                  } else {
	                  	 alert("失败!");
	                  }
	              }).fail(function () {
	      			alert("error");
	              });
		   }
        };

		self.datas = ko.observableArray([]);
		
	}

	var vm = new themeViewModel();
	ko.applyBindings(vm,$("#themeFolders")[0]);
	loadThemeFolders();
	
	function loadThemeFolders(){
		$.ajax({
            url: "modules/themefolder.php",
            type: "GET",
            data: {},
            dataType: "json",
            beforeSend: function () {
               
            }
        }).done(function (rs) {
            if (rs.Success) {
              var ds =[];
              if(rs.Model)
              {
            	for(var index=0;index<rs.Model.length;index++){
            		ds.push(new themeItemViewModel(rs.Model[index].Id,rs.Model[index].Name,rs.Model[index].Description));  
                }    
              }
              
          	   vm.datas(ds);
            } else {
            	 alert("失败!");
            }
        }).fail(function () {
			alert("error");
        });        	  
    }
});
</script>