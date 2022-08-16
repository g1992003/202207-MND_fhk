 <?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/Photo__detail.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Scroll__menu.css" /> 
<link rel="stylesheet" type="text/css" href="dist/css/S__title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Prev.css" />

</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
    ?>
    <main class="photo-detail photo-detail-main layout" data-menu="5">

      <div id="modalBg">
        <div id="myModal" class="modal">
            <div class="closebtn" id="close">
                <div class="close"></div>
            </div>
            <div class="modal-content">
                <img src="dist/images/military.jpg" alt="">
            </div>
        </div>
      </div>

      <div class="photo-detail-banner layout">
        <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/assets/5edd7f51d618dca1f22902422eed056e.png)" class="pagebanner-kv layout"></div>
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

        <section class="photo-detail-photo__detail__main layout">
        <div class="photo-detail-flex layout3">
          <div class="photo-detail-flex-item">
            <div class="photo-detail-s-title layout">

<div class="s-title s-title-group layout">
  <div class="s-title-s-title-box layout"><pre class="s-title-s-title"><span class="tw">資通電軍指揮部</span>
<span class="en">MILITARY UNIT</span>
</pre></div>
</div>

            </div>
          </div>
          <div class="photo-detail-flex-item">
            <div class="photo-detail-title layout">

<div class="title title-group layout">
  <h1 class="title-title-box layout"><pre class="title-title">109壘球比賽
109 SOFTBALL GAME</pre></h1>
</div>

            </div>
          </div>
          <div class="photo-detail-flex layout2">
            <div class="photo-detail-flex1 layout">
              <div class="photo-detail-flex-item1">
                <div class="photo-detail-flex layout">
                  <a href="javascript:;" class="photo__list">
                    <img
                    src="dist/images/assets/e4f03345eab31d0a8cffcd457371d7eb.png"
                    alt=""
                    class="photo-detail-image layout"
                    />
                  </a>
                  <a href="javascript:;" class="photo__list">
                    <img src="dist/images/assets/42758f6951194c1c1ea85c46db8ca6ba.png" alt="" class="photo-detail-image1 layout" />
                  </a>
                </div>
              </div>
              <div class="photo-detail-flex-spacer"></div>
              <a href="javascript:;" class="photo-detail-flex-item5 photo__list">
                <img src="dist/images/assets/b24cbe3f8175384ba024a2769a25a741.png" alt="" class="photo-detail-image4 layout" />
              </a>
            </div>
            <div class="photo-detail-flex2 layout">
              <a href="javascript:;" class="photo-detail-flex-item3 photo__list">
                <img src="dist/images/assets/5222419990d9f663462db3c4cbbf654f.png" alt="" class="photo-detail-image2 layout" />
              </a>
              <div class="photo-detail-flex-spacer1"></div>
              <a href="javascript:;" class="photo-detail-flex-item4 photo__list">
                <img src="dist/images/assets/7cc3d44ff18afc891abdc2b156c14f71.png" alt="" class="photo-detail-image2 layout" />
              </a>
            </div>
            <div class="photo-detail-flex3 layout">
              <a href="javascript:;" class="photo-detail-flex-item5 photo__list">
                <img src="dist/images/assets/b24cbe3f8175384ba024a2769a25a741.png" alt="" class="photo-detail-image4 layout" />
              </a>
              <div class="photo-detail-flex-spacer2"></div>
              <div class="photo-detail-flex-item6">
                <div class="photo-detail-flex layout1">
                  <a href="javascript:;" class="photo__list">
                    <img
                    src="dist/images/assets/28bc722920cf16b79fa594027895ce8b.png"
                    alt=""
                    class="photo-detail-image layout"
                  />
                  </a>
                  <a href="javascript:;" class="photo__list">
                    <img src="dist/images/assets/231a4b9ebd43c873939cf1483d9ee0bf.png" alt="" class="photo-detail-image layout1" />
                  </a>
                </div>
              </div>
            </div>
          </div>

          <?php
              include "quote/template/page_list.php";
          ?>

          <div class="photo-detail-flex-item">
            <div class="photo-detail-prev layout">

<a href="javascript:history.back();" class="prev prev-prev layout"><div class="prev-prev__txt layout">< 回上一頁</div></a>

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

    
</body>

</html>