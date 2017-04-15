/**
 * Created by BestLala on 2/25/2017.
 */
$(function () {
    iniitHomeImageSlide();
    initHomeSecondBlock("body");

    var hheight = $(".main-header").height();
    var fheight = $(".main-footer").height();
    var cheight = $(window).height()-hheight-fheight-60;
    $(".main-content").css("min-height",cheight);

    $('.datepicker').datepicker().on("changeDate",function (ev) {
        $(ev.currentTarget||ev.target).datepicker("hide");
    });
});
var iniitHomeImageSlide = function () {
    var j = 1;
    var MyTime = false;
    var fot = 200;//????????
    var fin = 300;//???????
    var amt = 300;//????????
    var speed = 3000;//??????
    var maxpic = 4;//??????
    $("#ppt").find("li").each(function (i) {
        $("#ppt").find("li").eq(i).mouseover(function () {
            var cur = $("#mpc").find("div:visible").prevAll().length;
            if (i !== cur) {
                j = i;
                $("#mpc").find("div:visible").fadeOut(fot, function () {
                    $("#mpc").find("div").eq(i).fadeIn(fin);
                });
                $("#tri").animate({"top": i * 80 + "px"}, amt, current(this, "li"));

            }
        });
    });

    $('#imgnav').hover(function () {
        if (MyTime) {
            clearInterval(MyTime);
        }
    }, function () {
        MyTime = setInterval(function () {
            $("#ppt").find("li").eq(j).mouseover();
            j++;
            if (j == maxpic) {
                j = 0;
            }
        }, speed);
    });

    var MyTime = setInterval(function () {
        $("#ppt").find("li").eq(j).mouseover();
        j++;
        if (j == maxpic) {
            j = 0;
        }
    }, speed);
}
var initHomeSecondBlock=function (selector) {
    $(selector+' .one_main').on('mouseover mouseout',function(event){
        if(event.type=='mouseout'){
            $(this).find('a').find('.hover_bg').hide();
            $(this).find('a').find('.main_p1').css("color","#4c4c4c");
        }else{
            $(this).find('a').find('.hover_bg').show();
            $(this).find('a').find('.main_p1').css("color","#87C71B");

        }
    });
}
function current(ele, tag) {
    $(ele).addClass("cur").siblings(tag).removeClass("cur");
}

window.modalUtil ={
    download:function (modalId) {

    },
    collect:function (modalId) {

    }
}

