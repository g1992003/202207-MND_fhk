
    //@prepros-prepend plugin/swiper-bundle.min.js
    //@prepros-prepend plugin/lightcase.js

$(function(){
    
    const outer = document.getElementById('modalBg')
    const inner = document.getElementById('myModal')
    outer.addEventListener("click", function (e) {
        $('#modalBg').css('display', 'none')
        $('body').removeClass('modal-open')
        player.stopVideo();
        e.stopPropagation();
    }, false);
    inner.addEventListener('click', function (e) {
        e.stopPropagation();
    }, false);

})


