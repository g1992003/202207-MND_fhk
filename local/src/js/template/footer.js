
if(winW < 992){
    $('.icon_list').on('click', function () {
        $(this).parent().siblings().removeClass('active');
        $(this).parent().toggleClass('active');

    });
    
    $('.f_icon_list li').on('click', function () {
        $(this).parent().parent().removeClass('active');
    });

    $(window).on('scroll', function () {
        $('.icon_list').parent().removeClass('active');
    });

    $(window).on('click', function(e){
        var icon = $('.f_icon'); 
        if(!icon.is(e.target) && icon.has(e.target).length === 0){
            $('.f_icon li').removeClass('active');
        }
    });

}
