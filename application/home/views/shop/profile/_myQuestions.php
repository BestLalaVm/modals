<?php
/**
 * Created by PhpStorm.
 * User: BestLala
 * Date: 3/5/2017
 * Time: 9:20 AM
 */
?>
<div class="row" id="divmyQuestionsContainer">
    <div class="col-xs-12">
        <div class="container">
            <div class="row" data-bind="visible:(datas().length>0)">
                <div class="col-xs-12">
                    <div class="thumbnail">
                        <div class="commentsArea">
                            <h3>我的提问</h3>
                            <!--ko foreach: datas-->
                            <div class="media">
                                <a class="media-left" href="#">
                                </a>
                                <div class="media-body">
                                    <h4><span>提问: <i class="fa fa-calendar" aria-hidden="true"></i><!--ko text:createdTime--><!--/ko--></span></h4>
                                    <p data-bind="html:question"></p>
                                    <div class="media" data-bind="visible:answerTime" style="margin: 20px; margin-top: 40px; padding-left: 20px;padding-top: 10px;background-color: #ddd;border: 1px solid #ddd;">
                                        <a class="media-left" href="#">
                                        </a>
                                        <div class="media-body">
                                            <h4>
                                                <span>答复: <i class="fa fa-calendar"
                                                         aria-hidden="true"></i><!--ko text:answerTime--><!--/ko--></span>
                                            </h4>
                                            <p data-bind="html:answer" style="min-height: 150px;"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ko-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-bind="visible:!isNew()">
                <a href="#" data-bind="click:events.add" class="btn btn-link">新增需求</a>
            </div>
            <div class="row" data-bind="visible:isNew">
                <div class="col-xs-12">
                    <form action="#" method="POST" role="form" class="commentsForm">
                        <h3>我要留言</h3>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <textarea class="form-control" data-bind="value:question" rows="3"
                                              placeholder="我的留言"></textarea>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary" data-bind="click:events.save"
                                id="btnSaveQuestion">提交我的留言
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            var questionsViewModel = function () {
                var self = this;

                self.question = ko.observable();
                self.isNew = ko.observable(false);
                self.datas = ko.observableArray([]);
                self.paginations = {
                    totalCount: ko.observable(0),
                    pageIndex: ko.observable(1),
                    pageSize: ko.observable(6)
                }
                self.paginations.totalPages = ko.computed(function () {
                    return Math.ceil(self.paginations.totalCount() / self.paginations.pageSize());
                });

                self.paginations.pageIndex.subscribe(function (nv) {
                    self.query();
                });

                self.toValidate = ko.observable(false);
                self.valdaitions = {
                    question: function () {
                        if (!self.toValidate()) {
                            return true;
                        }

                        if (!self.question()) {
                            return false;
                        }

                        return true;
                    }
                };

                self.query = function () {
                    $.get("<?php echo site_url("shop/profile/getQuestions")?>",{
                        pageIndex:self.paginations.pageIndex(),
                        pageSize:self.paginations.pageSize()
                    }, function (d) {
                        self.datas(d.datas);
                        self.paginations.totalCount(d.totalCount);
                        self.paginations.pageIndex(d.pageIndex);
                        self.paginations.pageSize(d.pageSize);
                    }, "json");
                };

                var isSubmiting = false;
                var $btnSaveQuestion = $("#btnSaveQuestion");
                var submitText = $btnSaveQuestion.html();
                self.events = {
                    add: function () {
                        self.toValidate(false);
                        self.question("");
                        self.isNew(true);
                    },
                    save: function () {
                        if (isSubmiting) {
                            return;
                        }
                        self.toValidate(true);
                        if (!self.valdaitions.question()) {
                            return;
                        }
                        $btnSaveQuestion.html("正在保存..");
                        $btnSaveQuestion.attr("disabled", true);
                        var data = {
                            "question": self.question()
                        };
                        isSubmiting = true;
                        $.post("<?php echo site_url("shop/profile/createQuestion")?>", data, function (d) {
                            if (d.success) {
                                self.query();
                                self.isNew(false);
                            } else {
                                alert(d.message);
                            }
                        }, "json").always(function () {
                            isSubmiting = false;
                            $btnSaveQuestion.html(submitText);
                            $btnSaveQuestion.attr("disabled", false);
                        });
                    }
                }
            }

            window.profile["questions"]=new questionsViewModel();
            ko.applyBindings(window.profile["questions"], $("#divmyQuestionsContainer")[0]);
        })
    </script>
</div>
