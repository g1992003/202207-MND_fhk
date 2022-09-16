<?php
include '../system/ready.mak';

$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$id = (int)$id;

if (!isset($id) || !is_numeric($id)) {
	header("location:./");
	exit();
} else {
	$page_name = "category.php";

	if ($id >= 15 && $id <= 20) {
		$page_name = "video.php?id=" . $id;
	}
	if ($id <= 4) {
		$page_name = "category.php?p=control";
	}

	$sql = "SELECT c_title_1,c_id FROM [a_category] WHERE c_id = :id";
	$stmt = $link->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_NUM);
	$parents_id = html_decode($row[1]);

	$btn_url = "video.php?id=";
}
include '../quote/head.php';
?>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/font-awesome.css" />
<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="stylesheet" href="../css/icheck/flat/blue.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/unicorn.css" />
<!--[if lt IE 9]>
		<script type="text/javascript" src="../js/respond.min.js"></script>
		<![endif]-->

</head>

<body data-color="grey" class="flat">
	<div id="wrapper">
		<?php
		include '../quote/header.php';
		include '../quote/sidebar.php';
		$_SESSION["dom_url"] = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		$title = html_decode("《" . $row[0] . "》資訊管理");
		$db_name = "video";
		$id_name = "v_id";
		$title_name_1 = "v_title_1";
		$title_name_2 = "v_title_2";
		$url_name = "v_url";
		$img_name = "v_img";
		$text_name = "v_text";
		$order_name = "v_order";
		$m_id_name = "c_id";


		$paging = false; //如果不使用php分頁，請改為：false
		if ($paging) {
			$paging_where = "";
			$paging_where1 = "";
			if (isset($search) && $search != "") { //搜尋使用
				$paging_where = "WHERE $name_name LIKE '%$search%'";
				$paging_where1 = $paging_where;
			} else {
				$paging_where1 = "";
				$search = "";
			}
			include '../quote/page_count.php'; //分頁計算
		} else {
			$paging_where = "";
			//活動紀實 年份
			if ($id > 30) {

				$query = "SELECT DISTINCT CONVERT (VARCHAR(8000), v_text) AS v_year FROM [video] WHERE c_id = $id";
				$data = sql_data($query, $link);
				$year_data = array();
				foreach ($data as $k => $v) {
					array_push($year_data, $v["v_year"]);
				}
				sort($year_data);
				$year = (!isset($year) || !is_numeric($year)) ? '' : $year;
				if ($year) {
					$paging_where = "AND v_text LIKE '$year'";
				}
			}
		}

		//資訊
		$query = "SELECT * FROM [$db_name] WHERE $m_id_name = $parents_id $paging_where  ORDER BY $order_name";
		if ($paging) $query .= $paging_limit; //分頁用limit
		$data = sql_data($query, $link);
		if ($data) $count = count($data); //排序使用
		$link = null;

		?>
		<div id="content">
			<div id="content-header" class="mini">
				<h1><?php echo $title; ?></h1>

			</div>
			<div id="breadcrumb">
				<a href="index.php" title="<?php echo $cms_lang[9][$language]; ?>" class="tip-bottom"><i class="fa fa-home"></i> <?php echo $cms_lang[10][$language]; ?></a>
				<?php if ($id <= 4) { ?>
					<a href="<?php echo $page_name; ?>">防治宣導管理</a>
				<?php } else if ($id > 30) { ?>
					<a href="<?php echo $page_name; ?>">活動紀實管理</a>
				<?php } ?>
				<a class="current"><?php echo $title; ?></a>
			</div>
			<div class="row">
				<?php if ($id > 30) { ?>
					<div class="col-xs-12">
						<div class="pull-right">
							年分
							<select onchange="javascript:location.href=this.value;">
								<option value="video.php?id=<?php echo $id; ?>" <?php echo ($year == "") ? 'selected' : ''; ?>>全部</option>
								<?php foreach ($year_data as $k) { ?>
									<option value="video.php?id=<?php echo $id; ?>&year=<?php echo $k; ?>" <?php echo ($k == $year) ? 'selected' : ''; ?>><?php echo $k; ?>年</option>
								<?php } ?>
							</select>
						</div>
					</div>
				<?php } ?>
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="fa fa-th"></i>
							</span>
							<h5><?php echo $title; ?></h5>
							<div style="padding-top: 3px;">
								<a href="<?php echo $db_name; ?>_add.php?id=<?php echo $parents_id; ?>" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> <?php echo $cms_lang[22][$language]; ?></a>
							</div>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover data-table">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th><?php echo $cms_lang[42][$language]; ?></th>
										<th>標題</th>
										<th>圖片 / 影音</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data) && $data != "") {
										foreach ($data as $k => $v) {
									?>
											<tr>
												<td style="text-align: center; vertical-align: middle;" width="15%" id="td_img">
													<div class="btn-group">
														<button data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle">操作 <span class="caret"></span></button>
														<ul class="dropdown-menu dropdown-yellow">
															<li><a href="<?php echo $db_name; ?>_update.php?id=<?php echo $v[$id_name]; ?>"><?php echo $cms_lang[23][$language]; ?></a></li>
															<li class="divider"></li>
															<li><a href="#" onclick="del(<?php echo $v[$id_name]; ?>);return false;"><?php echo $cms_lang[24][$language]; ?></a></li>
														</ul>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="15%">
													<?php include '../quote/order_select.php'; //排序功能
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="35%">
													<?php
													if ($id > 30) echo $v[$text_name] . "年 <hr>";
													echo $v[$title_name_1] . "<hr>" . $v[$title_name_2];
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="30%">
													<a href="<?php echo html_decode($v[$url_name]); ?>" target="_blank">
														<?php if ($id == 15) { ?>
															<i class="fa fa-volume-up" style="font-size: 64px;margin: 5px;"></i>
														<?php } else { ?>
															<img src="<?php echo html_decode($v[$img_name]); ?>" style="max-width:400px;max-height:400px;">
														<?php } ?>
													</a>
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
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
	<script src="../js/bootbox.min.js"></script>
	<script src="../js/jquery.icheck.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/jquery.nicescroll.min.js"></script>
	<script src="../js/unicorn.js"></script>
	<script src="../js/unicorn.tables.js"></script>
	<script src="../js/window_load.js"></script>
	<script type="text/javascript">
		<?php include '../quote/del_box.php'; //刪除功能
		?>
	</script>
	<?php include '../quote/order_send.php'; //排序from表
	?>
</body>

</html>