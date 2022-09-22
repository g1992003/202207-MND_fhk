<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$query = "SELECT d_id,d_text FROM [document] WHERE d_id IN(21,22,23)";
$doc_data = sql_data($query, $link, 2, "d_id");

$query = "SELECT TOP 4 h_id,h_title_1,h_title_2,h_year FROM [history] ORDER BY h_order ";
$history_data = sql_data($query, $link, 2, "h_id");

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Index.css">
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />

</head>

<body class="lang_tw">
  <main class="index index-main layout" data-index="true">
    <section style="--src:url(../images/assets/64c06581d4848021b314b4da67807273.png)" class="index-banner__banner layout">

      <div class="index-banner__header layout header nav">
        <?php
        include "quote/template/nav_index.php";
        ?>
        <px-posize x="1108fr 756fr 56px" y="100px minmax(0px, 600fr) 0px" lg-x="1108fr 756fr 56px" lg-y="100px minmax(0px, 600fr) 0px">
          <div class="index-banner__group">
            <div style="--src:url(../images/assets/8561e3c72a3bdf44754f6eb02321bba2.png)" class="index-banner__block2 layout"></div>
            <div class="index-banner__flex layout">
              <h1 class="index-banner__hero-title2 layout">歡迎光臨 &amp; 政戰園地</h1>
              <h2 class="index-banner__hero-title1 layout">Welcome &amp; Political Battlefield</h2>
              <dist class="index-banner__medium-title layout">
                <?php echo $doc_data[21]["d_text"]; ?>
              </dist>
              <dist class="index-banner__subtitle1 layout">
                <?php echo $doc_data[22]["d_text"]; ?>
              </dist>
            </div>
          </div>
        </px-posize>
        <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

    </section>


    <section class="index-history layout">
      <div class="index-flex layout">
        <div class="index-num layout">
          <img src="dist/images/assets/8d8354879abffa70538306334b016ed3.jpg" alt="" class="index-img layout" />
        </div>
        <div class="index-title layout">

          <div class="title title-group layout">
            <h2 class="title-title-box layout">
              <pre class="title-title">
<span class="tw">政戰沿革</span>
<span class="en">FHK History</span>
  </pre>
            </h2>
          </div>

        </div>

        <table class="table">
          <thead>
            <tr>
              <?php
              foreach ($history_data as $k => $v) {
                echo "<th>" . $v["h_year"] . "</th>";
              }
              ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php foreach ($history_data as $k => $v) { ?>
                <td>
                  <a href="history-detail.php?id=<?php echo $k; ?>">
                    <p class="tw"><?php echo $v["h_title_1"]; ?></p>
                    <p class="en"><?php echo $v["h_title_2"]; ?></p>
                  </a>
                </td>
              <?php } ?>
            </tr>
          </tbody>
        </table>

        <img src="dist/images/assets/5fb8f928d5c5eb175ef03201116e9e22.png" alt="" class="index-image1 layout" />
      </div>
    </section>
    <section class="index-index__main layout">
      <div class="index-group layout">
        <div class="index-flex layout1">
          <div class="index-flex1 layout">
            <div class="index-flex-item">
              <div class="index-num layout1">
                <img src="dist/images/assets/8bfdf4281f5c42081fdf892b7fac93e4.jpg" alt="" class="index-image4 layout" />
              </div>
            </div>
            <div class="index-flex-spacer"></div>
            <div class="index-flex-item1">
              <px-posize track-style='{"flexGrow":1}' x="0px 412fr 0px" y="42fr minmax(0px, max-content) 44fr" lg-x="0px 412fr 0px" lg-y="1fr minmax(0px, max-content) 1fr">
                <div class="index-title1">

                  <div class="title title-group layout">
                    <h2 class="title-title-box layout">
                      <pre class="title-title video_flex"><span class="tw">影音集錦</span><span class="video_en en">Video</span></pre>
                    </h2>
                  </div>

                </div>
              </px-posize>
            </div>
          </div>
          <a href="video-society.php" class="index-group1 layout">
            <img src="<?php echo $doc_data[23]["d_text"]; ?>" alt="" class="index-image5 layout" />
          </a>
        </div>
      </div>
    </section>
  </main>
  <?php
  include "quote/template/footer.php";
  ?>
  <script src="dist/js/function.js"></script>


</body>

</html>