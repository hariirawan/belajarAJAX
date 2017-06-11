
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.css">
	<script>
		function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
	</script>
	<style type="text/css">
		.output{
	margin:2px auto;
		}
		table {
			border-collapse: collapse;
			margin: 10px 0px;
			width:100%;
		}
		.col0 th{
			padding-bottom:30px;
			line-height:60px;
			font-size:20pt;
		}
		.col1 th{
			color: black;
			text-transform: uppercase;
			font-weight:normal;
			text-align: center;
			padding:4px;
			text-transform:capitalize;
			border: 1px solid black;
			border-collapse: collapse;
			background-color: #eaeaea;

		}
		.col2 td{
			border:1px solid black;
			border-collapse:collapse;
			padding:4px;
			text-align: center;
		}
		.col1 td{
			background-color: #eaeaea;
			border: 1px solid black;
			text-align: center;
			text-transform: capitalize;
			padding: 4px;
			color:black;

		}
		.str{ mso-number-format:\@; }
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="jumbotron text-center">
		<h3><i class="glyphicon glyphicon-print"></i></h3>
		<button class="btn btn-info" id="export">Export Ke Excel</button>
		<button class="btn btn-info" onclick="printContent('printTe')">Print</button>
		<button class="btn btn-warning" onclick="window.location.href='../index.php?menu=rekapAbk'">back</button>
	</div>
</div>

