<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$id = 15;

$where = "WHERE c_id = $id";
$check = 6; //分頁數量
$page_set = "?p="; //頁碼
//分頁設定開始
$query = "SELECT COUNT(v_id) FROM [video] $where";
if (!isset($p) || !is_numeric($p) || $p < 1) $p = 1;
$result = $link->prepare($query);
$result->execute();
$r = $result->fetchColumn();
$total = $r;
$maxPage = $total > 0 ? ceil($total / $check) : 1;
$p = $p > $maxPage ? 1 : $p;
$start = ($p - 1) * $check;
$end_page = $p + 1 <= $maxPage ? $p + 1 : $maxPage;
$start_page = $end_page - 2 >= 1 ? $end_page - 2 : 1;
if ($end_page - $start_page < 2) $end_page = $start_page + 2 <= $maxPage ? $start_page + 2 : $maxPage;

//資料
$query = "SELECT * FROM [video] $where ORDER BY v_order offset {$start} rows fetch next {$check} rows only";
$data = sql_data($query, $link, 2, "v_id");

$link = null;

$title_var =  "軍歌教唱 | " . $title_var;
include "quote/template/head.php";
?>
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
    
    <?php
        if ($data) {
            foreach ($data as $k => $v) { ?>
                <ul class="musicList" style="display: none">
                    <li data-src="<?php echo $v["v_url"]; ?>"></li>
                </ul>
        <?php  }
    } ?>

    <main class="song song-main layout" data-menu="2" data-video="3">
        <div class="song-banner layout">
            <section class="pagebanner pagebanner-banner layout">
                <div style="--src:url(../images/video.jpg)" class="pagebanner-kv layout"></div>
                <div class="pagebanner-component layout">
                    <?php
                    include "quote/template/nav.php";
                    ?>
                    <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

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
                                        <h1 class="title-title-box layout">
                                            <pre class="title-title"><span class="tw">軍歌教唱</span>
<span class="en fz36">Song</span>
</pre>
                                        </h1>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>


                    <ul class="song_items">
                        <?php if ($data) {
                            foreach ($data as $k => $v) { ?>
                                <li class="song_list" data-src="<?php echo $v["v_url"]; ?>">
                                    <a href="javascript:;">
                                        <div class="song_img">
                                            <div class="box">
                                                <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                            </div>
                                        </div>
                                        <div class="song_txt">
                                            <span class="tw"><?php echo $v["v_title_1"]; ?></span>
                                            <span class="en"><?php echo $v["v_title_2"]; ?></span>
                                        </div>
                                    </a>
                                </li>
                        <?php }
                        } ?>
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
    <script>
        // document.querySelectorAll('.song_list').forEach(function(el) {
        //     el.addEventListener('click', event => {
        //         document.querySelector('.song_music').innerHTML = `<source src="${el.dataset.src}" type="audio/mpeg">`;
        //     });
        // });
    </script>
</body>

</html>