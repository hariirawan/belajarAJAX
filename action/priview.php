<?php 
error_reporting(0);
include_once '../database/db.php';

#pagination

$batas = 10;
$page= isset($_POST["no_page"])? (int)$_POST["no_page"] : 1;
$start = ($page >1)?($page*$batas)-$batas : 0;

#Menampilkan Jumlah Anak Berkebutuhan Khusus 
$aps = $mysqli -> query("SELECT * FROM tabel_abk WHERE APS = 1");
$jumaps = $aps->num_rows;
$aba = $mysqli -> query("SELECT * FROM tabel_abk WHERE ABA = 1");
$jumaba = $aba->num_rows;
$bgm = $mysqli -> query("SELECT * FROM tabel_abk WHERE BGM = 1");
$jumbgm = $bgm->num_rows;
$hiv = $mysqli -> query("SELECT * FROM tabel_abk WHERE HIV = 1");
$jumhiv = $hiv->num_rows;
$abm = $mysqli -> query("SELECT * FROM tabel_abk WHERE ABM = 1");
$jumabm = $abm->num_rows;
$apc = $mysqli -> query("SELECT * FROM tabel_abk WHERE APC = 1");
$jumapc = $apc->num_rows;
$ayp = $mysqli -> query("SELECT * FROM tabel_abk WHERE AYP = 1");
$jumayp = $ayp->num_rows;
$ata = $mysqli -> query("SELECT * FROM tabel_abk WHERE ATA = 1");
$jumata = $ata->num_rows;
$atd = $mysqli -> query("SELECT * FROM tabel_abk WHERE ATD = 1");
$jumatd = $atd->num_rows;
$adl = $mysqli -> query("SELECT * FROM tabel_abk WHERE ADL = 1");
$jumadl = $adl->num_rows;


?>
<div class="panel panel-default priview">
<div class="panel-heading ">
	<div class="row">
		<div class="col-sm-8 text-left">
			<button class="btn btn-default btn-sm" type="button">
			  	APS <span class="badge"><?php echo $jumaps; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  ABA <span class="badge"><?php echo $jumaba; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  BGM <span class="badge"><?php echo $jumbgm; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  HIV <span class="badge"><?php echo $jumhiv; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  ABM <span class="badge"><?php echo $jumabm; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  APC <span class="badge"><?php echo $jumapc; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  AYP <span class="badge"><?php echo $jumayp; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  ATA <span class="badge"><?php echo $jumata; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  ATD <span class="badge"><?php echo $jumatd; ?></span>
			</button>
			<button class="btn btn-default btn-sm" type="button">
			  ADL <span class="badge"><?php echo $jumadl; ?></span>
			</button>
		</div>
		<div class="col-sm-4 text-right">
			<button class="btn btn-warning btn-sm " id="back">Back</button>
		</div>
	</div>
