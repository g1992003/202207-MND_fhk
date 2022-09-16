<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$where = "WHERE nc_id = 2";
$check = 4; //分頁數量
$page_set = "?p="; //頁碼
//分頁設定開始
$query = "SELECT COUNT(n_id) FROM [news] $where";
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

//資料
$query = "SELECT * FROM [news] $where ORDER BY n_order offset {$start} rows fetch next {$check} rows only";
$data = sql_data($query, $link, 2, "n_id");

$link = null;

$title_var =  "保防天地 | " . $title_var;
include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Project.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />

</head>

<body class="lang_tw">
  <main class="project project-main layout" data-menu="3">
    <div class="project-banner layout">
      <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/project.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <section class="project-project__main layout">
      <div class="project-flex layout">
        <div class="project-flex-item">
          <div class="project-title layout">

            <div class="title title-group layout">
              <h1 class="title-title-box layout">
                <pre class="title-title"><span class="tw">保防天地</span>
<span class="en">Project</span></pre>
              </h1>
            </div>

          </div>
        </div>
        <div class="project-flex1 layout">
          <?php if ($data) {
            foreach ($data as $k => $v) { ?>
              <a href="project-detail.php?id=<?php echo $k; ?>" class="project-flex-item1 project-m">
                <img src="<?php echo $v["n_img1"]; ?>" class="project-image3 layout" />
              </a>
          <?php }
          } ?>
        </div>

        <?php
        include "quote/template/page_list.php";
        ?>

      </div>
    </section>
  </main>
  <?php
  include "quote/template/footerPage.php";
  ?>
  <script src="dist/js/function.js"></script>


</body>

</html>