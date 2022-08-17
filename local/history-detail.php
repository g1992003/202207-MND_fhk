<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/History__detail.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" /> 
<link rel="stylesheet" type="text/css" href="dist/css/Prev.css" />

</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
    ?>
    <main class="history history-main layout history-detail" data-menu="0">
      <div class="history-banner layout">
        <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/history.jpg)" class="pagebanner-kv layout"></div>
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
          

        <section class="history-detail-section2__history__detail__main layout">
        <div class="history-detail-section2__flex layout">
          <div class="history-detail-section2__flex-item">
            <div class="history-detail-section2__txt-box layout">
              <pre class="history-detail-section2__txt">106年 </pre>
            </div>
          </div>
          <div class="history-detail-section2__flex-item">
            <div class="history-detail-section2__title layout">

<div class="title title-group layout">
  <h1 class="title-title-box layout"><pre class="title-title"><span class="tw">政戰主任室</span>
<span class="en">Department</span></pre></h1>
</div>

            </div>
          </div>
          
        </div>
      </section>

        <div class="swiper_box">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="dist/images/2.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="dist/images/3.jpg" alt="">
              </div>
              <div class="swiper-slide">
                <img src="dist/images/4.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        </div>

      <div class="container_1">
            <div class="editor_Content">
              <div class="editor_box">
                pcpccppcpcpc
                依國家安全戰略指導 ，編成資通電軍指揮部
                下轄政戰綜合組及文宣新戰組

                In accordance with the guidance of the national security strategy, the headquarters of the Zitong
                Electric Army is organized
                Under the jurisdiction of the comprehensive group of political warfare and the new warfare group of
                cultural propaganda
              </div>
            </div>
          </div>
          <div class="history-detail-section2__flex-item bottom_box">
            <div class="history-detail-section2__prev layout">

              <a href="javascript:history.back();" class="prev prev-prev layout">
                <div class="prev-prev__txt layout">
                  < 回上一頁</div> </a> </div> </div>
    </main>
    <?php
        include "quote/template/footerPage.php";
    ?>
    </script><script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
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