window.modalUtil = window.modalUtil || {};
$(function () {
    var shoppingCartFlag = ko.observable(false);
    window.modalUtil.addAddWishList = function ($modalId,successCallBack) {
        $.post(window.modalUtil.config.addwishlistUrl, {"modalId": $modalId}, function (d) {
            if (d.success) {
                if(typeof successCallBack=="function"){
                    successCallBack();
                }else
                {
                    alert("成功!")
                }
            } else {
                if(d.code=="401"){
                    if(d.redirectUrl){
                        window.location.href=d.redirectUrl;
                    }else{
                        window.location.reload();
                    }
                    return;
                }
                alert(d.message);
            }
        },"json");
    }
    window.modalUtil.removeWishList = function ($modalId,successCallBack) {
        $.post(window.modalUtil.config.removewishlistUrl, {"modalId": $modalId}, function (d) {
            if (d.success) {
                if(typeof successCallBack=="function"){
                    successCallBack();
                }else
                {
                    alert("成功!")
                }
            } else {
                if(d.code=="401"){
                    if(d.redirectUrl){
                        window.location.href=d.redirectUrl;
                    }else{
                        window.location.reload();
                    }
                    return;
                }
                alert(d.message);
            }
        },"json");
    }

    window.modalUtil.addShoppingCart = function ($modalId,$meterialId,$quantity,successCallBack) {
        $.post(window.modalUtil.config.addshoppingcartUrl, {"modalId": $modalId,"quantity":$quantity,"meterialId":$meterialId}, function (d) {
            if (d.success) {
                shoppingCartFlag(!shoppingCartFlag());
                if(typeof successCallBack=="function"){
                    successCallBack();
                }
            } else {
                if(d.code=="401"){
                    if(d.redirectUrl){
                        window.location.href=d.redirectUrl;
                    }else{
                        window.location.reload();
                    }
                    return;
                }
                alert(d.message);
            }
        },"json");
    }

    var shoppingCartViewModel = function () {
        var self = this;
        self.datas=ko.observableArray();
        self.count = ko.observable(0);
        self.query=function () {
            $.get(window.modalUtil.config.loadshoppingcartsUrl,{},function (d) {
                self.datas(d.datas);
                self.count(d.count);
            },"json").always(function () {

            });
        }
    }

    var svm = new shoppingCartViewModel();
    shoppingCartFlag.subscribe(function () {
       svm.query();
    });
    window.modalUtil.getShoppingCartViewModel=function () {
        svm.query();
        return svm;
    }
})
