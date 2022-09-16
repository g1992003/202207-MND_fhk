<?php
include '../system/ready.mak';

$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$id = (int)$id;

if (!isset($id) || !is_numeric($id)) {
	header("location:./");
	exit();
} else {
	$page_name = "news.php?id=" . $id;
	$parents_id = $id;
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

		$title = "";
		switch ($id) {
			case 1:
				$title = "忠信報管理";
				break;
			case 2:
				$title = "保防天地管理";
				break;
			case 3:
				$title = "心理測驗管理";
				break;
		}
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
				<a class="current"><?php echo $title; ?></a>
			</div>
			<div class="row">
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
										<th>圖片</th>
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
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="40%">
													<?php echo $v[$title_name_1] . "<hr>" . $v[$title_name_2]; ?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="40%">
													<img src="<?php echo $v[$img1_name]; ?>" style="max-width:400px;max-height:400px;">
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