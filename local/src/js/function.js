
$(function () {

    //@prepros-prepend plugin/jquery_min.js
    //@prepros-prepend template/header.js
    //@prepros-prepend template/footer.js
    //@prepros-prepend template/topbtn.js
    //@prepros-prepend template/animation.js



    $('body').addClass('loading')
    
    var musicPlay = document.querySelector(".music_play");
    let headerPlay = document.querySelector(".header-flex-item9");
    let headerSPlay = document.querySelector(".headerS-nav__scroll-item4.music");
    let headerSPlay_img = document.querySelector(".headerS-nav__scroll-item4.music .headerS-img");
    let headerPlay_f = document.querySelector(".header-icon:first-child");
    let headerPlay_l = document.querySelector(".header-icon:last-child");
    headerPlay.addEventListener('click', function(){
        if(headerPlay_f.classList.contains('play_show')){
            musicPlay.pause();
            headerPlay_f.classList.remove('play_show')
            headerPlay_l.classList.add('play_show') 
            headerSPlay_img.classList.add('pause') 
        }else{            
            musicPlay.play();
            headerPlay_f.classList.add('play_show')
            headerPlay_l.classList.remove('play_show')  
            headerSPlay_img.classList.remove('pause')
        }
    })
    headerSPlay.addEventListener('click', function(){
        if(headerSPlay_img.classList.contains('pause')){
            musicPlay.play();
            headerPlay_f.classList.add('play_show')
            headerPlay_l.classList.remove('play_show')
            headerSPlay_img.classList.remove('pause')
        }else{   
            musicPlay.pause();
            headerPlay_f.classList.remove('play_show')
            headerPlay_l.classList.add('play_show')    
            headerSPlay_img.classList.add('pause') 
        }
    })




    // musicPlay.addEventListener('click', function(){
    //     if(musicPlay.classList.contains('play')){
    //         audioPlay.pause();
    //         musicPlay.classList.remove('play')
    //     }else{
    //         audioPlay.play();
    //         musicPlay.classList.add('play')
    //     }
    // })

    // --------------------main min-height---------------------
    function minHeight(){
        var windowHeight = $(window).height();
        var miniHeight = windowHeight - $('footer').outerHeight() + $('header').outerHeight();
        $('main').css({
            "min-height": miniHeight + "px"
        });
    }

    minHeight()

    $(window).on('resize', function (e) {
        minHeight()
    });

});
