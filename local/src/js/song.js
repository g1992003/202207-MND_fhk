$(function () {
    
    //@prepros-prepend template/top_menu.js
    
    var songVideo = document.querySelectorAll(".song_video");
    var songList = document.querySelectorAll(".song_list");
    var audioPlay = document.querySelector(".song_music");
    var audioSrc = document.querySelector(".song_music source");
    var musicList = document.querySelectorAll(".musicList li")
    var musicPlay = document.querySelector(".music_play");
    let headerSPlay_img = document.querySelector(".headerS-nav__scroll-item4.music .headerS-img");

    songVideo.forEach(i => {
        i.addEventListener('click', function(){
            musicPlay.pause();
            headerSPlay_img.classList.add('pause') 
        })
    })

    songList.forEach((i,idx) => {
        i.addEventListener('click', function(){
            if(i.classList.contains('playNow')){
                i.classList.remove('playNow')
                audioPlay.pause()
            }else{
                i.classList.add('playNow')
                audioSrc.src = musicList[idx].dataset.src
                audioPlay.load()
                audioPlay.play()
                musicPlay.pause();
                headerSPlay_img.classList.add('pause') 
                siblings(i)
            }
        })
    })
    
    function siblings(item){
        var p = item.parentNode.children;
        for(var i=0, pl=p.length; i<pl ;i++){
            if(p[i] !== item){
                p[i].classList.remove('playNow')
            }
        }
    }
})