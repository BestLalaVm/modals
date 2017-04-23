<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 2/26/2017
 * Time: 12:35 PM
 */
$pageCount = ceil($totalCount / $pageSize);


$url=site_url($url);
$url = trim($url,'?');
$url=$_SERVER["PATH_INFO"];
$params = explode("&",$_SERVER["QUERY_STRING"]);
$istart=false;
for($index=0;$index<count($params);$index++) {
    $itemValue = trim($params[$index],"?");
    if(empty($itemValue))continue;
    if (strpos($itemValue, "page") === 0) {
        continue;
    }
    if (!$istart) {
        $istart=true;
        $url.="?".$itemValue;
    }else{
        $url.="&".$itemValue;
    }
}
$split="?";
if($istart){
    $split="&";
}
?>
<div class="text-center" id="pagination-container">
    <ul class="pagination" data-bind="visible:totalPage()>1">
        <li><a> <?php echo $totalCount; ?> 条记录 <?php echo $pageIndex; ?>/<?php echo $pageCount; ?> 页</a></li>
        <!--ko foreach: pageItems-->
        <li data-bind="css:(active?'active':'')">
            <span class="current" data-bind="css:(active?'active':''),visible:active,html:label"></span>
            <a href="#" data-bind="attr:{href:url},html:label,visible:!active"></a>
        </li>
        <!--/ko-->
        <li>
            <a href="" data-bind="attr:{href:lastPage}">最后一页</a>
        </li>
    </ul>
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

            self.lastPage = ko.computed(function(){
               var qs = 'pageIndex='+self.totalPage()+'&pageSize='+self.pageSize();

               var pUrl="<?php echo $url;?>"+"<?=$split?>"+qs;

               return pUrl;
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
                    pageItemDatas.push({url:"<?php echo $url.$split;?>pageIndex="+(index+1)+"&pageSize="+self.pageSize(),label:"...",active:false});
                    if(self.pageIndex()+5<self.totalPage())
                    {
                        maxPage = self.pageIndex()+5;
                    }
                }

                if(maxPage>self.totalPage())
                {
                    maxPage = self.totalPage();
                }

                for(;index<maxPage;index++)
                {
                    pageItemDatas.push({url:"<?php echo $url.$split;?>pageIndex="+(index+1)+"&pageSize="+self.pageSize(),label:(index+1),active:(index+1)==self.pageIndex()});
                }
                if(maxPage<self.totalPage())
                {
                    pageItemDatas.push({url:"<?php echo $url.$split;?>pageIndex="+(maxPage+1)+"&pageSize="+self.pageSize(),label:"...",active:false});
                }

                return pageItemDatas;
            });

            self.nextPageUrl=ko.computed(function(){
                if(self.pageIndex()==self.totalPage())
                {
                    return "#";
                }
                return "<?php echo $url.$split;?>pageIndex="+(self.pageIndex()+1)+"&pageSize="+self.pageSize();
            });

            self.prevPageUrl = ko.computed(function(){
                if(self.pageIndex()==1)
                {
                    return "#";
                }
                return "<?php echo $url.$split;?>pageIndex=1&pageSize="+self.pageSize();
            });

            self.showPage = ko.computed(function () {
                return self.totalPage()>1;
            });
        }

        var pvm = new paginationViewModel();
        ko.applyBindings(pvm,$("#pagination-container")[0]);
    })
</script>
