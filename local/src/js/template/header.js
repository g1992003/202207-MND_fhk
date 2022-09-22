
let winscroll = $(window).scrollTop();
let winH = $(window).height();
let winW = $(window).width();

//--------------MENU-------------------

let menu = $('main').data('menu');
let video = $('main').data('video');
let index = $('main').data('index');

if(index){
    $('header.header.header-group.layout').removeClass('hidden')
    $('header.headerS-header__scroll.layout.header__scroll').removeClass('scroll_show')
    // $('header.headerS-header__scroll.layout.header__scroll').css({
    //     "opacity": "1",
    //     "pointer-events": "all"
    // })
}

$('.headerS-nav__scroll > a').removeClass('active');
$('.video-tag__menu ul li').removeClass('active');

$('.headerS-nav__scroll > a').eq(menu).addClass('active');
$('.video-tag__menu ul li').eq(video).addClass('active');


$(window).on('scroll', function () {
    winscroll = $(window).scrollTop();
    if(index === true){
        if (winscroll > 0) {
            $('header.header.header-group.layout').addClass('hidden')
            $('header.headerS-header__scroll.layout.header__scroll').addClass('scroll_show')
            // $('header.headerS-header__scroll.layout.header__scroll').css({
            //     "opacity": "1",
            //     "pointer-events": "all"
            // })
        } else {
            $('header.header.header-group.layout').removeClass('hidden')
            $('header.headerS-header__scroll.layout.header__scroll').removeClass('scroll_show')
            // $('header.headerS-header__scroll.layout.header__scroll').css({
            //     "opacity": "0",
            //     "pointer-events": "none"
            // })
        }
    }
});