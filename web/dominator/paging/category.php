<?php
include '../system/ready.mak';

$p = (!isset($p) || $p == "") ? "" : $p;
$p = html_decode($p);
$page_name = "category.php?p=" . $p;
if ($p == "") $page_name = "category.php";

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
		$db_name = "a_category";
		$id_name = "c_id";
		$title_name_1 = "c_title_1";
		$title_name_2 = "c_title_2";
		$order_name = "c_order";

		switch ($p) {
			case "control":
				$title = "防治宣導管理";
				$btn_title = "防治宣導";
				$btn_url = "video.php?id=";
				$paging_where = "WHERE c_id IN (1,2,3,4)";
				break;
			case "recruit":
				$title = "招募宣傳管理";
				$btn_title = "招募宣傳";
				$btn_url = "";
				break;
			case "album":
				$title = "相簿剪影管理";
				$btn_title = "相簿剪影";
				$btn_url = "album.php?id=";
				$paging_where = "WHERE c_id IN (5,6,7,8,9)";
				break;
			case "travel":
				$title = "旅遊資訊管理";
				$btn_title = "旅遊資訊";
				$btn_url = "travel.php?id=";
				$paging_where = "WHERE c_id IN (10,11,12,13)";
				break;
			default:
				$title = "活動紀實管理";
				$btn_title = "活動紀實";
				$btn_url = "video.php?id=";
				$paging_where = "WHERE c_id > 30";
				break;
		}

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
			include '../quote/page_count.phppage_count.php'; //分頁計算
		}

		//資訊
		$query = "SELECT * FROM [$db_name] $paging_where ORDER BY $order_name";
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
							<?php if ($p == "") { ?>
								<div style="padding-top: 3px;">
									<a href="<?php echo $db_name; ?>_add.php" class="btn btn-default btn-xs"><i class="fa fa-plus"></i> <?php echo $cms_lang[22][$language]; ?></a>
								</div>
							<?php } ?>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped table-hover data-table">
								<thead>
									<tr>
										<th><?php echo $cms_lang[21][$language]; ?></th>
										<th><?php echo $cms_lang[42][$language]; ?></th>
										<th>分類標題</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (isset($data) && $data != "") {
										foreach ($data as $k => $v) {
									?>
											<tr>
												<td style="text-align: center; vertical-align: middle;" width="20%" id="td_img">
													<div class="btn-group">
														<button style="margin:2px 5px;" class="btn btn-xs btn-info" onclick="javascript:location.href='<?php echo $btn_url . (int) $v[$id_name]; ?>';"><?php echo $btn_title; ?></button>
														<?php if ($p == "") { ?>
															<button data-toggle="dropdown" class="btn btn-xs btn-info dropdown-toggle"><span class="caret"></span></button>
															<ul class="dropdown-menu dropdown-yellow">
																<li><a href="<?php echo $db_name; ?>_update.php?id=<?php echo (int) $v[$id_name]; ?>"><?php echo $cms_lang[23][$language]; ?></a></li>
																<li class="divider"></li>
																<li><a href="#" onclick="del(<?php echo (int) $v[$id_name]; ?>);return false;"><?php echo $cms_lang[24][$language]; ?></a></li>
															</ul>
														<?php } ?>
													</div>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="20%">
													<?php include '../quote/order_select.php'; //排序功能
													?>
												</td>
												<td style="text-align: center; vertical-align: middle; word-break:break-all;" width="60%">
													<?php echo html_decode($v[$title_name_1] . '<hr>' . $v[$title_name_2]); ?>
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