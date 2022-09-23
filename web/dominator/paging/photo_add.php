<?php
include '../system/ready.mak';

$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$id = (int)$id;

if (!isset($id) || !is_numeric($id)) {
	header("location:./");
	exit();
} else {
	$page_name = ($id == 1) ? "photo.php?id=1" : "category.php?p=album";

	$sql = "SELECT c_title_1, [album].c_id,a_title_1,a_id FROM [album] INNER JOIN [a_category] ON [a_category].c_id = [album].c_id WHERE a_id = :id";
	$stmt = $link->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_NUM);
	$parents_id = html_decode($row[1]);
	$parents2_id = html_decode($row[3]);
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

		if ($id == 1) {
			$title = "輪播圖片管理";
			$title2 = "輪播圖片管理";
			$title_current = "圖片";
			$img_size = "1904*794";
		} else {
			$title = html_decode("分類《" . $row[0] . "》相簿管理");
			$title2 = html_decode("《" . $row[2] . "》相片管理");
			$title_current = "相片";
			$img_size = "920*620";
		}
		$db_name = "photo";
		$id_name = "p_id";
		$img_name = "p_img";
		$order_name = "p_order";
		$m_id_name = "a_id";


		$link = null;

		// 1、型態：input、date、textarea、img、file、select
		// 2、ALL：標題
		// 3、ALL：欄位名
		// 4、input、date、textarea：描述，可不填	 / 	img、file：共用id，請編流水號 	/ 	select：下拉式選單資料陣列
		// 5、img：寬度 	/ 	textarea：HTML編輯器開關，0 or 1 	/ 	select：陣列如為二維，請加第二維key值	 / 	input：限數字值為1
		// 6、img：高度 	/ 	textarea：無HTML編輯器時，為textarea行數

		$group_array = array(
			array("input", "圖片《一》", $img_name, "", "", ""),
		);
		$group_array = g_array($group_array, $data);
		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $cms_lang[22][$language]; ?> <?php echo $title_current; ?></h1>
			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<?php if ($id == 1) { ?>
					<a href="photo.php?id=<?php echo $parents2_id; ?>"><?php echo $title2; ?></a>
					<a class="current"><?php echo $cms_lang[22][$language]; ?> <?php echo $title_current; ?></a>

				<?php } else { ?>
					<a href="<?php echo $page_name; ?>">相簿分類管理</a>
					<a href="album.php?id=<?php echo $parents_id; ?>"><?php echo $title; ?></a>
					<a href="photo.php?id=<?php echo $parents2_id; ?>"><?php echo $title2; ?></a>
					<a class="current"><?php echo $cms_lang[22][$language]; ?> <?php echo $title_current; ?></a>
				<?php } ?>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-align-justify"></i>
								</span>
								<h5><?php echo $cms_lang[22][$language]; ?> <?php echo $title_current; ?></h5>
							</div>
							<div class="widget-content nopadding">
								<form action="../control/doadd.php?db=<?php echo $db_name; ?>" method="post" class="form-horizontal" id="form_add" name="form_add" enctype="multipart/form-data">
									<input type="hidden" name="<?php echo $order_name; ?>" value="0" />
									<input type="hidden" name="<?php echo $m_id_name; ?>" value="<?php echo $id; ?>" />
									<?php foreach ($group_array as $v)	group($v[0], $v[1], $v[2], $v[3], $v[4], $v[5], $v[6]); ?>
									<div id="elenode"></div>
									<div class="form-actions">
										<button type="button" class="btn btn-primary btn-sm" onclick="doadd();"><?php echo $cms_lang[22][$language]; ?></button>
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
		const nameElement1 = document.getElementsByName('p_img');

		if (nameElement1[0]) nameElement1[0].addEventListener("change", inputchange);
		inputchange()

		function inputchange() {
			const el = document.getElementById('elenode');
			el.innerHTML = "";
			let temp = `<div class='form-group'>
							<label class='col-sm-3 col-md-3 col-lg-2 control-label'>圖片顯示</label>
							<div class='col-sm-9 col-md-9 col-lg-10'>
							<div style='color:red;font-weight:blod;'>建議尺寸：<?php echo $img_size; ?></div>`
			if (nameElement1[0]) temp += `<img src='${nameElement1[0].value}' style="max-with:400px;height:400px">`
			temp += `</div></div>`
			el.innerHTML = temp;
		}
		//新增
		function doadd() {
			$("#form_add").submit();
		};
	</script>
</body>

</html>