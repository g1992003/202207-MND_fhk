<?php if ($paging) $page_name .= "p=" . $p; ?>
<!-- 		更換排序 開始 -->
<form action="#" method="post" id="form_order">
	<input type="hidden" name="<?php echo $order_name ?>" id="order_input">
</form>
<!-- 		更換排序 結束 -->
<script type="text/javascript">
	// 				修改排序開始
	function order(id, order_id) {
		$("#form_order").attr("action", "../control/doupdate.php?db=<?php echo $db_name; ?>&page=<?php echo $page_name; ?>&id_name=<?php echo $id_name; ?>&id=" + id);
		$("#order_input").val(order_id);
		$("#form_order").submit();
		alert("<?php echo $cms_lang[42][$language] . $cms_lang[41][$language]; ?>");
	};

	function select_order(id) {
		var order_id = $("#s_order_" + id).val();
		order(id, order_id);
	};
	//	        	修改排序結束
</script>