<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$id = (!isset($id) || !is_numeric($id)) ? 10 : $id;

//輪播資料
$query = "SELECT p_img FROM [photo]  WHERE a_id = 1 ORDER BY p_order";
$banner_data = sql_data($query, $link);

//分類標題
$query = "SELECT c_id,c_title_1,c_title_2 FROM [a_category] WHERE c_id IN (10,11,12,13)";
$c_data = sql_data($query, $link, 2, "c_id");


$where = "WHERE c_id = $id";
$check = 4; //分頁數量
$page_set = "?p="; //頁碼
//分頁設定開始
$query = "SELECT COUNT(t_id) FROM [travel] $where";
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
$query = "SELECT t_id,t_title_1,t_title_2,t_img1 FROM [travel] $where ORDER BY t_order offset {$start} rows fetch next {$check} rows only";
$data = sql_data($query, $link, 2, "t_id");

$link = null;
$title_var = "出去走走 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Travel.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Tag__menu__travel.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Travel__list.css" />

</head>

<body class="lang_tw">
  <main class="travel travel-main layout" data-menu="6">
    <div class="travel-banner layout">
      <section class="pagebanner pagebanner-banner layout">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php foreach ($banner_data as $k => $v) { ?>
              <div class="swiper-slide">
                <img src="<?php echo $v["p_img"]; ?>">
              </div>
            <?php } ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        </div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <div class="travel-tag__list layout">

      <section class="tag-menu--travel tag-menu--travel-tag__list layout">
        <div class="tag-menu--travel-block1 layout">
          <div class="tag-menu--travel-flex layout">
            <div class="tag-menu--travel-flex-item <?php echo ($id == 10) ? 'active' : ''; ?>">
              <a href="travel.php?id=10" class=" tag-menu--travel-flex1 layout">
                <div style="--src:url(../images/assets/e39073c847e5d903c038da2134776be7.png)" class="tag-menu--travel-group layout hover_img"></div>
                <div style="--src:url(../images/Vector1.png)" class="tag-menu--travel-group layout hover_img_h"></div>
                <h2 class="tag-menu--travel-medium-title-box layout">
                  <pre class="tag-menu--travel-medium-title">
<span class="tw">熱門景點</span>
<span class="en">Popular Attractions</span></pre>
                </h2>
              </a>
            </div>
            <div class="tag-menu--travel-flex-item <?php echo ($id == 11) ? 'active' : ''; ?>">
              <a href="travel.php?id=11" class="tag-menu--travel-flex2 layout">
                <div style="--src:url(../images/assets/0aa24068d7a4f87736d413c4a1174fc4.png)" class="tag-menu--travel-group layout1 hover_img"></div>
                <div style="--src:url(../images/Vector2.png)" class="tag-menu--travel-group layout1 hover_img_h"></div>
                <h2 class="tag-menu--travel-medium-title-box layout1">
                  <pre class="tag-menu--travel-medium-title">
<span class="tw">節慶活動</span>
<span class="en">Festival & Activity</span></pre>
                </h2>
              </a>
            </div>
            <div class="tag-menu--travel-flex-item <?php echo ($id == 12) ? 'active' : ''; ?>">
              <a href="travel.php?id=12" class="tag-menu--travel-flex3 layout">
                <div style="--src:url(../images/assets/43ce14c112bffd8443a30e877e82a310.png)" class="tag-menu--travel-image4 layout hover_img"></div>
                <div style="--src:url(../images/Vector3.png)" class="tag-menu--travel-image4 layout hover_img_h"></div>
                <h2 class="tag-menu--travel-medium-title-box layout2">
                  <pre class="tag-menu--travel-medium-title">
<span class="tw">美食攻略</span>
<span class="en">Food Map</span></pre>
                </h2>
              </a>
            </div>
            <div class="tag-menu--travel-flex-item <?php echo ($id == 13) ? 'active' : ''; ?>">
              <a href="travel.php?id=13" class="tag-menu--travel-flex4 layout">
                <div style="--src:url(../images/assets/b685d2c4039b550a112d820d9aaa3945.png)" class="tag-menu--travel-image3 layout hover_img"></div>
                <div style="--src:url(../images/Vector4.png)" class="tag-menu--travel-image3 layout hover_img_h"></div>
                <h2 class="tag-menu--travel-medium-title-box layout">
                  <pre class="tag-menu--travel-medium-title">
<span class="tw">精選行程</span>
<span class="en">Journey</span></pre>
                </h2>
              </a>
            </div>
          </div>
        </div>
      </section>

    </div>
    <section class="travel-travel__main layout">
      <div class="travel-flex layout1">
        <div class="travel-flex-item">
          <div class="travel-title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw"><?php echo $c_data[$id]["c_title_1"]; ?></span>
<span class="en fz36"><?php echo $c_data[$id]["c_title_2"]; ?></span>
</pre>
              </h1>
            </div>

          </div>
        </div>
        <div class="travel-flex layout">
          <div class="travel-flex1 layout">
            <?php if ($data) {
              foreach ($data as $k => $v) { ?>
                <div class="travel-flex-item1">
                  <div class="travel-component layout">

                    <a href="travel-detail.php?id=<?php echo $k; ?>" class="travel-list travel-list-flex layout">
                      <img src="<?php echo $v["t_img1"]; ?>" alt="" class="travel-list-image7 layout" />
                      <div class="travel-list-flex-item">
                        <h2 class="travel-list-medium-title-box layout">
                          <pre class="travel-list-medium-title"><span class="tw"><?php echo $v["t_title_1"]; ?></span>
<span class="en"><?php echo $v["t_title_2"]; ?></span></pre>
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
  <script src="dist/js/travel.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

</body>

</html>