<div class="row">
	<div id="footer" class="col-xs-12">&copy; <a href="http://mak66design.com" target="_blank">M.A.K. Design</a></div>
</div>
<?php 
	if(isset($db_name) && isset($id_name) && isset($id)){
?>
<script>
function delfile(key){
	location.href='../control/delfile.php?db=<?php echo $db_name;?>&key='+key+'&id_name=<?php echo $id_name;?>&id=<?php echo $id;?>';
};
</script>
<?php 
	}
?>