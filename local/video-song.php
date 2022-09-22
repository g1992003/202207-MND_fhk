<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/Song.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Video__list.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Song__list.css" />

</head>

<body class="lang_tw">    
    <div class="song_sound">
        <audio controls class="song_music">
            <source src="" type="audio/mpeg">
        </audio>
    </div>
    <ul class="musicList" style="display: none">
        <li data-src="dist/audio/001.mp3"></li>
        <li data-src="dist/audio/002.mp3"></li>
        <li data-src="dist/audio/003.mp3"></li>
        <li data-src="dist/audio/004.mp3"></li>
        <li data-src="dist/audio/005.mp3"></li>
        <li data-src="dist/audio/006.mp3"></li>
    </ul>

    <main class="song song-main layout" data-menu="2" data-video="3">
      <div class="song-banner layout">
        <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/video.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
        <?php
            include "quote/template/nav.php";
        ?>
        <px-posize
          x="1771fr 66px 83fr"
          y="229px 66px 85px"
          xxl-x="1771fr 60px 83fr"
          xxl-y="229px 60px 85px"
          xl-x="1771fr 55px 83fr"
          xl-y="229px 55px 85px"
          lg-x="1771fr 50px 83fr"
          lg-y="229px 50px 85px"
          ></px-posize>
        
      </section>
</div>

    <?php
        include "quote/template/tag_menu_video.php";
    ?>
        
      <section class="video-video__main layout">
        <div class="video-flex layout5">
          <div class="video-title layout">

          <section class="song-song__main layout">
        <div class="song-flex layout1">
          <div class="song-flex-item">
            <div class="song-title layout">

<div class="title title-group layout">
  <h1 class="title-title-box layout"><pre class="title-title"><span class="tw">軍歌教唱</span>
<span class="en fz36">Song</span>
</pre></h1>
</div>

            </div>
          </div>

        </div>
      </section>
      
          
      <ul class="song_items">
            <li class="song_list">
                <a href="javascript:;">
                    <div class="song_img">
                        <div class="box">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="song_txt">
                        <span class="tw">我有一支槍</span>
                        <span class="en">Song</span>
                    </div>
                </a>
            </li>
            
            <li class="song_list">
                <a href="javascript:;">
                    <div class="song_img">
                        <div class="box">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="song_txt">
                        <span class="tw">我有一支槍</span>
                        <span class="en">Song</span>
                    </div>
                </a>
            </li>
            
            <li class="song_list">
                <a href="javascript:;">
                    <div class="song_img">
                        <div class="box">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="song_txt">
                        <span class="tw">我有一支槍</span>
                        <span class="en">Song</span>
                    </div>
                </a>
            </li>
            
            <li class="song_list">
                <a href="javascript:;">
                    <div class="song_img">
                        <div class="box">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="song_txt">
                        <span class="tw">我有一支槍</span>
                        <span class="en">Song</span>
                    </div>
                </a>
            </li>
            
            <li class="song_list">
                <a href="javascript:;">
                    <div class="song_img">
                        <div class="box">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="song_txt">
                        <span class="tw">我有一支槍</span>
                        <span class="en">Song</span>
                    </div>
                </a>
            </li>
            
            <li class="song_list">
                <a href="javascript:;">
                    <div class="song_img">
                        <div class="box">
                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div class="song_txt">
                        <span class="tw">我有一支槍</span>
                        <span class="en">Song</span>
                    </div>
                </a>
            </li>
          </ul>

          <?php
              include "quote/template/page_list.php";
          ?>

      
    </main>
    <?php
        include "quote/template/footerPage.php";
    ?>
    <script src="dist/js/function.js"></script>
    <script src="dist/js/song.js"></script> 
</body>

</html>