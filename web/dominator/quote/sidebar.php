<?php
/*
 * 資料表名：menu 欄位：
 * 1、m_id：int(6) 規則為 001,002,003,003-01,003-02,004,005 
 * 2、m_type：varchar(10) 型態，根目錄為"root"，子目錄為"leaf"。 
 * 3、m_name：varchar(150) 頁面名稱。
 * 4、m_url：varchar(150) 頁面連結，如為純根目錄，則設為"-"。 
 * 5、m_icon_sidebar：varchar(30) 示意小圖。 
 * 6、m_icon_index：varchar(30) 主頁大圖。 
 * 一、導入本頁前，需先導入資料庫連結。
 * 二、管理後台全站需先定義：$page_name = basename(__FILE__);
 */

$sql = "SELECT m_id,m_type,m_name,m_url,m_icon_sidebar,m_icon_index,m_main_purview,m_sub_purview FROM [menu] ORDER BY m_id";
$result = $link->prepare($sql);
$result->execute();
while ($s_row = $result->fetch(PDO::FETCH_ASSOC)) {
	foreach ($s_row as $k => $v) {
		$menu[$s_row["m_id"]][$k] = html_decode($v);
	}
}

?>
<div id="sidebar">
	<ul>
		<li <?php echo $page_name == "index.php" ? "class='active'" : ""; ?>><a href="index.php"><i class="fa fa-home"></i> <span><?php echo $cms_lang[10][$language]; ?></span></a></li>
		<?php
		$ul = 0;

		if (isset($menu)) {
			foreach ($menu as $v) {
				$purview = 0;
				if (
					$v["m_main_purview"] > $_SESSION["dominator_main"] ||
					($v["m_main_purview"] == $_SESSION["dominator_main"] &&
						($v["m_sub_purview"] == 0 || $_SESSION["dominator_sub"] == 0 || $v["m_sub_purview"] == $_SESSION["dominator_sub"]))
				)
					$purview = 1;
				if ($purview) {
					if ($v["m_type"] == "root") { //如為根目錄
						if ($ul == 1) { //如上一個是根目錄
							echo "</ul></li>"; //則輸出結束根目錄
							$ul = 0;
						}
						if ($v["m_url"] == "-") { //如根目錄沒帶連結
							$sql = "SELECT m_url FROM [menu] WHERE m_id LIKE '%" . $v["m_id"] . "%'";
							$url_result = $link->prepare($sql);
							$url_result->execute();
							echo "<li class='submenu";
							$menu_open = 0;
							while ($url_row = $url_result->fetch(PDO::FETCH_ASSOC)) {
								$page_name == $url_row["m_url"] ? $menu_open += 1 : $menu_open += 0; //確認是否開啟目錄
							}
							echo $menu_open != 0 ? " open'>" : "'>"; //如果是則開啟目錄
		?>
							<a href="#"><i class="<?php echo $v["m_icon_sidebar"]; ?>"></i> <span><?php echo $v["m_name"]; ?></span> <i class="arrow fa fa-chevron-right"></i></a>
							<ul>
							<?php
							$ul = 1;
						} else { //如根目錄有帶連結
							echo "<li ";
							echo $page_name == $v["m_url"] ? "class='active'>" : ">"; //如已選取則定位目錄
							?>
								<a href="<?php echo $v["m_url"]; ?>"><i class="<?php echo $v["m_icon_sidebar"]; ?>"></i> <span><?php echo $v["m_name"]; ?></span></a></li>
							<?php
						}
					} else { //如是子目錄
						echo "<li ";
						echo $page_name == $v["m_url"] ? "class='active'>" : ">"; //如已選取則定位目錄
							?>
							<a href="<?php echo $v["m_url"]; ?>"><?php echo $v["m_name"]; ?></a></li>
			<?php
					}
				}
			}
		}
			?>
							</ul>
</div>