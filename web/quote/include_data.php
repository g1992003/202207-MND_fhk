<?php
// session_start();
$this_page = $url_set . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//TITLE資訊
$query = "SELECT d_id,d_text FROM [document] WHERE d_id IN(1,2,3,4,5,6)";
$meta_data = sql_data($query, $link, 2, "d_id");
$title_var = $meta_data[1]["d_text"];

//GOOGLE驗證碼
$sitekey = "";
