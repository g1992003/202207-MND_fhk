<?php
	//分頁資訊
	$page_count = 10;
	if(isset($order_name)) $query = "SELECT $id_name,$order_name FROM `$db_name` $paging_where1 ORDER BY $order_name";
	else $query = "SELECT $id_name FROM `$db_name` $paging_where1";
	$order_data = sql_data($query,$link);
	$data_count = count($order_data);
	$maxpage = ceil($data_count/$page_count);
	if(!isset($p) || !is_numeric($p) || $p > $maxpage) $p = 1;
	if($data_count < $page_count) $page_count = $data_count;
	$page_start = ($p - 1) * $page_count;
	$paging_limit = " LIMIT $page_start,$page_count";