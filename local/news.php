<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/News.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />

</head>

<body class="lang_tw">
    <main class="new new-main layout" data-menu="1">
        <div id="modalBg">
            <div id="myModal" class="modal">
                <div class="closebtn" id="close">
                    <div class="close"></div>
                </div>
                <ul class="modal-content">
                    <li>
                        <img src="dist/images/1.jpg" alt="">
                    </li>
                    <li>
                        <img src="dist/images/2.jpg" alt="">
                    </li>
                    <li>
                        <img src="dist/images/3.jpg" alt="">
                    </li>
                    <li>
                        <img src="dist/images/4.jpg" alt="">
                    </li>
                </ul>
                <div class="btn_box">
                    <a href="javascript:;" class="btn_prev no-page"></a>
                    <a href="javascript:;" class="btn_next"></a>
                </div>
            </div>
        </div>


      <div class="new-banner layout">
        <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/news.jpg)" class="pagebanner-kv layout"></div>
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

        <section class="new-section2__news__main layout">
        <div class="new-section2__flex layout">
          <div class="new-section2__flex-item">
            <div class="new-section2__title layout">

<div class="title title-group layout">
  <h1 class="title-title-box layout"><pre class="title-title"><span class="tw">96期 忠信報</span>
<span class="en">NO.96 News</span>
</pre></h1>
</div>

            </div>
          </div>
          <div class="new-section2__flex1 layout">
            <a href="javascript:;" class="new-section2__flex-item1 photo__list">
              <img src="dist/images/1.jpg" alt="" class="new-section2__image layout" />
            </a>
            <div class="new-section2__flex-spacer"></div>
            <a href="javascript:;" class="new-section2__flex-item2 photo__list">
              <img src="dist/images/2.jpg" alt="" class="new-section2__image layout" />
            </a>
            <div class="new-section2__flex-spacer"></div>
            <a href="javascript:;" class="new-section2__flex-item3 photo__list">
              <img src="dist/images/3.jpg" alt="" class="new-section2__image layout" />
            </a>
            <div class="new-section2__flex-spacer"></div>
            <a href="javascript:;" class="new-section2__flex-item4 photo__list">
              <img src="dist/images/4.jpg" alt="" class="new-section2__image layout" />
            </a>
          </div>
          <div class="new-section2__flex2 layout">
            <div class="new-section2__flex-item5">
              <div class="new-section2__block1 layout">
                <a href="javascript:;" class="new-section2__block2 layout">
                  <div class="new-section2__buttom layout">&lt; 上一期</div>
                </a>
              </div>
            </div>
            <div class="new-section2__flex-spacer1"></div>
            <div class="new-section2__flex-item6">
              <div class="new-section2__block1 layout">
                <a href="javascript:;" class="new-section2__block2 layout">
                  <div class="new-section2__buttom1 layout">下一期 &gt;</div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?php
        include "quote/template/footerPage.php";
    ?>
    <script src="dist/js/function.js"></script>
    <script src="dist/js/news.js"></script>

    
</body>

</html>