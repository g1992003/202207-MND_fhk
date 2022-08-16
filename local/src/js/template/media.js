
$(function(){

    
    $('#close').on('click', function () {
        $('#modalBg').css('display', 'none')
        $('body').removeClass('modal-open')
        player.stopVideo();
    })
    // const outer = document.getElementById('modalBg')
    // const inner = document.getElementById('myModal')
    // outer.addEventListener("click", function (e) {
    //     $('#modalBg').css('display', 'none')
    //     $('body').removeClass('modal-open')
    //     player.stopVideo();
    //     e.stopPropagation();
    // }, false);
    // inner.addEventListener('click', function (e) {
    //     e.stopPropagation();
    // }, false);


    $('.modalbtn').on('click', function () {
        $('#modalBg').css('display', 'block');
        $('body').addClass('modal-open')
        const Id = $(this).data('video')

        document.getElementById("video").innerHTML = `<div id='player${Id}'></div>`;
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        onYouTubeIframeAPIReady(Id)
        function onYouTubeIframeAPIReady(i) {
            if (typeof playerInfoList === 'undefined')
                return;
            var curplayer = createPlayer(playerInfoList[i]);
        }
    })
    var done = false;
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            document.getElementById("video").classList.add("enable")
            done = true;
        }
    }

    function stopVideo() {
        player.stopVideo();
    }


    function createPlayer(playerInfoList) {
        return new YT.Player(playerInfoList.id, {
            videoId: playerInfoList.videoId,
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }
})