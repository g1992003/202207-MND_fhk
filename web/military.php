<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$link = null;
$title_var = "相片剪影 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Military.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />

</head>

<body class="lang_tw">
  <main class="military military-main layout" data-menu="5">
    <div class="military-banner layout">
      <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/military.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <section class="military-section2__military__main layout">
      <div class="military-section2__flex layout4">
        <div class="military-section2__flex-item">
          <div class="military-section2__title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw">相片剪影</span>
<span class="en">PHOTO</span>
</pre>
              </h1>
            </div>

          </div>
        </div>

      </div>
    </section>
    <div class="military-2-photoList layout">
      <div class="military-2-flex layout">
        <a href="photo.php?id=5" class="military-2-flex-item">
          <div class="military-2-flex1 layout">
            <div style="--src:url(../images/assets/f86082eaaa62f22fd78ce73e87f643c2.png)" class="military-2-image5 layout"></div>
            <h3 class="military-2-subtitle1-box layout">
              <pre class="military-2-subtitle1"><span class="military-2-subtitle1-span0">資通電軍指揮部
</span><span class="military-2-subtitle1-span1">Information Communications
and Electronic Force Command</span></pre>
            </h3>
          </div>
        </a>
        <div class="military-2-flex-spacer"></div>
        <a href="photo.php?id=6" class="military-2-flex-item1">
          <div class="military-2-flex2 layout">
            <div style="--src:url(../images/assets/fa48ba8eac2e0784fa2a84ece13426cc.png)" class="military-2-image2 layout"></div>
            <h3 class="military-2-subtitle-box layout">
              <pre class="military-2-subtitle"><span class="military-2-subtitle-span0">資訊通信聯隊
</span><span class="military-2-subtitle-span1">Information Communication
Electronic Force Information
Communication Wing</span></pre>
            </h3>
          </div>
        </a>
        <div class="military-2-flex-spacer"></div>
        <a href="photo.php?id=7" class="military-2-flex-item2">
          <div class="military-2-flex3 layout">
            <div style="--src:url(../images/assets/5f936c122610ada2245295909acaf2c2.png)" class="military-2-image1 layout"></div>
            <h3 class="military-2-subtitle-box layout1">
              <pre class="military-2-subtitle"><span class="military-2-subtitle2-span0">網路戰聯隊
</span><span class="military-2-subtitle2-span1">Information Communications
and Electronic Force
Command Cyber Warfare Wing</span></pre>
            </h3>
          </div>
        </a>
        <div class="military-2-flex-spacer1"></div>
        <a href="photo.php?id=8" class="military-2-flex-item3">
          <div class="military-2-flex4 layout">
            <div style="--src:url(../images/assets/7c8adfd9d3c944be950e1a1544da5991.png)" class="military-2-image3 layout"></div>
            <h3 class="military-2-subtitle-box layout2">
              <pre class="military-2-subtitle"><span class="military-2-subtitle2-span0">電子作戰中心
</span><span class="military-2-subtitle2-span1">Electronic Warfare
Operation Center</span></pre>
            </h3>
          </div>
        </a>
        <div class="military-2-flex-spacer"></div>
        <a href="photo.php?id=9" class="military-2-flex-item4">
          <div class="military-2-flex5 layout">
            <div style="--src:url(../images/assets/a36591a14300619da497273ae5a50218.png)" class="military-2-image4 layout"></div>
            <h3 class="military-2-subtitle-box layout3">
              <pre class="military-2-subtitle"><span class="military-2-subtitle2-span0">訓測暨準則發展中心
</span><span class="military-2-subtitle2-span1">Information Communications and
Electronic Training Doctrine
Development Center</span></pre>
            </h3>
          </div>
        </a>
      </div>
    </div>
  </main>
  <?php
  include "quote/template/footerPage.php";
  ?>
  <script src="dist/js/function.js"></script>


</body>

</html>