<div class="row-fluid">
	<div class="span2" data-bind="visible:paginations.showPage">
		<div class="dataTables_info" id="sample_2_info">
			每页 <span data-bind="text:paginations.pageSize"></span>	条 共 <!--ko text:paginations.totalCount--><!--/ko--> 条
		</div>
	</div>
	<div class="span10" data-bind="visible:paginations.showPage" style="display: none;">
		<div class="dataTables_paginate paging_bootstrap pagination" style="margin-top: 0px;">
			<ul>
				<li class="prev" data-bind="css:(paginations.pageIndex()==1?'disabled':'')"><a href="#"  data-bind="click:function(d){paginations.pageIndex(paginations.pageIndex()-1);query();}">← <span data-bind="css:(paginations.pageIndex()==1?'hidden-480':'')">上一页</span></a></li>
				<!--ko foreach:paginations.pageItems-->
				   <li data-bind="css:(active?'active':'')">
				     <a	data-bind="click:function(d){$parent.paginations.pageIndex(d.index);$parent.query();},html:label"></a>
				   </li>
				<!--/ko -->
				<li class="next" data-bind="css:(paginations.pageIndex()==paginations.totalPage()?'disabled':'')"><a data-bind="click:function(d){paginations.pageIndex(paginations.pageIndex()+1);query();}"><span data-bind="css:(paginations.pageIndex()==paginations.totalPage()?'hidden-480':'')">下一页</span> → </a></li>
			</ul>
		</div>
	</div>
</div>
