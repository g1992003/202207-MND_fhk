<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
  echo "此文章不存在!";
  exit();
}

$where = "WHERE a_id = $id";
$check = 8; //分頁數量
$page_set = "?id=$id&p="; //頁碼
//分頁設定開始
$query = "SELECT COUNT(p_id) FROM [photo] $where";
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

//標題
$query = "SELECT a_title_1,a_title_2,c_id FROM [album] $where";
$title_data = sql_data($query, $link, 1);
$c_id = $title_data["c_id"];

//單位相簿
$query = "SELECT c_title_1,c_title_2 FROM [a_category] WHERE c_id = $c_id";
$c_data = sql_data($query, $link, 1);

//內容
$query = "SELECT p_img FROM [photo]  WHERE a_id = $id ORDER BY p_order offset {$start} rows fetch next {$check} rows only";
$data = sql_data($query, $link);

$link = null;
$title_var = $title_data["a_title_1"] . " | " . $title_var;


include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Photo__detail.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/S__title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Prev.css" />

</head>

<body class="lang_tw">
  <main class="photo-detail photo-detail-main layout" data-menu="5">

    <div class="photo-detail-banner layout">
      <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/military.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <section class="photo-detail-photo__detail__main layout">
      <div class="photo-detail-flex layout3">
        <div class="photo-detail-flex-item">
          <div class="photo-detail-s-title layout">

            <div class="s-title s-title-group layout">
              <div class="s-title-s-title-box layout">
                <pre class="s-title-s-title"><span class="tw"><?php echo $c_data["c_title_1"]; ?></span>
<span class="en"><?php echo $c_data["c_title_2"]; ?></span>
</pre>
              </div>
            </div>

          </div>
        </div>
        <div class="photo-detail-flex-item">
          <div class="photo-detail-title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw"><?php echo $title_data["a_title_1"]; ?></span>
<span class="en fz36"><?php echo $title_data["a_title_2"]; ?></span></pre>
              </h1>
            </div>

          </div>
        </div>

        <div class="swiper_box_photo">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="d-f">
                  <ul class="ud d-fc right mr-10">
                    <li>
                      <?php if (isset($data[1]["p_img"])) {
                        echo '<a href="' . $data[1]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[1]["p_img"] . '" /></a>';
                      } ?>
                    </li>
                    <li>
                      <?php if (isset($data[2]["p_img"])) {
                        echo '<a href="' . $data[2]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[2]["p_img"] . '" /></a>';
                      } ?>
                    </li>
                  </ul>
                  <ul class="f_1">
                    <li>
                      <?php if (isset($data[3]["p_img"])) {
                        echo '<a href="' . $data[3]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[3]["p_img"] . '" /></a>';
                      } ?>
                    </li>
                  </ul>
                </div>
                <ul class="d-f">
                  <li class="mr-10">
                    <?php if (isset($data[4]["p_img"])) {
                      echo '<a href="' . $data[4]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[4]["p_img"] . '" /></a>';
                    } ?>
                  </li>
                  <li>
                    <?php if (isset($data[5]["p_img"])) {
                      echo '<a href="' . $data[5]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[5]["p_img"] . '" /></a>';
                    } ?>
                  </li>
                </ul>
                <div class="d-f">
                  <ul class="mr-10 f_1">
                    <li>
                      <?php if (isset($data[6]["p_img"])) {
                        echo '<a href="' . $data[6]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[6]["p_img"] . '" /></a>';
                      } ?>
                    </li>
                  </ul>
                  <ul class="ud d-fc left">
                    <li>
                      <?php if (isset($data[7]["p_img"])) {
                        echo '<a href="' . $data[7]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[7]["p_img"] . '" /></a>';
                      } ?>
                    </li>
                    <li>
                      <?php if (isset($data[8]["p_img"])) {
                        echo '<a href="' . $data[8]["p_img"] . '" data-rel="lightcase:my-slideshow"><img src="' . $data[8]["p_img"] . '" /></a>';
                      } ?>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        include "quote/template/page_list.php";
        ?>
        <div class="photo-detail-flex-item">
          <div class="photo-detail-prev layout">

            <a href="javascript:history.back();" class="prev prev-prev layout">
              <div class="prev-prev__txt layout">
                < 回上一頁</div>
            </a>

          </div>
        </div>
      </div>
    </section>
  </main>
  <?php
  include "quote/template/footerPage.php";
  ?>
  <script src="dist/js/function.js"></script>
  <script src="dist/js/photo.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      on: {
        slideChange: function() {
          $('.page dd').removeClass('active')
          $('.page dd').eq(swiper.realIndex).addClass('active')
          index_page(swiper.realIndex)
          num = swiper.realIndex
        },
      },
    });

    $('.page dd').on('click', function() {
      let index = $(this).index() - 2;
      $('.page dd').removeClass('active')
      $('.page dd').eq(index).addClass('active')
      swiper.slideTo(index)
      index_page(index)
    });
    $('.ltbn_up').on('click', function() {
      swiper.slideTo(0)
      index_page(0)
    });
    $('.rtbn_up').on('click', function() {
      swiper.slideTo($('.page dd').length - 1)
      index_page($('.page dd').length - 1)
    });

    let num = 0
    $('.ltbn a').on('click', function() {
      if (num == 0) {
        num = 0
      } else {
        num = num - 1
      }
      $('.page dd').removeClass('active')
      $('.page dd').eq(num).addClass('active')
      swiper.slideTo(num)
      index_page(num)
    });
    $('.rtbn a').on('click', function() {
      if (num == $('.page dd').length - 1) {
        num = $('.page dd').length - 1
      } else {
        num = num + 1
      }
      $('.page dd').removeClass('active')
      $('.page dd').eq(num).addClass('active')
      swiper.slideTo(num)
      index_page(num)
    });


    function index_page(e) {
      if (e == 0) {
        $('.ltbn_up').addClass('nopage')
        $('.ltbn').addClass('nopage')
        $('.rtbn_up').removeClass('nopage')
        $('.rtbn').removeClass('nopage')
      } else if (e == $('.page dd').length - 1) {
        $('.rtbn_up').addClass('nopage')
        $('.rtbn').addClass('nopage')
        $('.ltbn_up').removeClass('nopage')
        $('.ltbn').removeClass('nopage')
      } else {
        $('.ltbn_up').removeClass('nopage')
        $('.ltbn').removeClass('nopage')
        $('.rtbn_up').removeClass('nopage')
        $('.rtbn').removeClass('nopage')
      }
    }

    $("a[data-rel^=lightcase]").lightcase({
      onStart: {
        function() {
          $(".lightcase-icon-close").appendTo("#lightcase-case");
          $("#lightcase-nav").appendTo("#lightcase-case");
        }
      },
    });
  </script>

</body>

</html>