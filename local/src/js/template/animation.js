
if(winW < 992){
    $('.ain:not(.asj)').each(function(){
        $(this).addClass('asj');
    });
}


let traggle = winH * 0.75; //動畫觸發點
$('.asj:not(.animated)').each(function(){
    let offset = $(this).offset().top; //有asj且沒有animated的Y座標
    if(offset < winH){ 
        $(this).addClass('animated'); //asj增加animated
    }
});

$(window).on('scroll', function () {
    let scroll = $(window).scrollTop(); //取得捲軸高
    $('.asj:not(.animated)').each(function(){
        let offset = $(this).offset().top; //有asj且沒有animated的Y座標
        if(offset - traggle < scroll && offset > traggle){ //asj的Y座標-動畫觸發點 < 捲軸高度
            $(this).addClass('animated'); //asj增加animated
        }
    });
});

