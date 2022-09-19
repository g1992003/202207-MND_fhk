				function del(id){
	        		bootbox.dialog({
	        			message: "<?php echo $cms_lang[30][$language];?>",
	        			title: "<?php echo $cms_lang[24][$language];?>",
	        			buttons: {
	            			danger: {
		            			label: "<?php echo $cms_lang[24][$language];?>",
		            			className: "btn-danger",
		            			callback: function() {
		            				location.href="../control/dodel.php?db=<?php echo $db_name;?>&id_name=<?php echo $id_name;?>&id="+id;
		        		            alert("<?php echo $cms_lang[24][$language].$cms_lang[41][$language];?>");
		            			}
	            			},
	            			main: {
		            			label: "<?php echo $cms_lang[29][$language];?>",
		            			className: "btn-default",
		            			callback: function() {
		            				 console.log("Alert Callback");
		            			}
	            			}
	        			}
	        		});
	        	};