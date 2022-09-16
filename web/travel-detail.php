<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
  header("location:./");
  exit();
}
//輪播資料
$query = "SELECT p_img FROM [photo]  WHERE a_id = 1 ORDER BY p_order";
$banner_data = sql_data($query, $link);

//內容
$query = "SELECT * FROM [travel] WHERE t_id = $id";
$data = sql_data($query, $link, 1);

//標籤
$tag_arr = array();
$tag_arr = explode(",", $data["t_tag"]);

//圖片
$img_arr = array();
if ($data["t_img1"]) array_push($img_arr, $data["t_img1"]);
if ($data["t_img2"]) array_push($img_arr, $data["t_img2"]);
if ($data["t_img3"]) array_push($img_arr, $data["t_img3"]);

$c_id = $data["c_id"];

$link = null;
$title_var = $data["t_title_1"] . " | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Travel__detail.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Tag__menu__travel.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Prev.css" />

</head>


<body class="lang_tw">
  <main class="travel-detail travel-detail-main layout" data-menu="6">
    <div class="travel-detail-section1 layout">
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
            <div class="tag-menu--travel-flex-item <?php echo ($c_id == 10) ? 'active' : ''; ?>">
              <a href="javascript:;" class="tag-menu--travel-flex1 layout">
                <div style="--src:url(../images/assets/e39073c847e5d903c038da2134776be7.png)" class="tag-menu--travel-group layout hover_img"></div>
                <div style="--src:url(../images/Vector1.png)" class="tag-menu--travel-group layout hover_img_h"></div>
                <h2 class="tag-menu--travel-medium-title-box layout">
                  <pre class="tag-menu--travel-medium-title">
<span class="tw">熱門景點</span>
<span class="en">Popular Attractions</span></pre>
                </h2>
              </a>
            </div>
            <div class="tag-menu--travel-flex-item <?php echo ($c_id == 11) ? 'active' : ''; ?>">
              <a href="javascript:;" class="tag-menu--travel-flex2 layout">
                <div style="--src:url(../images/assets/0aa24068d7a4f87736d413c4a1174fc4.png)" class="tag-menu--travel-group layout1 hover_img"></div>
                <div style="--src:url(../images/Vector2.png)" class="tag-menu--travel-group layout1 hover_img_h"></div>
                <h2 class="tag-menu--travel-medium-title-box layout1">
                  <pre class="tag-menu--travel-medium-title">
<span class="tw">節慶活動</span>
<span class="en">Festival & Activity</span></pre>
                </h2>
              </a>
            </div>
            <div class="tag-menu--travel-flex-item <?php echo ($c_id == 12) ? 'active' : ''; ?>">
              <a href="javascript:;" class="tag-menu--travel-flex3 layout">
                <div style="--src:url(../images/assets/43ce14c112bffd8443a30e877e82a310.png)" class="tag-menu--travel-image4 layout hover_img"></div>
                <div style="--src:url(../images/Vector3.png)" class="tag-menu--travel-image4 layout hover_img_h"></div>
                <h2 class="tag-menu--travel-medium-title-box layout2">
                  <pre class="tag-menu--travel-medium-title">
<span class="tw">美食攻略</span>
<span class="en">Food Map</span></pre>
                </h2>
              </a>
            </div>
            <div class="tag-menu--travel-flex-item <?php echo ($c_id == 13) ? 'active' : ''; ?>">
              <a href="javascript:;" class="tag-menu--travel-flex4 layout">
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
    <section class="travel-detail-travel__detail__main layout">
      <div class="travel-detail-flex layout">
        <div class="travel-detail-flex-item">
          <div class="travel-detail-title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw"><?php echo $data["t_title_1"]; ?></span>
<span class="en"><?php echo $data["t_title_2"]; ?></span>
</pre>
              </h1>
            </div>

          </div>
        </div>
        <div class="travel-detail-flex1 layout">
          <?php foreach ($tag_arr as $k) { ?>
            <div class="travel-detail-flex-item1">
              <div class="travel-detail-group layout">
                <h3 class="travel-detail-subtitle layout"># <?php echo $k; ?></h3>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="travel-detail-flex2 layout">
          <div class="travel-detail-flex-item3">
            <div class="travel-detail-flex3 layout">
              <div class="travel-detail-flex-item4">
                <div style="--src:url(../images/assets/863cbe5fd2eeee9a38f5e526c267ce22.png)" class="travel-detail-icon layout"></div>
              </div>
              <div class="travel-detail-flex-spacer1"></div>
              <div class="travel-detail-flex-item5">
                <h2 class="travel-detail-medium-title layout"><?php echo $data["t_tel"]; ?></h2>
              </div>
            </div>
          </div>
          <div class="travel-detail-flex-spacer2"></div>
          <div class="travel-detail-flex-item6">
            <div class="travel-detail-flex4 layout">
              <div class="travel-detail-flex-item7">
                <div style="--src:url(../images/assets/15f53fd7fb7248e5849a0ff0a1458a2f.png)" class="travel-detail-image3 layout"></div>
              </div>
              <div class="travel-detail-flex-spacer3"></div>
              <div class="travel-detail-flex-item8">
                <h2 class="travel-detail-medium-title1-box layout">
                  <pre class="travel-detail-medium-title1">
<span class="tw"><?php echo $data["t_url_1"]; ?></span>
<span class="en"><?php echo $data["t_url_2"]; ?></span></pre>
                </h2>
              </div>
            </div>
          </div>
        </div>

        <ul class="img__box">
          <?php foreach ($img_arr as $k => $v) { ?>
            <li <?php echo ($k == 0) ? 'class="active"' : '';  ?>><img src="<?php echo $v; ?>" alt="" class="travel-detail-image layout" /></li>
          <?php } ?>
        </ul>

        <div class="travel-detail-flex5 layout">
          <?php foreach ($img_arr as $k => $v) { ?>
            <a href="javascript:;" class="travel-detail-flex-item9 img_travel <?php echo ($k == 0) ? 'active' : '';  ?>">
              <img src="<?php echo $v; ?>" alt="" class="travel-detail-image1 layout" />
            </a>
          <?php } ?>
        </div>

        <div class="container">
          <div class="editor_Content">
            <div class="editor_box">
              <?php echo html_decode($data["t_text"]); ?>
            </div>
          </div>
        </div>

        <div class="travel-detail-prev layout">

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
  <script src="dist/js/travel.js"></script>

  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 10,
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