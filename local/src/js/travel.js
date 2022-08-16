
$(function(){
    
    $('.img_travel').on('click', function () {
        let index = $(this).index();
        $('.img__box li').removeClass('active');
        $('.img__box li').eq(index).addClass('active');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });

})


