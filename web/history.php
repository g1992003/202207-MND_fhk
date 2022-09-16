<?php
include 'dominator/system/ready.mak';
include 'quote/include_data.php';

$query = "SELECT h_id,h_title_1,h_title_2,h_year FROM [history] ORDER BY h_order";
$data = sql_data($query, $link, 2, "h_id");

$link = null;

$title_var = "政戰沿革 | " . $title_var;

include "quote/template/head.php";
?>
<link rel="stylesheet" href="dist/css/History.css">
<link rel="stylesheet" type="text/css" href="dist/css/Pagebanner.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Scroll__menu.css" />
<link rel="stylesheet" type="text/css" href="dist/css/Title.css" />

</head>

<body class="lang_tw">
    <main class="history history-main layout" data-menu="0">
        <div class="history-banner layout">
            <section class="pagebanner pagebanner-banner layout">
                <div style="--src:url(../images/history.jpg)" class="pagebanner-kv layout"></div>
                <div class="pagebanner-component layout">
                    <?php
                    include "quote/template/nav.php";
                    ?>
                    <px-posize x="1771fr 66px 83fr" y="229px 66px 85px" xxl-x="1771fr 60px 83fr" xxl-y="229px 60px 85px" xl-x="1771fr 55px 83fr" xl-y="229px 55px 85px" lg-x="1771fr 50px 83fr" lg-y="229px 50px 85px"></px-posize>

            </section>
        </div>

        <div class="history-main-item">
            <!-- ======= section2 ======= -->
            <section class="history-section2__history__main layout">
                <div class="history-section2__title layout">

                    <div class="title title-group layout">
                        <h1 class="title-title-box layout">
                            <pre class="title-title"><span class="tw">政戰沿革</span>
<span class="en">FHK History</span></pre>
                        </h1>
                    </div>

                </div>
                <div class="history_box">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($data as $k => $v) { ?>
                                <div class="swiper-slide">
                                    <div class="s_circle start">
                                        <a href="history-detail.php?id=<?php echo $k; ?>">
                                            <div class="year"><?php echo $v["h_year"]; ?></div>
                                            <div class="line"></div>
                                            <div class="title_name">
                                                <p class="tw"><?php echo $v["h_title_1"]; ?></p>
                                                <p class="en"><?php echo $v["h_title_2"]; ?></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </section>

            <!-- ======= End section2 ======= -->

        </div>
    </main>
    <?php
    include "quote/template/footerPage.php";
    ?>
    <script src="dist/js/function.js"></script>
    <script src="dist/js/history.js"></script>


</body>

</html>