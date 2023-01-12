<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
  echo "此文章不存在!";
  exit();
}

//內容
$query = "SELECT * FROM [history] WHERE h_id = $id";
$data = sql_data($query, $link, 1);

//圖片
$query = "SELECT i_id,i_img FROM [image] WHERE h_id = $id";
$img_data = sql_data($query, $link, 2, "i_id");

$link = null;
$title_var = $data["h_title_1"] . " | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/History__detail.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Prev.css" />

</head>

<body class="lang_tw">
  <main class="history history-main layout history-detail" data-menu="0">
    <div class="history-banner layout">
      <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/history.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>


    <section class="history-detail-section2__history__detail__main layout">
      <div class="history-detail-section2__flex layout">
        <div class="history-detail-section2__flex-item">
          <div class="history-detail-section2__txt-box layout">
            <pre class="history-detail-section2__txt"><?php echo $data["h_year"]; ?> </pre>
          </div>
        </div>
        <div class="history-detail-section2__flex-item">
          <div class="history-detail-section2__title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw"><?php echo $data["h_title_1"]; ?></span>
<span class="en"><?php echo $data["h_title_2"]; ?></span></pre>
              </h1>
            </div>

          </div>
        </div>

      </div>
    </section>
    <?php if ($img_data) { ?>
      <div class="swiper_box">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php foreach ($img_data as $k => $v) { ?>
              <div class="swiper-slide">
                <img src="<?php echo $v["i_img"]; ?>">
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
      </div>
    <?php } ?>
    <div class="container_1">
      <div class="editor_Content">
        <div class="editor_box">
          <?php echo html_decode($data["h_text"]); ?>
        </div>
      </div>
    </div>
    <div class="history-detail-section2__flex-item bottom_box">
      <div class="history-detail-section2__prev layout">

        <a href="javascript:history.back();" class="prev prev-prev layout">
          <div class="prev-prev__txt layout">
            < 回上一頁</div>
        </a>
      </div>
    </div>
  </main>
  <?php
  include "quote/template/footerPage.php";
  ?>
  </script>
  <script src="dist/js/swiper-bundle.min.js"></script>
  <script src="dist/js/function.js"></script>

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