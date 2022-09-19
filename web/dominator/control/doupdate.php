<?php
/*
	 * 來源頁面必需以get傳送：
	* 1、db：資料表名。
	* 2、page：來源頁面名稱。
	* 3、id_name：索引值欄位名稱。
	* 4、id：欲修改的索引值。
	*/
header("Content-Type: text/html; charset=utf-8"); //告知編碼
include '../system/ready.mak';
include '../system/session.php';

if ($Authenticate == true) {
	$sqlstr = ""; //用來存放需變更sql語法
	$check_name = ""; //用來存放需重新排序的欄位名
	$check_value = ""; //用來存放需重新排序的號碼
	$file_count = 0; //用於檔名上，避免檔名重覆

	foreach ($_POST as $key => $value) { //將post過來的參數取出
		$check = explode("-", $key);
		if (!isset($check[1])) {
			if ($sqlstr != "") $sqlstr .= ","; //確認是否是第一個參數，如果不是就在字串中加上逗號
			$order = explode("_", $key); //用來確認是否為排序欄位的陣列
			if ($order[1] == "order") { //確認是否為排序欄位
				$check_name = $key; //用來存放排序欄位名
				$check_value = $value; //用來存放需排序的號碼
			}
			$sqlstr .= "$key = '" . filtration($value, $link) . "'"; //將參數放入字串中
		}
	}

	if ($check_name != "" && is_numeric($check_value)) { //確認是否有需要確認排序的必要
		$check_result = $link->prepare("SELECT $check_name FROM [$db] WHERE $id_name = $id", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  //執行sql語法
		$check_result->execute();
		$row = $check_result->fetch(PDO::FETCH_ASSOC);
		if ($row[$check_name] > $check_value) {
			$link->prepare("UPDATE [$db] SET $check_name = $check_name+1 WHERE $check_name < $row[$check_name] AND $check_name >= $check_value")->execute();
		} else {
			$link->prepare("UPDATE [$db] SET $check_name = $check_name-1 WHERE $check_name > $row[$check_name] AND $check_name <= $check_value")->execute();
		}
	}


	$link->prepare("UPDATE [$db] SET $sqlstr WHERE $id_name = $id")->execute(); //執行sql語法
	$link->prepare("INSERT INTO [record] (r_date,r_text,r_name,r_account,r_ip) VALUES(getdate(),'$db 資料修改：$id','" . $_SESSION["dominator_name"] . "','" . $_SESSION["dominator_account"] . "','" . $_SESSION["dominator_ip"] . "')")->execute(); //執行sql語法

	echo "<script>alert('" . $cms_lang[23][$language] . $cms_lang[41][$language] . "');location.href='" . $url_set . $_SESSION["dom_url"] . "';</script>"; //執行導頁或輸出訊息後導頁
} else exit();
$link = null;//關閉資料庫
