<section class="lightSection clearfix pageHeader">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="page-title">
                    <h2>模型明细</h2>
                </div>
            </div>
            <div class="col-xs-6">
                <ol class="breadcrumb pull-right">
                    <li>
                        <a href="index.html">首页</a>
                    </li>
                    <li class="active">明细</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="mainContent clearfix genricContent modaldetail" style="padding-top: 70px;">
    <div class="container">
        <div class="error">
            <?php if(isset($uniqueError))echo $uniqueError; ?>
        </div>
        <div class="row">
            <div class="col-xs-12 userProfile">
                <div class=" profile">
                    <?php echo form_open_multipart(site_url("/shop/profile/modaldetail"), array("class" => "form-horizontal")) ?>
                    <?php echo form_hidden("id",$id);?>
                    <ul class="nav nav-tabs btn-group" id="divTagList" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#basic" aria-controls="home" role="tab"
                               data-toggle="tab">基本信息</a>
                        </li>
                        <li role="presentation"><a href="#modals" aria-controls="profile" role="tab"
                                                   data-toggle="tab">展示方式</a>
                        </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="basic">
                            <?php echo $this->load->view("shop/profile/_modaldetailbasic", array(), true); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="modals">
                            <?php echo $this->load->view("shop/profile/_modaldetailshowntype", array("shownType"=>$shownType,"shownDescription"=>$shownDescription), true); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-3">
                            <button type="submit" id="btnSave" class="btn btn-primary" data-bind="click:events.save" style="width: 100px;">保存</button>
                            <a class="btn btn-link" href="<?=site_url("shop/profile/index");?>" style="width: 80px;">返回</a>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
<script type="text/javascript">
    function selectAttachment()
    {
        $("input[name='attachment']").val($("#newattachment").val());
    }
</script>
<style type="text/css">
    .select2-container.select2-container-multi {
        padding: 0px !important;
    }

    .select2-container.select2-container-multi .select2-choices .select2-search-field input {
        background-color: #f0f0f0 !important;
        border-width: 0px !important;
        padding: 0px !important;
        margin: 0px !important;
        height: 48px;
        padding-left: 10px;
    }
    .profile a
    {
        color: #337ab7;
    }
</style>