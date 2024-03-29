<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

//資料
$query = "SELECT * FROM [news] WHERE nc_id = 3 ORDER BY n_order";
$data = sql_data($query, $link, 2, "n_id");

//信箱
$query = "SELECT d_id,d_text FROM [document] WHERE d_id IN(24)";
$doc_data = sql_data($query, $link, 2, "d_id");

$link = null;

$title_var =  "心理測驗 | " . $title_var;
include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Psychological.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Psy__box.css" />

</head>

<body class="lang_tw">
  <main class="psychological psychological-main layout" data-menu="4">
    <div class="psychological-banner layout">
      <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/psychological.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <section class="psychological-section2__psy__main layout">
      <div class="psychological-section2__flex layout2">
        <div class="psychological-section2__flex-item">
          <div class="psychological-section2__title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw">心理測驗</span>
<span class="en fz36">Psychological</span>
</pre>
              </h1>
            </div>

          </div>
        </div>
        <div class="psychological-section2__flex layout">
          <div class="psychological-section2__flex1 layout">
            <?php if ($data) {
              foreach ($data as $k => $v) { ?>
                <div class="psychological-section2__flex-item1">
                  <div class="psychological-section2__component layout">

                    <a href="<?php echo $v["n_text"]; ?>" target="_blank" rel="nofollow" class="psy-box psy-box-flex layout">
                      <img src="<?php echo $v["n_img1"]; ?>" alt="" class="psy-box-image layout" />
                      <div class="psy-box-psy-title-box layout">
                        <pre class="psy-box-psy-title">
<?php echo $v["n_title_1"]; ?>
<?php echo $v["n_title_2"]; ?></pre>
                      </div>
                    </a>

                  </div>
                </div>
            <?php }
            } ?>
          </div>
        </div>



        <div class="psychological-section2__flex-item">
          <div class="psychological-section2__group layout1">
            <px-posize x="1fr 99.9% 1fr" y="0fr minmax(0px, 713fr) 0fr" absolute="true">
              <div class="psychological-section2__block1" style="--src:url(../images/assets/0fbeb2100ccec76a2c38cf86cb232ef3.png)"></div>
            </px-posize>
            <div class="psychological-section2__flex layout1">
              <div class="psychological-section2__group layout">
                <img src="dist/images/assets/d466861ac8a3b8f83bdd5d9ac4045a5c.png" alt="" class="psychological-section2__block3 layout" />
              </div>
              <h2 class="psychological-section2__hero-title1-box layout">
                <pre class="psychological-section2__hero-title1">
心輔信箱
Contact</pre>
              </h2>
              <div class="psychological-section2__flex-item">
                <div class="psychological-section2__mail layout"><?php echo $doc_data[24]["d_text"]; ?></div>
              </div>
              <a href="mailto:<?php echo $doc_data[24]["d_text"]; ?>" class="psychological-section2__block2 layout">
                <div class="psychological-section2__subtitle layout">聯絡我們</div>
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


</body>

</html>