<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$id = (!isset($id) || !is_numeric($id)) ? 16 : $id;

if ($id < 16 || $id > 20) {
  header("location:./");
  exit();
}

if ($id == 16) $videoID = 1;
if ($id >= 17 || $id >= 20) $videoID = $id - 13;

$query = "SELECT * FROM [a_category]";
$c_data = sql_data($query, $link, 2, "c_id");

$where = "WHERE c_id = $id";
$check = 4; //分頁數量
$page_set = "?id=$id&p="; //頁碼
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

$title_var =  $c_data[$id]["c_title_1"] . " | " . $title_var;
include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Video.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Video__list.css" />

</head>

<body class="lang_tw">
  <main class="video video-main layout" data-menu="2" data-video="<?php echo $videoID; ?>">
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
              <pre class="title-title"><span class="tw"><?php echo $c_data[$id]["c_title_1"]; ?></span>
<span class="en"><?php echo $c_data[$id]["c_title_2"]; ?></span>
</pre>
            </h1>
          </div>

        </div>
        <div class="video-flex layout4">
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
                          <pre class="video-list-video__txt"><span class="tw"><?php echo $v["v_title_1"]; ?></span>
<span class="en"><?php echo $v["v_title_2"]; ?></span></pre>
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