 

$(function(){
    
    $('.photo__list').on('click', function () {
        $('#modalBg').css('display', 'block');
        $('body').addClass('modal-open')
    })
    $('#close').on('click', function () {
        $('#modalBg').css('display', 'none')
        $('body').removeClass('modal-open')
        console.log()
        $('html, body').animate({
            scrollTop: $('.new-section2__flex-item').offset().top - 160
         }, 1000);
    })
    const outer = document.getElementById('modalBg')
    const inner = document.getElementById('myModal')
    outer.addEventListener("click", function (e) {
        $('#modalBg').css('display', 'none')
        $('body').removeClass('modal-open')
        e.stopPropagation();
    }, false);
    inner.addEventListener('click', function (e) {
        e.stopPropagation();
    }, false);

    let num = 0;
    let lengthNum = $('.photo__list').length - 1
    console.log(lengthNum)
    $('.new-section2__flex1 a').on('click', function(){
        let realIndex = $(this).index() / 2
        num = realIndex
        show(num)
    })
    $('.btn_prev').on('click', function () { 
        if(num == 0){
            num = 0
        }else{
            num = num - 1
        }
        show(num)
    });
    $('.btn_next').on('click', function () {
        if(num == lengthNum){
            num = lengthNum
        }else{
            num = num + 1
        }
        show(num)
    });
    function indexInit(num){
        if(num == 0){
            $('.btn_prev').addClass('no-page')
            $('.btn_next').removeClass('no-page')
        }else if(num == lengthNum){
            $('.btn_prev').removeClass('no-page')
            $('.btn_next').addClass('no-page')
        }else{
            $('.btn_prev').removeClass('no-page')
            $('.btn_next').removeClass('no-page')
        }
    }
    function show(num){
        $('.modal-content li').removeClass('show')
        $('.modal-content li').eq(num).addClass('show')
        indexInit(num)
    }
})


