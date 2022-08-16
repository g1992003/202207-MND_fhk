
let topbtnH = $('.top-btn').outerHeight();

$(window).on('scroll resize', function () {
    let winH = $(window).height();
    let winW = $(window).width();
    let winscroll = $(window).scrollTop();
    let topBtnStop = $(document).height() - winH - $('footer').outerHeight() + topbtnH + 26;
    let topPc = $(document).height() - $('footer').outerHeight() + 26;
    let topMo = $(document).height() - $('footer').outerHeight() + 31;
    
    //show info icon
    if(winscroll > 0){
        $('.top-btn').addClass('show');
    }else{
        $('.top-btn').removeClass('show');
    }
    
    
    if(winscroll >= topBtnStop){
        $('.top-btn').addClass('change');
        if( winH > 767 ){
            $('.change').css('top', topPc);
        }else{
            $('.change').css('top', topMo);
        }
    }else{
        $('.top-btn').removeClass('change');
        $('.top-btn').css('top', 'auto');
    } 

    //向上scroll
    $('.top-btn').on('click',function(){
        $('html,body').stop(true).animate({
            scrollTop: 0
        }, 1000);
    })
});