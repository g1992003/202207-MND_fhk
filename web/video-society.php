<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$query = "SELECT * FROM [a_category] WHERE c_id > 30 ORDER BY c_order";
$c_data = sql_data($query, $link, 2, "c_id");
$first_data = reset($c_data);

$id = (!isset($id) || !is_numeric($id)) ? $first_data["c_id"] : $id;
if ($id <= 30) {
    header("location:./");
    exit();
}

//年份
if (!isset($year) || !is_numeric($year)) {
    $year = '';
    $where = "WHERE c_id = $id";
    $page_set = "?id=$id&p="; //頁碼
} else {
    $where = "WHERE c_id = $id AND v_text LIKE '$year'";
    $page_set = "?id=$id&year=$year&p="; //頁碼
}
$query = "SELECT DISTINCT CONVERT (VARCHAR(8000), v_text) AS v_year FROM [video] WHERE c_id = $id";
$data = sql_data($query, $link);
$year_data = array();
foreach ($data as $k => $v) {
    array_push($year_data, $v["v_year"]);
}
sort($year_data);

//分頁設定開始
$check = 4; //分頁數量
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

$title_var =  "活動紀實 | " . $title_var;
include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Video.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Video__list.css" />

</head>

<body class="lang_tw">
    <main class="video video-main layout" data-menu="2" data-video="2">
        <div class="video-banner layout">
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

                    <div class="title title-group layout">
                        <h1 class="title-title-box layout">
                            <pre class="title-title"><span class="tw">活動紀實</span>
<span class="en">Society</span>
</pre>
                        </h1>
                    </div>

                </div>

                <div id="top-menu-ul" class="top-menu-ul">
                    <div class="item_Menu">
                        <div class="item_menu_Box">
                            <ul class="item_menu_list slides">
                                <?php foreach ($c_data as $k => $v) { ?>
                                    <li <?php echo $k == $id ? 'class="active"' : ''; ?>>
                                        <a href="video-society.php?id=<?php echo $k; ?>">
                                            <div>
                                                <p class="tw"><?php echo $v["c_title_1"]; ?></p>
                                                <p class="en"><?php echo $v["c_title_2"]; ?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="flex-direction-nav">
                            <a href="javascript:;" class="lbtn arrow flex-prev">
                                <div></div>
                            </a>
                            <a href="javascript:;" class="rbtn arrow flex-next">
                                <div></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="top-menu-ul-1" class="top-menu-ul">
                    <div class="item_Menu">
                        <div class="item_menu_Box">
                            <ul class="item_menu_list slides">
                                <?php foreach ($year_data as $k) { ?>
                                    <li <?php echo $year == $k ? 'class="active"' : ''; ?>>
                                        <a href="<?php echo '?id=' . $id . '&year=' . $k . '&p=' . $p; ?>">
                                            <div>
                                                <?php echo $k; ?>
                                            </div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="flex-direction-nav">
                            <a href="javascript:;" class="lbtn arrow flex-prev">
                                <div></div>
                            </a>
                            <a href="javascript:;" class="rbtn arrow flex-next">
                                <div></div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="video-flex layout4 mt75">
                    <div class="video-flex2 layout">
                        <?php if ($data) {
                            foreach ($data as $k => $v) { ?>
                                <div class="video-flex-item5">
                                    <div class="video-component layout">

                                        <a href="<?php echo $v["v_url"]; ?>" target="_blank" class="video-list video-list-flex layout song_video">
                                            <div class="video-list-flex-item">
                                                <px-posize track-style='{"flexGrow":1}' x="0px 736fr 0px" y="0fr minmax(0px, max-content) 0fr" lg-x="0px 736fr 0px" lg-y="0fr minmax(0px, max-content) 0fr">
                                                    <div class="video-list-group">
                                                        <px-posize area-style='{":before":{"content":"\" \"","display":"inline-block","height":"100%","verticalAlign":"middle"}}' x="0px 736fr 0px" y="0fr minmax(0px, max-content) 0fr" absolute="true"><img class="video-list-background" src="<?php echo $v["v_img"]; ?>" alt="alt text" /></px-posize>
                                                        <px-posize track-style='{"flexGrow":1}' x="299fr 18.75% 299fr" y="177fr minmax(0px, 138fr) 176fr">
                                                            <div class="video-list-group1"><img src="dist/images/assets/75328c9ddf5022e079b06edf8a2d4ace.png" alt="" class="video-list-image1 layout" /></div>
                                                        </px-posize>
                                                    </div>
                                                </px-posize>
                                            </div>
                                            <div class="video-list-flex-item">
                                                <h2 class="video-list-video__txt-box layout">
                                                    <div class="video-list-video__txt"><span class="tw"><?php echo $v["v_title_1"]; ?></span>
<span class="en"><?php echo $v["v_title_2"]; ?></span></div>
                                                </h2>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>

                <?php
                include "quote/template/page_list.php";
                ?>

            </div>
        </section>
    </main>
    <?php
    include "quote/template/footerPage.php";
    ?>
    <script src="dist/js/function.js"></script>
    <script src="dist/js/song.js"></script>


</body>

</html>