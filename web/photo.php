<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
  header("location:./military.php");
  exit();
}

$where = "WHERE c_id = $id";
$check = 6; //分頁數量
$page_set = "?id=$id&p="; //頁碼
//分頁設定開始
$query = "SELECT COUNT(a_id) FROM [album] $where";
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


//內容
$query = "SELECT * FROM [album] $where ORDER BY a_order offset {$start} rows fetch next {$check} rows only";
$data = sql_data($query, $link, 2, "a_id");

//預設第一張圖
$img_data = array();
foreach ($data as $k => $v) {
  $query = "SELECT TOP 1 p_img FROM [photo] WHERE a_id = $k ORDER BY p_order";
  $stmt = $link->prepare($query);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  array_push($img_data, $row["p_img"]);
}

$link = null;
$title_var = "資通電軍指揮部 | 相片剪影 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Photo.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/S__title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Photo__list.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Prev.css" />

</head>

<body class="lang_tw">
  <main class="photo photo-main layout" data-menu="5">
    <div class="photo-banner layout">
      <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/military.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <section class="photo-photo__main layout">
      <div class="photo-flex layout1">
        <div class="photo-flex-item">
          <div class="photo-s-title layout">

            <div class="s-title s-title-group layout">
              <div class="s-title-s-title-box layout">
                <pre class="s-title-s-title"><span class="tw">相片剪影</span>
<span class="en">PHOTO</span></pre>
              </div>
            </div>

          </div>
        </div>
        <div class="photo-flex-item">
          <div class="photo-title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title">
<span class="tw">資通電軍指揮部</span>
<span class="en">Information Communications
and Electronic Force Command</span></pre>
              </h1>
            </div>

          </div>
        </div>
        <div class="photo-flex layout">
          <div class="photo-flex1 layout">
            <?php if ($data) {
              $i = 0;
              foreach ($data as $k => $v) { ?>
                <div class="photo-flex-item1">
                  <div class="photo-component layout">
                    <a href="photo-detail.php?id=<?php echo $k; ?>" class="photo-list photo-list-flex layout">
                      <img src="<?php echo $img_data[$i]; ?>" alt="" class="photo-list-image layout" />
                      <div class="photo-list-flex-item">
                        <h2 class="photo-list-medium-title-box layout">
                          <div class="photo-list-medium-title">
                          <p><?php echo $v["a_title_1"]; ?></p>
                          <p><?php echo $v["a_title_2"]; ?></p></div>
                        </h2>
                      </div>
                    </a>

                  </div>
                </div>
            <?php $i++;
              }
            } ?>
          </div>

          <?php
          include "quote/template/page_list.php";
          ?>

          <div class="photo-prev layout">

            <a href="javascript:history.back();" class="prev prev-prev layout">
              <div class="prev-prev__txt layout">
                < 回上一頁</div>
            </a>

          </div>
        </div>
    </section>
  </main>
  <?php
  include "quote/template/footerPage.php";
  ?>
  <script src="dist/js/function.js"></script>


</body>

</html>