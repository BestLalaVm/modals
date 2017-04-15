<?php ?>
<div id="themeFolders">
<div class="clearfix">
  <div class="btn-group">
	<button id="sample_editable_1_new" class="btn green">新增<i class="icon-plus"></i></button>
  </div>
</div>
<div class="dataTables_wrapper form-inline" style="margin-top: 10px;">
<table class="table table-striped table-bordered table-advance table-hover">
<thead>
  <tr>
      <th width="70%">标题</th>
      <th width="100px"></th>
      <th width="100px"></th>
   </tr>
</thead>
<tbody data-bind="foreach:datas">
<tr>
      <td>
        <a data-bind="html:Title" href="#"></a>
      </td>      
      <td>
        <a class="edit" href="#">Edit</a>
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
	var themeViewModel = function(){
		var self = this;
		self.events={
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
	
	function loadThemes(){
		$.ajax({
            url: "modules/themefolder.php",
            type: "GET",
            data: {},
            dataType: "json",
            beforeSend: function () {
               
            }
        }).done(function (rs) {
            if (rs.Success) {              
          	   vm.datas(rs.Model);
            } else {
            	 alert("失败!");
            }
        }).fail(function () {
			alert("error");
        });        	  
    }
});
</script>