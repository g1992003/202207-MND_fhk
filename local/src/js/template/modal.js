
$('.video-list').on('click', function () {
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



// --------------------video---------------------
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;    
var videoModules = $('#player').data().video;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        videoId: videoModules,
        playerVars: {
            'playsinline': 1,
            'rel': 0, //關閉相關影片、但會顯示同頻道影片
        },
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}
function onPlayerReady(e) {
    e.target.mute();      //播放時靜音
    e.target.playVideo(); //自動撥放
}
var done = false;
function onPlayerStateChange(e) {
    if (e.data == YT.PlayerState.PLAYING && !done) {
        // setTimeout(stopVideo, 6000);
        done = true;
    }
}
