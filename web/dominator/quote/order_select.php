<?php
if ($paging) {
	if (($p - 1) * $page_count + $k != 1) {
?>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,0);"><i class="fa fa-chevron-left"></i></button>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,<?php echo $order_data[($p - 1) * $page_count + $k - 1][$order_name]; ?>);"><i class="fa fa-angle-left"></i></button>
	<?php
	}
	echo $cms_lang[43][$language];
	if ((($p - 1) * $page_count + $k) != $data_count) {
	?>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,<?php echo $order_data[($p - 1) * $page_count + $k + 1][$order_name] + 1; ?>);"><i class="fa fa-angle-right"></i></button>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,<?php echo $order_data[$data_count][$order_name] + 1; ?>);"><i class="fa fa-chevron-right"></i></button>
	<?php
	}
	?>
	<br />
	<select name="<?php echo $order_name; ?>" onchange="select_order(<?php echo $v[$id_name]; ?>);" id="s_order_<?php echo $v[$id_name]; ?>">
		<?php
		foreach ($order_data as $k1 => $v1) {
		?>
			<option value="<?php echo $v1[$order_name] > $v[$order_name] ? $v1[$order_name] + 1 : $v1[$order_name]; ?>" <?php echo (($p - 1) * $page_count + $k) == $k1 ? "selected" : ""; ?>><?php echo $cms_lang[44][$language] . $k1; ?></option>
		<?php
		}
		?>
	</select>
	<?php
} else {
	if ($k != 1) {
	?>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,1);"><i class="fa fa-chevron-left"></i></button>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,<?php echo $data[$k - 1][$order_name]; ?>);"><i class="fa fa-angle-left"></i></button>
	<?php
	}
	echo $cms_lang[43][$language];
	if ($k != $count) {
	?>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,<?php echo $data[$k + 1][$order_name]; ?>);"><i class="fa fa-angle-right"></i></button>
		<button class="btn btn-xs btn-default" onclick="order(<?php echo $v[$id_name]; ?>,<?php echo $data[$count][$order_name]; ?>);"><i class="fa fa-chevron-right"></i></button>
	<?php
	}
	?>
	<br />
	<select name="<?php echo $order_name; ?>" onchange="select_order(<?php echo $v[$id_name]; ?>);" id="s_order_<?php echo $v[$id_name]; ?>">
		<?php
		foreach ($data as $k1 => $v1) {
			if ($paging) $k_value = ($p - 1) * $page_count + $k1;
			else $k_value = $k1;
		?>
			<option value="<?php echo $v1[$order_name]; ?>" <?php echo $k == $k1 ? "selected" : ""; ?>><?php echo $cms_lang[44][$language] . $k_value; ?></option>
		<?php
		}
		?>
	</select>
<?php
}
?>