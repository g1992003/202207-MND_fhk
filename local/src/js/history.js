
$(function(){

    let winW = $(window).width();
    let firstNum = 0;
    let endNum;
    let num;
    
    $(window).on('resize', function () {
        window.location.reload();
    });


    $('.swiper-slide').eq(0).addClass('s_circle');
    if(winW >= 1600){
        $('.swiper-slide').eq(5).addClass('s_circle');
        endNum = 5;
        num = 5; 
    }else if(winW < 1600 && winW >= 1400){
        $('.swiper-slide').eq(4).addClass('s_circle');
        endNum = 4;
        num = 4; 
    }else if(winW < 1400){
        $('.swiper-slide').eq(3).addClass('s_circle');
        endNum = 3;
        num = 3; 
    }

    $('.swiper-button-next').on('click', function () {
        firstNum = firstNum + 1;
        endNum = endNum + 1;
        $('.swiper-slide').removeClass('s_circle');
        $('.swiper-slide').eq(firstNum).addClass('s_circle');
        $('.swiper-slide').eq(endNum).addClass('s_circle');
    });

    $('.swiper-button-prev').on('click', function () {
        firstNum = firstNum - 1;
        endNum = endNum - 1;
        $('.swiper-slide').removeClass('s_circle');
        $('.swiper-slide').eq(firstNum).addClass('s_circle');
        $('.swiper-slide').eq(endNum).addClass('s_circle');
    });

    

    
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        spaceBetween: 0,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1400: {
                slidesPerView: 5,
                spaceBetween: 0
            },
            1600: {
                slidesPerView: 6,
                spaceBetween: 0
            }
        },
        on: {
            slideChangeTransitionEnd: function () {
                let newIndex = this.realIndex;
                $('.swiper-slide').removeClass('s_circle');
                $('.swiper-slide').eq(newIndex).addClass('s_circle');
                endNum = newIndex + num;
                $('.swiper-slide').eq(endNum).addClass('s_circle');
            },
        },
    });

})


