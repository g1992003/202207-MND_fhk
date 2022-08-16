
$(function(){
    
    $('.photo__list').on('click', function () {
        $('#modalBg').css('display', 'block');
        $('body').addClass('modal-open')
    })
    $('#close').on('click', function () {
        $('#modalBg').css('display', 'none')
        $('body').removeClass('modal-open')
        player.stopVideo();
    })
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


