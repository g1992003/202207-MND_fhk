<?php include "quote/template/head.php"; ?>
<link rel="stylesheet" href="dist/css/Project.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Scroll__menu.css" />  
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />

</head>

<body class="lang_tw">
    <?php
        include "quote/template/added.php";
    ?>
    <main class="project project-main layout" data-menu="3">
      <div class="project-banner layout">
        <section class="pagebanner pagebanner-banner layout">
        <div style="--src:url(../images/project.jpg)" class="pagebanner-kv layout"></div>
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

        <section class="project-project__main layout">
        <div class="project-flex layout">
          <div class="project-flex-item">
            <div class="project-title layout">

<div class="title title-group layout">
  <h1 class="title-title-box layout"><pre class="title-title"><span class="tw">保防天地</span>
<span class="en">Project</span></pre></h1>
</div>

            </div>
          </div>
          <div class="project-flex1 layout">
            <a href="project-detail.php" class="project-flex-item1 project-m">
              <img src="dist/images/5.jpg" alt="" class="project-image3 layout" />
            </a>
            <a href="project-detail.php" class="project-flex-item1 project-m">
              <img src="dist/images/6.jpg" alt="" class="project-image3 layou" />
            </a>
            <a href="project-detail.php" class="project-flex-item1 project-m">
              <img src="dist/images/7.jpg" alt="" class="project-image3 layou" />
            </a>
            <a href="project-detail.php" class="project-flex-item1 project-m">
              <img src="dist/images/8.jpg" alt="" class="project-image3 layou" />
            </a>
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
    <!-- <script src="dist/js/index.js"></script> -->

    
</body>

</html>