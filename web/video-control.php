<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$id = (!isset($id) || !is_numeric($id)) ? 1 : $id;
if ($id > 4) {
  echo "此文章不存在!";
  exit();
}

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

$title_var =  "防治宣導 | " . $title_var;
include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Video.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Video__list.css" />

</head>

<body class="lang_tw">
  <main class="video video-main layout" data-menu="2" data-video="0">
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
              <pre class="title-title"><span class="tw">防治宣導</span>
<span class="en">Control</span>
</pre>
            </h1>
          </div>

        </div>
        <div class="video-flex1 layout">
          <div class="video-flex-item">
            <a href="video-control.php?id=1" class="video-flex layout <?php echo ($id == 1) ? 'active' : ''; ?>">
              <div style="--src:url(../images/assets/50c0f3cbd6d492073def413ef022f07f.jpg)" class="video-image8 layout icon_1"></div>
              <div style="--src:url(../images/group1.png)" class="video-image8 layout icon_2"></div>
              <div class="video-flex-item1">
                <h1 class="video-big-title-box layout">
                  <pre class="video-big-title"><span class="video-big-title-span0 video_txt tw">毒品防治
</span><span class="video-big-title-span1 video_txt en">Poison</span></pre>
                </h1>
              </div>
            </a>
          </div>
          <div class="video-flex-spacer"></div>
          <div class="video-flex-item">
            <a href="video-control.php?id=2" class="video-flex layout <?php echo ($id == 2) ? 'active' : ''; ?>">
              <div style="--src:url(../images/assets/a4f3dc5cdf23802cc56727191e541963.png)" class="video-icon layout  icon_1"></div>
              <div style="--src:url(../images/group2.png)" class="video-icon layout icon_2"></div>
              <div class="video-flex-item2">
                <h1 class="video-big-title-box layout1">
                  <pre class="video-big-title"><span class="video-big-title1-span0 video_txt tw">性別平等
</span><span class="video-big-title1-span1 video_txt en">Gender Equality</span></pre>
                </h1>
              </div>
            </a>
          </div>
          <div class="video-flex-spacer1"></div>
          <div class="video-flex-item">
            <a href="video-control.php?id=3" class="video-flex layout <?php echo ($id == 3) ? 'active' : ''; ?>">
              <div style="--src:url(../images/assets/5c798ec87c1608cd19f1ef788b7635e1.png)" class="video-icon layout icon_1"></div>
              <div style="--src:url(../images/group3.png)" class="video-icon layout icon_2"></div>
              <div class="video-flex-item3">
                <h1 class="video-big-title-box layout2">
                  <pre class="video-big-title"><span class="video-big-title1-span0 video_txt tw">酒駕防治
</span><span class="video-big-title1-span1 video_txt en">Drunk Driving</span></pre>
                </h1>
              </div>
            </a>
          </div>
          <div class="video-flex-spacer2"></div>
          <div class="video-flex-item">
            <a href="video-control.php?id=4" class="video-flex layout <?php echo ($id == 4) ? 'active' : ''; ?>">
              <div style="--src:url(../images/assets/9d67774baee1852ff0b092e2ff325f5e.png)" class="video-image5 layout icon_1"></div>
              <div style="--src:url(../images/group4.png)" class="video-image5 layout icon_2"></div>
              <h1 class="video-big-title-box layout3">
                <pre class="video-big-title"><span class="video-big-title1-span0 video_txt tw">失序行為
</span><span class="video-big-title1-span1 video_txt en">Illegal</span></pre>
              </h1>
            </a>
          </div>
        </div>


        <div class="video-flex layout4">
          <div class="video-flex2 layout">
            <?php if ($data) {
              foreach ($data as $k => $v) { ?>
                <div class="video-flex-item5">
                  <div class="video-component layout">

                    <a href="<?php echo $v["v_url"]; ?>" target="_blank" rel="nofollow" class="video-list video-list-flex layout song_video">
                      <div class="video-list-flex-item">
                        <px-posize track-style='{"flexGrow":1}' x="0px 736fr 0px" y="0fr minmax(0px, max-content) 0fr" lg-x="0px 736fr 0px" lg-y="0fr minmax(0px, max-content) 0fr">
                          <div class="video-list-group">
                            <px-posize area-style='{":before":{"content":"\" \"","display":"inline-block","height":"100%","verticalAlign":"middle"}}' x="0px 736fr 0px" y="0fr minmax(0px, max-content) 0fr" absolute="true"><img class="video-list-background" src="<?php echo $v["v_img"]; ?>" /></px-posize>
                            <px-posize track-style='{"flexGrow":1}' x="299fr 18.75% 299fr" y="177fr minmax(0px, 138fr) 176fr">
                              <div class="video-list-group1"><img src="dist/images/assets/75328c9ddf5022e079b06edf8a2d4ace.png" alt="" class="video-list-image1 layout" /></div>
                            </px-posize>
                          </div>
                        </px-posize>
                      </div>
                      <div class="video-list-flex-item">
                        <h2 class="video-list-video__txt-box layout">
                          <div class="video-list-video__txt"><span class="tw"><?php echo $v["v_title_1"]; ?></span>
                            <span class="en"><?php echo $v["v_title_2"]; ?></span>
                          </div>
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