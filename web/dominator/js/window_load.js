$(function(){
	var res = window.innerHeight;
	if(res < 717) res = 717;
	$("#wrapper").css({"min-height":res+"px"});
//	setTimeout("location.href = '../system/session_close.php'",1800000);
	var tdw =  $("#td_img").width() * 3 * 0.9;
	$(".img_a").css({"width":tdw+"px"});
});