<div class ="export" id="printTe">
	<div class="container-fluid">
	<div class="text-center"><h3>Rekapitulasi Anak Berkebutuhan Khusus</h3></div>
	<table class="output" >
	<tr class="col1" >
		<th rowspan="2">No</th>
		<th rowspan="2">Nama Desa</th>
		<th colspan="3">APS</th>
		<th colspan="3">ABA</th>
		<th colspan="3">BGM</th>
		<th colspan="3">HIV</th>
		<th colspan="3">ABM</th>
		<th colspan="3">APC</th>
		<th colspan="3">AYP</th>
		<th colspan="3">ATA</th>
		<th colspan="3">ATD</th>
		<th colspan="3">ADL</th>
		<th rowspan="2">Ket</th>
	</tr>
	<tr class="col1">
		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>

		<th>l</th>
		<th>p</th>
		<th>jml</th>
	</tr>
	<?php 
		include_once "../database/db.php";
		$abk= $mysqli->query("SELECT * FROM tabel_abk group by id_desa");
		$cekAPS= $mysqli->query("SELECT * FROM tabel_abk where APS = 1");
		$jumAPS = $cekAPS->num_rows;
		$cekABA= $mysqli->query("SELECT * FROM tabel_abk where ABA = 1");
		$jumABA = $cekABA->num_rows;
		$cekBGM= $mysqli->query("SELECT * FROM tabel_abk where BGM = 1");
		$jumBGM = $cekBGM->num_rows;
		$cekHIV= $mysqli->query("SELECT * FROM tabel_abk where HIV = 1");
		$jumHIV = $cekHIV->num_rows;
		$cekABM= $mysqli->query("SELECT * FROM tabel_abk where ABM = 1");
		$jumABM = $cekABM->num_rows;
		$cekAPC= $mysqli->query("SELECT * FROM tabel_abk where APC = 1");
		$jumAPC = $cekAPC->num_rows;
		$cekAYP= $mysqli->query("SELECT * FROM tabel_abk where AYP = 1");
		$jumAYP = $cekAYP->num_rows;
		$cekATA= $mysqli->query("SELECT * FROM tabel_abk where ATA = 1");
		$jumATA = $cekATA->num_rows;
		$cekATD= $mysqli->query("SELECT * FROM tabel_abk where ATD = 1");
		$jumATD = $cekATD->num_rows;
		$cekADL= $mysqli->query("SELECT * FROM tabel_abk where ADL = 1");
		$jumADL = $cekADL->num_rows;
		$no=1;
		while ($dataAbk=$abk->fetch_assoc()) {
			$cekDesa = $mysqli->query("SELECT * FROM desa WHERE id_desa='".$dataAbk["id_desa"]."' ");
			$desa = $cekDesa->fetch_assoc();	
			#Jumlah Keseluruhan Disetiap Desa dengan penyakit 
			$aps= $mysqli->query("SELECT * FROM tabel_abk where APS = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataAPS=$aps->num_rows;
			$apsL= $mysqli->query("SELECT * FROM tabel_abk where APS = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataAPSL=$apsL->num_rows;
			$apsP= $mysqli->query("SELECT * FROM tabel_abk where APS = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataAPSP=$apsP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit 
			$aba= $mysqli->query("SELECT * FROM tabel_abk where ABA = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataABA=$aba->num_rows;
			$abaL= $mysqli->query("SELECT * FROM tabel_abk where ABA = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataABAL=$abaL->num_rows;
			$abaP= $mysqli->query("SELECT * FROM tabel_abk where ABA = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataABAP=$abaP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$bgm= $mysqli->query("SELECT * FROM tabel_abk where BGM = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataBGM=$bgm->num_rows;
			$bgmL= $mysqli->query("SELECT * FROM tabel_abk where BGM = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataBGML=$bgmL->num_rows;
			$bgmP= $mysqli->query("SELECT * FROM tabel_abk where BGM = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataBGMP=$bgmP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$hiv= $mysqli->query("SELECT * FROM tabel_abk where HIV = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataHIV=$hiv->num_rows;
			$hivL= $mysqli->query("SELECT * FROM tabel_abk where HIV = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataHIVL=$hivL->num_rows;
			$hivP= $mysqli->query("SELECT * FROM tabel_abk where HIV = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataHIVP=$hivP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$abm= $mysqli->query("SELECT * FROM tabel_abk where ABM = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataABM=$abm->num_rows;
			$abmL= $mysqli->query("SELECT * FROM tabel_abk where ABM = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataABML=$abmL->num_rows;
			$abmP= $mysqli->query("SELECT * FROM tabel_abk where ABM = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataABMP=$abmP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$apc= $mysqli->query("SELECT * FROM tabel_abk where APC = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataAPC=$apc->num_rows;
			$apcL= $mysqli->query("SELECT * FROM tabel_abk where APC = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataAPCL=$apcL->num_rows;
			$apcP= $mysqli->query("SELECT * FROM tabel_abk where APC = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataAPCP=$apcP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$ayp= $mysqli->query("SELECT * FROM tabel_abk where AYP = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataAYP=$ayp->num_rows;
			$aypL= $mysqli->query("SELECT * FROM tabel_abk where AYP = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataAYPL=$aypL->num_rows;
			$aypP= $mysqli->query("SELECT * FROM tabel_abk where AYP = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataAYPP=$aypP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$ata= $mysqli->query("SELECT * FROM tabel_abk where ATA = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataATA=$ata->num_rows;
			$ataL= $mysqli->query("SELECT * FROM tabel_abk where ATA = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataATAL=$ataL->num_rows;
			$ataP= $mysqli->query("SELECT * FROM tabel_abk where ATA = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataATAP=$ataP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$atd= $mysqli->query("SELECT * FROM tabel_abk where ATD = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataATD=$atd->num_rows;
			$atdL= $mysqli->query("SELECT * FROM tabel_abk where ATD = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataATDL=$atdL->num_rows;
			$atdP= $mysqli->query("SELECT * FROM tabel_abk where ATD = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataATDP=$atdP->num_rows;

			#Jumlah Keseluruhan Disetiap Desa dengan penyakit APS	
			$adl= $mysqli->query("SELECT * FROM tabel_abk where ADL = 1 AND id_desa='".$dataAbk["id_desa"]."'");
			$dataADL=$adl->num_rows;
			$adlL= $mysqli->query("SELECT * FROM tabel_abk where ADL = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'L'");
			$dataADLL=$adlL->num_rows;
			$adlP= $mysqli->query("SELECT * FROM tabel_abk where ADL = 1 AND id_desa='".$dataAbk["id_desa"]."' AND jk= 'P'");
			$dataADLP=$adlP->num_rows;
	 ?>
	<tr class="col2">
		<td><?php echo  $no;?></td>
		<td style="text-align: left;"><?php echo  $desa["nama_desa"];?></td>
		<td><?php echo  $dataAPSL;?></td>
		<td><?php echo  $dataAPSP;?></td>
		<td><?php echo  $dataAPS;?></td>
		<td><?php echo  $dataABAL;?></td>
		<td><?php echo  $dataABAP;?></td>
		<td><?php echo  $dataABA;?></td>
		<td><?php echo  $dataBGML;?></td>
		<td><?php echo  $dataBGMP;?></td>
		<td><?php echo  $dataBGM;?></td>
		<td><?php echo  $dataHIVL;?></td>
		<td><?php echo  $dataHIVP;?></td>
		<td><?php echo  $dataHIV;?></td>
		<td><?php echo  $dataABML;?></td>
		<td><?php echo  $dataABMP;?></td>
		<td><?php echo  $dataABM;?></td>
		<td><?php echo  $dataAPCL;?></td>
		<td><?php echo  $dataAPCP;?></td>
		<td><?php echo  $dataAPC;?></td>
		<td><?php echo  $dataAYPL;?></td>
		<td><?php echo  $dataAYPP;?></td>
		<td><?php echo  $dataAYP;?></td>
		<td><?php echo  $dataATAL;?></td>
		<td><?php echo  $dataATAP;;?></td>
		<td><?php echo  $dataATA;?></td>
		<td><?php echo  $dataATDL;?></td>
		<td><?php echo  $dataATDP;?></td>
		<td><?php echo  $dataATD;?></td>
		<td><?php echo  $dataADLL;;?></td>
		<td><?php echo  $dataADLP;?></td>
		<td><?php echo  $dataADL;?></td>
		<td>-</td>
	</tr>
	<?php 
	$no++;
	}

	 ?>
	 <tr class="col1">
	 <td colspan="2">Jumlah</td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumAPS; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumABA; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumBGM; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumHIV; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumABM; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumAPC; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumAYP; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumATA; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumATD; ?></td>
	 <td>-</td>
	 <td>-</td>
	 <td><?php echo $jumADL; ?></td>
	 <td>-</td>
	 </tr>
	</table>
	</div>
</div>

	<script type="text/javascript" src="../asset/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../asset/js/jquery.table2excel.js"></script>
	
<script>
	$("#export").click(function(event) {
	/* Act on the event */
	$(".export").table2excel({
		exclude: ".noExl",
		name: "Excel Document Name",
		filename: "Data Anak Berkebutuhan Khusus",
		fileext: ".xls",
		exclude_img: true,
		exclude_links: true,
		exclude_inputs: true
	});
	

});
	</script>
</body>
</html>