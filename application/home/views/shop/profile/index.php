<!-- LIGHT SECTION -->
<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="page-title">
                    <h2>个人中心</h2>
                </div>
            </div>
            <div class="col-xs-6">
                <ol class="breadcrumb pull-right">
                    <li>
                        <a href="<?=site_url("shop/home/index");?>">首页</a>
                    </li>
                    <li class="active">个人中心</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT SECTION -->
<section class="mainContent clearfix userProfile">
    <div class="container">
       <div class="row">
           <div class="col-xs-12">
               <!-- Nav tabs -->
               <ul class="nav nav-tabs btn-group" id="divTagList" role="tablist">
                   <li role="presentation" class="active"><a href="#basic" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i>基本信息</a></li>
                   <li role="presentation"><a href="#modals" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i>我的模型</a></li>
                   <li role="presentation"><a href="#requirements" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-map-marker" aria-hidden="true"></i>我的需求</a></li>
                   <li role="presentation"><a href="#orders" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-list" aria-hidden="true"></i>所有订单</a></li>
                   <li role="presentation"><a href="#wishlist" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-gift" aria-hidden="true"></i>收藏列表</a></li>
                   <li role="presentation"><a href="#questions" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-gift" aria-hidden="true"></i>我的问答</a></li>
                   <li role="presentation"><a href="#message" aria-controls="settings" role="tab" data-toggle="tab"><i class="fa fa-gift" aria-hidden="true"></i>我的消息</a></li>
               </ul>
               <!-- Tab panes -->
               <div class="tab-content">
                   <div role="tabpanel" class="tab-pane active" id="basic">
                       <?php echo $this->load->view("shop/profile/_userInfo",array(),true);?>
                   </div>
                   <div role="tabpanel" class="tab-pane" id="modals">
                       <?php echo $this->load->view("shop/profile/_myModals",array(),true);?>
                   </div>
                   <div role="tabpanel" class="tab-pane" id="requirements">
                       <?php echo $this->load->view("shop/profile/_myRequirements",array(),true);?>
                   </div>
                   <div role="tabpanel" class="tab-pane" id="orders">
                       <?php echo $this->load->view("shop/profile/_myOrders",array(),true);?>
                   </div>
                   <div role="tabpanel" class="tab-pane" id="wishlist">
                       <?php echo $this->load->view("shop/profile/_wishlist",array(),true);?>
                   </div>
                   <div role="tabpanel" class="tab-pane" id="questions">
                       <?php echo $this->load->view("shop/profile/_myQuestions",array(),true);?>
                   </div>
                   <div role="tabpanel" class="tab-pane" id="message">
                       <?php echo $this->load->view("shop/profile/_myMessages",array(),true);?>
                   </div>
               </div>
           </div>
       </div>
    </div>
</section>
<script type="text/javascript">
    window.profile={
        "modals":null,
        "requirements":null,
        "orders":null,
        "wishlist":null,
        "questions":null,
        "message":null
    };
    $(function () {
        var profileContainers={};
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var $element = $(e.target||e.relatedTarget );
            var id =$element.attr("href").replace("#","");
            if(!profileContainers[id])
            {
                profileContainers[id]=true;
                if(window.profile[id]!=null)
                {
                    window.profile[id].query();
                }
            }
        })

        if(window.location.hash){
            setTimeout(function () {
                $(".nav.nav-tabs a[href='"+window.location.hash+"']").tab("show");
            },1000);
        }
    });
</script>