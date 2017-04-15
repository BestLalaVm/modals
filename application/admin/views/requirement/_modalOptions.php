<div id="shown-modal-container">
    <div>
        <table class="table table-striped table-hover table-bordered dataTable" id="sample_editable_1"
               aria-describedby="sample_editable_1_info">
            <thead>
            <tr role="row">
                <th style="width: 80px;">编号</th>
                <th style="width: 300px;">名称</th>
                <th style="width: 120px;"></th>
                <th style="width: 500px;">简介</th>
                <th style="width: 120px;">创建时间</th>
                <th style="width: 80px;"></th>
            </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all" data-bind="foreach:datas">
            <tr data-bind="css:($index==0?'even' : 'odd')">
                <td class=" sorting_1" data-bind="html:id"></td>
                <td class=" " data-bind="html:name"></td>
                <td class=" "><img data-bind="attr:{src:smallImage}" style="width: 120px;height: 80px;"></td>
                <td class="center " data-bind="html:introducation"></td>
                <td class="center " data-bind="html:createdTime"></td>
                <td class=" "><a class="edit" href="#" data-bind="click:$parent.events.select">选择</a></td>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php $this->load->view("shared/_paginationwithJs")?>
</div>

<script type="text/javascript">
    $(function () {
        var modalViewModel = function () {
            var self = this;

            self.datas = ko.observableArray([]);

            self.modalId=ko.observable($("input[name='modal_id']").val());
            self.modalName=ko.observable($("input[name='modal_name']").val());
            self.shownModal = ko.observable(false);
            self.paginations = {
                totalCount: ko.observable(0),
                pageIndex: ko.observable(1),
                pageSize: ko.observable(25)
            }

            self.query = function () {
                if(self.paginations.pageIndex()<=1){
                    self.paginations.pageIndex(1);
                }
                $.get("<?php echo site_url("modal/getOptions")?>", {
                    pageIndex:self.paginations.pageIndex(),
                    pageSize:self.paginations.pageSize()
                }, function (d) {
                    self.datas(d.datas);
                    self.paginations.totalCount(d.totalCount);
                    self.paginations.pageIndex(d.pageIndex);
                    self.paginations.pageSize(d.pageSize);
                }, "json");
            }

            self.events = {
                openModals: function () {
                    self.shownModal(true);
                    self.paginations.pageIndex(0);
                    self.query();
                },
                select:function (d) {
                  self.modalId(d.id);
                  self.modalName(d.name);
                  self.shownModal(false);
                }
            }

            self.paginations.totalPage =ko.computed(function () {
                var c = Math.ceil(self.paginations.totalCount() / self.paginations.pageSize());
                return c;
            });

            self.paginations.pageItems = ko.computed(function(){
                var pageItemDatas =[];

                var maxPage=self.paginations.totalPage();
                var index=0;
                if(self.paginations.pageIndex()-5>0)
                {
                    index=self.paginations.pageIndex()-5;
                }

                if(index==0)
                {
                    maxPage=10;
                }else
                {
                    pageItemDatas.push({url:"<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(index-1)+"&pageSize="+self.paginations.pageSize(),label:"...",active:false});
                    if(self.paginations.pageIndex()+5<self.paginations.totalPage())
                    {
                        maxPage = self.paginations.pageIndex()+5;
                    }
                }

                for(;index<maxPage;index++)
                {
                    pageItemDatas.push({index:(index+1), url:"<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(index+1)+"&pageSize="+self.paginations.pageSize(),label:(index+1),active:(index+1)==self.paginations.pageIndex()});
                }
                if(maxPage<self.paginations.totalPage())
                {
                    pageItemDatas.push({index:(maxPage+1),url:"<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(maxPage+1)+"&pageSize="+self.paginations.pageSize(),label:"...",active:false});
                }

                return pageItemDatas;
            });
            self.paginations.nextPageUrl=ko.computed(function(){
                if(self.paginations.pageIndex()==self.paginations.totalPage())
                {
                    return "#";
                }
                return "<?php echo $_SERVER["PHP_SELF"];?>?pageIndex="+(self.paginations.pageIndex()+1)+"&pageSize="+self.paginations.pageSize();
            });

            self.paginations.prevPageUrl = ko.computed(function(){
                if(self.paginations.pageIndex()==1)
                {
                    return "#";
                }
                return "<?php echo $_SERVER["PHP_SELF"];?>?pageIndex=1&pageSize="+self.paginations.pageSize();
            });

            self.paginations.showPage = ko.computed(function () {
                return self.paginations.totalPage()>1;
            });
        }

        var vm = new modalViewModel();
        ko.applyBindings(vm, $(".detail")[0]);
    });
</script>