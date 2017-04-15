<div class="row-fluid" id="pagination-container">
	<div class="span2" data-bind="visible:showPage" style="display: none;">
		<div class="dataTables_info" id="sample_2_info">
			每页 <select style="width: 52px;" data-bind="value:pageSize">
                <option>25</option>
				<option>50</option>
				<option>100</option></select>
			条 共 <?php echo $totalCount?> 条
		</div>
	</div>
	<div class="span10" data-bind="visible:showPage" style="display: none;">
		<div class="dataTables_paginate paging_bootstrap pagination">
			<ul>
				<li class="prev disabled"><a href="#">← <span data-bind="css:(prevPageUrl()=='#'?'hidden-480':'')">上一页</span></a></li>
				<!--ko foreach:pageItems-->
				   <li data-bind="css:(active?'active':'')">
				     <a	data-bind="attr:{href:url},html:label"></a>
				   </li>
				<!--/ko -->
				<li class="next"><a data-bind="attr:{href:nextPageUrl}"><span data-bind="css:(nextPageUrl()=='#'?'hidden-480':'')">下一页</span> → </a></li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
    var paginationViewModel = function(){
        var self = this;

        self.pageIndex=ko.observable(<?php echo $pageIndex;?>);
        self.pageSize=ko.observable(<?php echo $pageSize;?>);
        self.totalCount=ko.observable(<?php echo $totalCount;?>);

        self.totalPage = ko.computed(function () {
            return Math.ceil(self.totalCount() / self.pageSize());
        });

        self.pageItems = ko.computed(function(){
            var pageItemDatas =[];

            var maxPage=self.totalPage();
            var index=0;
            if(self.pageIndex()-5>0)
            {
                index=self.pageIndex()-5;
            }

            if(index==0)
            {
                maxPage=10;
            }else
            {
                pageItemDatas.push({url:"<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(index-1)+"&pageSize="+self.pageSize(),label:"...",active:false});
                if(self.pageIndex()+5<self.totalPage())
                {
                    maxPage = self.pageIndex()+5;
                }
            }

            for(;index<maxPage;index++)
            {
                pageItemDatas.push({url:"<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(index+1)+"&pageSize="+self.pageSize(),label:(index+1),active:(index+1)==self.pageIndex()});
            }
            if(maxPage<self.totalPage())
            {
                pageItemDatas.push({url:"<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(maxPage+1)+"&pageSize="+self.pageSize(),label:"...",active:false});
            }

            return pageItemDatas;
        });

        self.nextPageUrl=ko.computed(function(){
           if(self.pageIndex()==self.totalPage())
           {
               return "#";
           }
            return "<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(self.pageIndex()+1)+"&pageSize="+self.pageSize();
        });

        self.prevPageUrl = ko.computed(function(){
            if(self.pageIndex()==1)
            {
                return "#";
            }
            return "<?php echo $_SERVER["PHP_SELF"];?>?pageIndex=1&pageSize="+self.pageSize();
        });

        self.showPage = ko.computed(function () {
            console.log(self.totalPage());
            return self.totalPage()>1;
        });
    }

    var pvm = new paginationViewModel();
    ko.applyBindings(pvm,$("#pagination-container")[0]);
})
</script>