<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$btn_arr = array();
$query = "SELECT n_id FROM [news] WHERE nc_id = 1 ORDER BY n_order ";
$stmt = $link->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute();
while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
  foreach ($row as $k) array_push($btn_arr, html_decode($k["n_id"]));
}
//當前ID
$id = (!isset($id) || !is_numeric($id)) ? $btn_arr[0] : $id;
//上一篇&&下一篇
$offset = array_search($id, $btn_arr);
$prev_id = ($offset - 1 < 0) ? "" :  $btn_arr[$offset - 1];
$next_id = ($offset + 1 >= count($btn_arr)) ? "" :  $btn_arr[$offset + 1];

//資料
$query = "SELECT * FROM [news] WHERE n_id = $id";
$data = sql_data($query, $link,  1);

$link = null;

$title_var = $data["n_title_1"] . " | " . $title_var;

include "quote/template/head.php";
?>
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
          <?php if ($data["n_img1"]) { ?>
            <li>
              <img src="<?php echo $data["n_img1"]; ?>">
            </li>
          <?php } ?>
          <?php if ($data["n_img2"]) { ?>
            <li>
              <img src="<?php echo $data["n_img2"]; ?>">
            </li>
          <?php } ?>
          <?php if ($data["n_img3"]) { ?>
            <li>
              <img src="<?php echo $data["n_img3"]; ?>">
            </li>
          <?php } ?>
          <?php if ($data["n_img4"]) { ?>
            <li>
              <img src="<?php echo $data["n_img4"]; ?>">
            </li>
          <?php } ?>
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
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <section class="new-section2__news__main layout">
      <div class="new-section2__flex layout">
        <div class="new-section2__flex-item">
          <div class="new-section2__title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw"><?php echo $data["n_title_1"]; ?></span>
<span class="en"><?php echo $data["n_title_2"]; ?></span>
</pre>
              </h1>
            </div>

          </div>
        </div>
        <div class="new-section2__flex1 layout">
          <?php if ($data["n_img1"]) { ?>
            <a href="javascript:;" class="new-section2__flex-item1 photo__list">
              <img src="<?php echo $data["n_img1"]; ?>" alt="" class="new-section2__image layout" />
            </a>
          <?php } ?>
          <?php if ($data["n_img2"]) { ?>
            <div class="new-section2__flex-spacer"></div>
            <a href="javascript:;" class="new-section2__flex-item2 photo__list">
              <img src="<?php echo $data["n_img2"]; ?>" alt="" class="new-section2__image layout" />
            </a>
          <?php } ?>
          <?php if ($data["n_img3"]) { ?>
            <div class="new-section2__flex-spacer"></div>
            <a href="javascript:;" class="new-section2__flex-item3 photo__list">
              <img src="<?php echo $data["n_img3"]; ?>" alt="" class="new-section2__image layout" />
            </a>
          <?php } ?>
          <?php if ($data["n_img4"]) { ?>
            <div class="new-section2__flex-spacer"></div>
            <a href="javascript:;" class="new-section2__flex-item4 photo__list">
              <img src="<?php echo $data["n_img4"]; ?>" alt="" class="new-section2__image layout" />
            </a>
          <?php } ?>
        </div>
        <div class="new-section2__flex2 layout">
          <?php if ($prev_id) { ?>
            <div class="new-section2__flex-item5">
              <div class="new-section2__block1 layout">
                <a href="news.php?id=<?php echo $prev_id; ?>" class="new-section2__block2 layout">
                  <div class="new-section2__buttom layout">
                    < 下一期</div>
                </a>
              </div>
            </div>
          <?php } ?>
          <div class="new-section2__flex-spacer1"></div>
          <?php if ($next_id) { ?>
            <div class="new-section2__flex-item6">
              <div class="new-section2__block1 layout">
                <a href="news.php?id=<?php echo $next_id; ?>" class="new-section2__block2 layout">
                  <div class="new-section2__buttom1 layout">上一期 ></div>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </main>
  <?php
  include "quote/template/footerPage.php";
  ?>
  <script src="dist/js/function.js"></script>
  <script src="dist/js/news.js"></script>

  <!-- <script>
    document.querySelectorAll('.new-section2__image').forEach(function(el) {
      el.addEventListener('click', event => {
        console.log(event.target.currentSrc)
        document.querySelector('.modal-content').innerHTML = `<img src="${event.target.currentSrc}">`;
      });
    });
  </script> -->
</body>

</html>