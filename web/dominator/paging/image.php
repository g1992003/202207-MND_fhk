<?php
include '../system/ready.mak';

$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
$id = (int)$id;

if (!isset($id) || !is_numeric($id)) {
	header("location:./");
	exit();
} else {
	$page_name = "history.php";

	$sql = "SELECT h_title_1, h_id FROM [history] WHERE h_id = :id";
	$stmt = $link->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_NUM);
	$parents_id = html_decode($row[1]);
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

		$title = html_decode("分類《" . $row[0] . "》圖片管理");

		$db_name = "image";
		$id_name = "i_id";
		$img_name = "i_img";
		$order_name = "i_order";
		$m_id_name = "h_id";


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
				<a href="<?php echo $page_name; ?>">政戰沿革管</a>
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
										<th>序號</th>
										<th><?php echo $cms_lang[42][$language]; ?></th>
										<th>圖片連結</th>
										<th>圖片</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data) && $data != "") {
										foreach ($data as $k => $v) {
									?>
											<tr>
												<td style="text-align: center; vertical-align: middle;" width="10%" id="td_img">
													<?php echo $k; ?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="15%">
													<?php include '../quote/order_select.php'; //排序功能
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="40%">
													<form action="../control/doupdate.php?db=<?php echo $db_name; ?>&id_name=<?php echo $id_name; ?>&id=<?php echo (int) $v[$id_name]; ?>" method="post" class="form-horizontal" id="form_update" name="form_update" enctype="multipart/form-data">
														<button type="button" class="btn btn-primary btn-sm" onclick="doupdate();"><?php echo $cms_lang[23][$language]; ?></button>
														<button type="button" onclick="del(<?php echo $v[$id_name]; ?>);" class="btn btn-sm btn-danger">刪除</span></button>
														<hr>
														<input style="text-align: center;" type="text" class="form-control input-sm" id="p_img<?php echo (int) $v[$id_name]; ?>" name="<?php echo $img_name; ?>" value="<?php echo html_decode($v[$img_name]); ?>" />
													</form>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="30%">
													<img src="<?php echo html_decode($v[$img_name]); ?>" style="max-width:400px;max-height:400px;">
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

		function doupdate() {
			$("#form_update").submit();
		};
	</script>
	<?php include '../quote/order_send.php'; //排序from表
	?>
</body>

</html>