<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

if (!isset($id) || !is_numeric($id)) {
  echo "此文章不存在!";
  exit();
}

//內容
$query = "SELECT * FROM [news] WHERE n_id = $id";
$data = sql_data($query, $link, 1);

if ($data["nc_id"] != 2) {
  echo "此文章不存在!";
  exit();
}

$link = null;
$title_var = $data["n_title_1"] . " | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/Project__detail.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/S__title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Prev.css" />

</head>

<body class="lang_tw">
  <main class="project-detail project-detail-main layout" data-menu="3">
    <div class="project-detail-section1 layout">
      <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/project.jpg)" class="pagebanner-kv layout"></div>
        <div class="pagebanner-component layout">
          <?php
          include "quote/template/nav.php";
          ?>
          <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

      </section>
    </div>

    <section class="project-detail-project__detail__main layout">
      <div class="project-detail-flex layout">
        <div class="project-detail-flex-item">
          <div class="project-detail-s-title layout">

            <div class="s-title s-title-group layout">
              <div class="s-title-s-title-box layout">
                <pre class="s-title-s-title"><span class="tw">保防天地</span>
<span class="en">Project</span>
</pre>
              </div>
            </div>

          </div>
        </div>
        <div class="project-detail-title layout">

          <div class="title title-group layout">
            <h1 class="title-title-box layout">
              <pre class="title-title"><span class="tw"><?php echo $data["n_title_1"]; ?></span>
<span class="en"><?php echo $data["n_title_2"]; ?></span>
</pre>
            </h1>
          </div>

        </div>

        <div class="container">
          <div class="editor_Content">
            <div class="editor_box">
              <?php echo html_decode($data["n_text"]); ?>
            </div>
          </div>
        </div>

        <div class="project-detail-prev layout">

          <a href="javascript:history.back();" class="prev prev-prev layout">
            <div class="prev-prev__txt layout">
              < 回上一頁</div>
          </a>

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