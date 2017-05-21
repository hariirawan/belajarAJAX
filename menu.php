<?php 
	$menu = isset($_GET["menu"])?$_GET["menu"] : "";
	if ($menu == "contact") {
		?>
		<div class="col-sm-10 col-sm-offset-1 table-tampil">

		</div>
		<?php
	}else{
		?>
		<div class="col-sm-10 col-sm-offset-1" style="height:400px;" id="map-canvas">
			
		</div>
		<?php
	}
?>
<script src="js/fungsiAction.js"></script>