<?php
	include '../system/session.php';
	include '../system/include_data.php';
?>
<div id="header">
	<h1>
		<a href="index.php"><?php echo $cms_title[$language];?></a>
	</h1>
	<a id="menu-trigger" href="#"><i class="fa fa-align-justify"></i></a>
</div>

<div id="user-nav">
	<ul class="btn-group">
		<li class="btn"><a title="<?php echo $cms_lang[12][$language];?>" href="../../index.php" target="_blank"><i class="fa fa-eye"></i> <span class="text"><?php echo $cms_lang[12][$language];?></span></a></li>
		<?php 
			if($_SESSION["dominator_main"] <= 1){
		?>
		<li class="btn"><a title="<?php echo $cms_lang[13][$language];?>" href="user.php"><i class="fa fa-group"></i> <span class="text"><?php echo $cms_lang[13][$language];?></span></a></li>
		<?php 
			}
		?>
		<li class="btn"><a title="<?php echo $cms_lang[14][$language];?>" href="password.php"><i class="fa fa-key"></i> <span class="text"><?php echo $cms_lang[14][$language];?></span></a></li>
		<li class="btn"><a title="<?php echo $cms_lang[15][$language];?>" href="../system/session_close.php"><i class="fa fa-share"></i> <span class="text"><?php echo $cms_lang[15][$language];?></span></a></li>
	</ul>
</div>