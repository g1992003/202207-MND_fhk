<?php
include '../system/ready.mak';

$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$id = (int)$id;

if (!isset($id) || !is_numeric($id)) {
	header("location:./");
	exit();
} else {
	$sql = "SELECT nc_id FROM [news] WHERE [n_id] = :id";
	$stmt = $link->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_NUM);
	$parents_id = html_decode($row[0]);
	$page_name = "news.php?id=" . $parents_id;
}
include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/colorpicker.css" />
<link rel="stylesheet" href="../css/datepicker.css" />
<link rel="stylesheet" href="../css/icheck/flat/blue.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="stylesheet" href="../css/unicorn.css" />
<link rel="stylesheet" href="../css/file.css" />
<link rel="stylesheet" href="../css/cropper.min.css">
<!--[if lt IE 9]>
		<script type="text/javascript" src="../js/respond.min.js"></script>
		<![endif]-->
</head>

<body data-color="grey" class="flat">
	<div id="wrapper">
		<?php
		include '../quote/header.php';
		include '../quote/sidebar.php';

		$title = "";
		$db_name = "news";
		$id_name = "n_id";
		$title_name_1 = "n_title_1";
		$title_name_2 = "n_title_2";
		$text_name = "n_text";
		$img1_name = "n_img1";
		$img2_name = "n_img2";
		$img3_name = "n_img3";
		$img4_name = "n_img4";
		$order_name = "n_order";
		$m_id_name = "nc_id";

		//資訊
		$query = "SELECT * FROM [$db_name] WHERE $id_name = '$id'";
		$data = sql_data($query, $link, 1);

		$link = null;

		// 1、型態：input、date、textarea、img、file、select
		// 2、ALL：標題
		// 3、ALL：欄位名
		// 4、input、date、textarea：描述，可不填	 / 	img、file：共用id，請編流水號 	/ 	select：下拉式選單資料陣列
		// 5、img：寬度 	/ 	textarea：HTML編輯器開關，0 or 1 	/ 	select：陣列如為二維，請加第二維key值	 / 	input：限數字值為1
		// 6、img：高度 	/ 	textarea：無HTML編輯器時，為textarea行數

		switch ($parents_id) {
			case 1:
				$title = "忠信報管理";
				$title_current = "忠信報";
				$group_array = array(
					array("input", "標題《中文》", $title_name_1, "", "", ""),
					array("input", "標題《英文》", $title_name_2, "", "", ""),
					array("input", "圖片《一》", $img1_name, "", "", ""),
					array("input", "圖片《二》", $img2_name,  "", "", ""),
					array("input", "圖片《三》", $img3_name,  "", "", ""),
					array("input", "圖片《四》", $img4_name,  "", "", ""),
				);
				$img_size = "1280*1812";
				break;
			case 2:
				$title = "保防天地管理";
				$title_current = "保防天地";
				$group_array = array(
					array("input", "標題《中文》", $title_name_1, "", "", ""),
					array("input", "標題《英文》", $title_name_2, "", "", ""),
					array("textarea", "內容", $text_name, "", "1", ""),
					array("input", "圖片", $img1_name, "", "", ""),
				);
				$img_size = "408*572";
				break;
			case 3:
				$title = "心理測驗管理";
				$title_current = "心理測驗";
				$group_array = array(
					array("input", "標題《中文》", $title_name_1, "", "", ""),
					array("input", "標題《英文》", $title_name_2, "", "", ""),
					array("input", "連結", $text_name, "", "", ""),
					array("input", "圖片", $img1_name, "", "", ""),
				);
				$img_size = "520*348";
				break;
		}
		$group_array = g_array($group_array, $data);
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $cms_lang[23][$language]; ?> <?php echo $title_current; ?></h1>
			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<a href="<?php echo $db_name; ?>.php?id=<?php echo $parents_id; ?>"><?php echo $title; ?></a>
				<a class="current"><?php echo $cms_lang[23][$language]; ?> <?php echo $title_current; ?></a>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-align-justify"></i>
								</span>
								<h5><?php echo $cms_lang[23][$language]; ?> <?php echo $title_current; ?></h5>
							</div>
							<div class="widget-content nopadding">
								<form action="../control/doupdate.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=<?php echo $id; ?>" method="post" class="form-horizontal" id="form_update" name="form_update" enctype="multipart/form-data">
									<?php foreach ($group_array as $v)	group($v[0], $v[1], $v[2], $v[3], $v[4], $v[5], $v[6]); ?>
									<div id="elenode"></div>
									<div class="form-actions">
										<button type="button" class="btn btn-primary btn-sm" onclick="doupdate();"><?php echo $cms_lang[23][$language]; ?></button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include '../quote/footer.php'; ?>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.custom.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-colorpicker.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/jquery.icheck.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/unicorn.js"></script>
	<script src="../js/unicorn.form_common.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="../js/window_load.js"></script>
	<script src="../js/cropper.min.js"></script>
	<script type="text/javascript">
		const nameElement1 = document.getElementsByName('n_img1');
		const nameElement2 = document.getElementsByName('n_img2');
		const nameElement3 = document.getElementsByName('n_img3');
		const nameElement4 = document.getElementsByName('n_img4');

		if (nameElement1[0]) nameElement1[0].addEventListener("change", inputchange);
		if (nameElement2[0]) nameElement2[0].addEventListener("change", inputchange);
		if (nameElement3[0]) nameElement3[0].addEventListener("change", inputchange);
		if (nameElement4[0]) nameElement4[0].addEventListener("change", inputchange);
		inputchange()

		function inputchange() {
			const el = document.getElementById('elenode');
			el.innerHTML = "";
			let temp = `<div class='form-group'>
							<label class='col-sm-3 col-md-3 col-lg-2 control-label'>圖片顯示</label>
							<div class='col-sm-9 col-md-9 col-lg-10'><div style='color:red;font-weight:blod;'>建議尺寸：<?php echo $img_size; ?></div>`
			if (nameElement1[0]) temp += `<img src='${nameElement1[0].value}' style="max-with:400px;height:400px">`
			if (nameElement2[0]) temp += `<img src='${nameElement2[0].value}' style="max-with:400px;height:400px">`
			if (nameElement3[0]) temp += `<img src='${nameElement3[0].value}' style="max-with:400px;height:400px">`
			if (nameElement4[0]) temp += `<img src='${nameElement4[0].value}' style="max-with:400px;height:400px">`
			temp += `</div></div>`
			el.innerHTML = temp;
		}

		function doupdate() {
			$("#form_update").submit();
		};
	</script>
</body>

</html>