</div>
<div class="panel-body">
<div class="table-responsive" style="margin-bottom: -20px;">
<table class="table table-bordered fontTable export" border="1">
	<thead>
		<tr >
			<th rowspan="2" class="text-center" style="vertical-align: middle;">No</th>
			<th rowspan="2" class="text-center" style="vertical-align: middle;">Nama Anak </th>
			<th rowspan="2" class="text-center" style="vertical-align: middle;">JK</th>
			<th rowspan="2" class="text-center" style="vertical-align: middle;">Umur</th>
			<th rowspan="2" class="text-center" style="vertical-align: middle;">Nama Ortu</th>
			<th rowspan="2" class="text-center" style="vertical-align: middle;">Pekerjaan</th>
			<th rowspan="2" class="text-center" style="vertical-align: middle;">Dusun</th>
			<th rowspan="2" class="text-center" style="vertical-align: middle;">Nama Kadus</th>					
			<th colspan="10" class="text-center" style="vertical-align: middle;">Jenis Anak Berkebutuhan Khusus</th>
		</tr>
		<tr>
			<td>APS</td>
			<td>ABA</td>
			<td>BGM</td>
			<td>HIV</td>
			<td>ABM</td>
			<td>APC</td>
			<td>AYP</td>
			<td>ATA</td>
			<td>ATD</td>
			<td>ADL</td>
		</tr>
	</thead>
	<?php

	$query =  $mysqli->query("SELECT * FROM tabel_abk ORDER BY nama_anak LIMIT $start, $batas ");
	$i=$start+1;
	while($data = $query->fetch_assoc()) {
		$dusun = $mysqli->query("SELECT * FROM dusun WHERE id_dusun='".$data["id_dusun"]."'");
		$dataDn= $dusun->fetch_assoc();
		#$desa = $mysqli->query("SELECT * FROM desa WHERE id_desa='".$angkaA[1]."'");
		#$dataD= $desa->fetch_assoc();

	?>
	<tbody>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $data["nama_anak"]; ?></td>
		<td><?php echo $data["jk"]; ?></td>
		<td><?php echo $data["umur"]; ?></td>
		<td><?php echo $data["nama_ortu"]; ?></td>
		<td><?php echo $data["pekerjaan"]; ?></td>
		<td><?php echo $dataDn["nama_dusun"]; ?></td>
		<td><?php echo $dataDn["nama_kadus"]; ?></td>
		<td class="text-center">
			<?php if ($data["APS"]==1) {
				echo '<input type="checkbox" checked="checked"  >';
			}else{
				echo '<input type="checkbox"   disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["ABA"]==1) {
				echo '<input type="checkbox" checked="checked" >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["BGM"]==1) {
				echo '<input type="checkbox" checked="checked"  >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["HIV"]==1) {
				echo '<input type="checkbox" checked="checked"  >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["ABM"]==1) {
				echo '<input type="checkbox" checked="checked"  >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["APC"]==1) {
				echo '<input type="checkbox" checked="checked"  >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["AYP"]==1) {
				echo '<input type="checkbox" checked="checked"  >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["ATA"]==1) {
				echo '<input type="checkbox" checked="checked" >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["ATD"]==1) {
				echo '<input type="checkbox" checked="checked" >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>
		<td class="text-center">
			<?php if ($data["ADL"]==1) {
				echo '<input type="checkbox" checked="checked" >';
			}else{
				echo '<input type="checkbox"  disabled>';
				} ?>
		</td>

	</tr>
	<?php 
	$i++;
	}
	?>
	</tbody>
</table>
</div>
</div>

<?php 
$sqli = $mysqli->query("SELECT * FROM tabel_abk");
$jumlah_query = $sqli->num_rows;
$noPage = ceil($jumlah_query/$batas);
$next= ($page < $noPage)? $page+1 : $page;
$prev= ($page>1)?$page-1 : 1;
 ?>
<div class="panel-footer">
	<div class="row">
		<div class="col-sm-3">
			Jumlah Anak Berkebutuhan Khusus : <span class="badge "> <?php echo $jumlah_query; ?> </span>
		</div>
		<div class="col-sm-3">
			Pages : <span class="badge "> <?php echo $page; ?> </span>
		</div>
		<div class="col-sm-6">

			<nav class="text-right">
			  <ul class="pagination pagination-sm" style="margin-top: -10px; margin-bottom:-10px;">
			  	<li>
			    	<a href="" class="paging" aria-label="Previous" id="<?php echo $prev; ?>">Prev</a>
			    </li>
			  <?php 
			  for ($i=1; $i <= $noPage ; $i++) { 
			  	?>
			  	<li>
			    	<a href="" class="paging" aria-label="Previous" id="<?php echo $i; ?>"><?php echo $i; ?></a>
			    </li>
			    <?php
			  }
			  ?>
			    <li>
			    	<a href="" class="paging" aria-label="Previous" id="<?php echo $next; ?>">Next</a>
			    </li>
			  </ul>
			</nav>
		</div>
	</div>
</div>
</div>