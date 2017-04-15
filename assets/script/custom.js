$(function(){
	$('.colorpicker').colorpicker({ 
		hexNumberSignPrefix:true,
		color:true,
		format:"hex"
	});

	$("#frmSearch .btn-reset").click(function () {
		$("input[type='text']").val("");
    });

	$("td a.delete").click(function () {
		if(confirm("确定删除该数据?")){
            var url = $(this).attr("data-url");
            window.location.href=url;
		}
    });
});