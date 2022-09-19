<?php
/*
	 * 來源頁面必需以get傳送：
	 * 1、db：資料表名。
	 * 2、page：來源頁面名稱。
	 */
include '../system/ready.mak';
include '../system/session.php';

if ($Authenticate == true) {
	$fields = ""; //用來存放需新增的欄位名
	$data = ""; //用來存放需新增的內容
	$check_name = ""; //用來存放需重新排序的欄位名
	$check_value = ""; //用來存放需重新排序的號碼
	$file_count = 0; //用於檔名上，避免檔名重覆

	foreach ($_POST as $key => $value) { //將post過來的參數取出
		$check = explode("-", $key);
		if (!isset($check[1])) {
			if ($fields != "") { //確認是否是第一個參數
				$fields .= ","; //如果不是就在字串中加上逗號
				$data .= ","; //如果不是就在字串中加上逗號
			}
			$order = explode("_", $key); //用來確認欄位用途的陣列
			if ($order[1] == "order") { //確認是否為排序欄位
				$check_name = $key; //用來存放排序欄位名
				$check_value = $value; //用來存放需排序的號碼
			}
			$fields .= "$key"; //將欄位的參數放入字串中
			$data .= "'" . filtration($value, $link) . "'"; //將內容的參數放入字串中
		}
	}


	if ($check_name != "" && is_numeric($check_value)) { //確認是否有需要確認排序的必要
		$check_result = $link->prepare("SELECT $check_name FROM [$db] WHERE $check_name = $check_value", array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL)); //執行sql語法
		$check_result->execute();
		if ($check_result->rowCount() > 0) { //確認需重新排序的數量是否大於0
			$link->prepare("UPDATE [$db] SET $check_name = $check_name+1 WHERE $check_name >= $check_value")->execute(); //執行sql語法
		}
	}

	$link->prepare("INSERT INTO [$db] ($fields) VALUES($data)")->execute(); //執行sql語法
	$link->prepare("INSERT INTO [record] (r_date,r_text,r_name,r_account,r_ip) VALUES(getdate(),'$db 資料新增','" . $_SESSION["dominator_name"] . "','" . $_SESSION["dominator_account"] . "','" . $_SESSION["dominator_ip"] . "')")->execute(); //執行sql語法

	echo "<script>alert('" . $cms_lang[22][$language] . $cms_lang[41][$language] . "');location.href='" . $url_set . $_SESSION["dom_url"] . "';</script>"; //執行導頁或輸出訊息後導頁
} else	exit();
$link = null;//關閉資料庫
