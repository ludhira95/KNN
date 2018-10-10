<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<title>Diagnosa Penyakit Jantung</title>
</head>
<body>
	<div class="container">
	<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
	<form class="form-horizontal" role="form" action="hitung.php" method="post">
	<div class="box">
	<div class="box_header hide">
<?php
$not_empty = count($_POST);
if (!$not_empty) {
	?>
	<script type="text/javascript">
	alert("Gejala harus ada yang dipilih.");
	setTimeout(function () {
		window.location.href = 'index.php';
	}, 100);
</script>
<?php
die();
}
?>

<table class="table table-striped">
		<tr>
			<th>Kasus Lama</th>
		</tr>
		<tr>
			<th><table class="table table-bordered">
				<tr>
					<th>id_kasus</th>
					<th>A2</th>
					<th>B2</th>
					<th>C2</th>
					<th>D2</th>
					<th>E2</th>
					<th>F2</th>
					<th>G2</th>
					<th>H2</th>
					<th>I2</th>
					<th>J2</th>
					<th>K2</th>
					<th>L2</th>
					<th>Hasil Diagnosa</th>

				</tr>
				<?php
				error_reporting(0);
				include "koneksi.php";
					$sql = "SELECT * FROM gejalas";
					$hasil = mysqli_query($koneksi,$sql);
					while ($baris=mysqli_fetch_row($hasil)){
				?>
				<tr>
					<td><?php echo $baris[0] ?></td>
					<td><?php echo $baris[2] ?></td>
					<td><?php echo $baris[3] ?></td>
					<td><?php echo $baris[4] ?></td>
					<td><?php echo $baris[5] ?></td>
					<td><?php echo $baris[6] ?></td>
					<td><?php echo $baris[7] ?></td>
					<td><?php echo $baris[8] ?></td>
					<td><?php echo $baris[9] ?></td>
					<td><?php echo $baris[10] ?></td>
					<td><?php echo $baris[11] ?></td>
					<td><?php echo $baris[12] ?></td>
					<td><?php echo $baris[13] ?></td>
					<td><?php echo $baris[14] ?></td>
				</tr>
				<?php } ?>
			</table></th>
		</tr>
</table>

<table class="table table-striped">
		<tr>
			<th>Kasus Baru</th>
		</tr>
		<tr>
			<th><table class="table table-bordered">
				<tr>
					<th>A1</th>
					<th>B1</th>
					<th>C1</th>
					<th>D1</th>
					<th>E1</th>
					<th>F1</th>
					<th>G1</th>
					<th>H1</th>
					<th>I1</th>
					<th>J1</th>
					<th>K1</th>
					<th>L1</th>
				</tr>
				<?php
				//koneksi database
				include 'koneksi.php';

				//menangkap isian form index.php

				$g1 = $_POST['sesak_beraktivitas'];
				$g2 = $_POST['sesak_istirahat'];
				$g3 = $_POST['nyeri_dada'];
				$g4 = $_POST['nyeri_leher'];
				$g5 = $_POST['pusing'];
				$g6 = $_POST['lemas'];
				$g7 = $_POST['jantung'];
				$g8 = $_POST['capek'];
				$g9 = $_POST['kaki'];
				$g10 = $_POST['batuk'];
				$g11 = $_POST['darah_tinggi'];
				$g12 = $_POST['kencing_manis'];

				//menghitung jumlah data training
				$sql=mysqli_query($koneksi,"SELECT * FROM gejalas where valid='1' ORDER BY id ASC");
				$jmldata = mysqli_num_rows($sql);

				//memberi nilai k
				$k = 3;
				?>
				<tr>
					<td><?php echo $g1 ?></td>
					<td><?php echo $g2 ?></td>
					<td><?php echo $g3 ?></td>
					<td><?php echo $g4 ?></td>
					<td><?php echo $g5 ?></td>
					<td><?php echo $g6 ?></td>
					<td><?php echo $g7 ?></td>
					<td><?php echo $g8 ?></td>
					<td><?php echo $g9 ?></td>
					<td><?php echo $g10 ?></td>
					<td><?php echo $g11 ?></td>
					<td><?php echo $g12 ?></td>
				</tr>
			</table></th>
		</tr>
</table>


<table class="table table-striped">
		<tr>
			<th>Perhitungan KNN</th>
		</tr>
		<tr>
			<th><table class="table table-bordered">
				<tr>
					<th>Kasus Ke</th>
					<th>A1 - A2</th>
					<th>B1 - B2</th>
					<th>C1 - C2</th>
					<th>D1 - D2</th>
					<th>E1 - E2</th>
					<th>F1 - F2</th>
					<th>G1 - G2</th>
					<th>H1 - H2</th>
					<th>I1 - I2</th>
					<th>J1 - J2</th>
					<th>K1 - K2</th>
					<th>L1 - L2</th>
					<th>Penjumlahan</th>
					<th>Jarak</th>
					<th>Hasil Diagnosa</th>
				</tr>

<?php
//perhitungan KNN
	for($i=1; $i<=$jmldata; $i++){
		$i_1 = $i-1;
		$sql1=mysqli_query($koneksi,"SELECT * FROM gejalas order by id asc limit $i_1,1 ");
		while($baris=mysqli_fetch_row($sql1)){
			//pengurangan
			$var1 = $g1 - $baris[2];
			$var2 = $g2 - $baris[3];
			$var3 = $g3 - $baris[4];
			$var4 = $g4 - $baris[5];
			$var5 = $g5 - $baris[6];
			$var6 = $g6 - $baris[7];
			$var7 = $g7 - $baris[8];
			$var8 = $g8 - $baris[9];
			$var9 = $g9 - $baris[10];
			$var10 = $g10 - $baris[11];
			$var11 = $g11 - $baris[12];
			$var12 = $g12 - $baris[13];

			//peng-kuadrat-an
			$kuadrat = (pow($var1,2)) + (pow($var2,2)) + (pow($var3,2)) + (pow($var4,2)) + (pow($var5,2)) + (pow($var6,2)) + (pow($var7,2)) + (pow($var8,2)) + (pow($var9,2)) + (pow($var10,2)) + (pow($var11,2)) + (pow($var12,2));
			//peng-akar-an
			$akar = sqrt($kuadrat);
			//simpan perhitungan di table temp
			$sql21="ALTER TABLE temp AUTO_INCREMENT = 1";
			$sql2="INSERT INTO temp (g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,jarak,hasil) VALUES ($baris[2],$baris[3],$baris[4],$baris[5],$baris[6],$baris[7],$baris[8],$baris[9],$baris[10],$baris[11],$baris[12],$baris[13],$akar,'$baris[14]')";
			mysqli_query($koneksi,$sql21);
			mysqli_query($koneksi,$sql2);
			?>
			<tr>
				<td><?php echo $baris[0] ?></td>
				<td><?php echo $var1 ?></td>
				<td><?php echo $var2 ?></td>
				<td><?php echo $var3 ?></td>
				<td><?php echo $var4 ?></td>
				<td><?php echo $var5 ?></td>
				<td><?php echo $var6 ?></td>
				<td><?php echo $var7 ?></td>
				<td><?php echo $var8 ?></td>
				<td><?php echo $var9 ?></td>
				<td><?php echo $var10 ?></td>
				<td><?php echo $var11 ?></td>
				<td><?php echo $var12 ?></td>
				<td><?php echo $kuadrat ?></td>
				<td><?php echo $akar ?></td>
				<td><?php echo $baris[14] ?></td>

				<?php } ?>
			</tr>
			<?php } ?>
		</table></th>
	</tr>

</table>

</div>

<table class="table table-striped">
	<tr>
		<th>Kasus Terdekat</th>
	</tr>
	<tr>
		<th><table class="table table-bordered">
			<tr>
				<th>Kasus Ke</th>
				<th>Jarak</th>
				<th>Hasil Diagnosa</th>
			</tr>
			<?php
			//sortir data
			$sql3="SELECT * FROM temp ORDER BY jarak LIMIT 0,$k";
			$data=mysqli_query($koneksi,$sql3);
			while ($baris=mysqli_fetch_row($data)){
				$sql4="INSERT INTO sort (g1,g2,g3,g4,g5,g6,g7,g8,g9,g10,g11,g12,jarak,hasil) VALUES ($baris[1],$baris[2],$baris[3],$baris[4],$baris[5],$baris[6],$baris[7],$baris[8],$baris[9],$baris[10],$baris[11],$baris[12],$baris[13],'$baris[14]')";
				mysqli_query($koneksi,$sql4);?>
				<tr>
					<td><?php echo $baris[0] ?></td>
					<td><?php echo $baris[13] ?></td>
					<td><?php echo $baris[14] ?></td>
				</tr>
			<?php } ?>
		</table></th>
	</tr>
</table>


<?php
	$sql5="SELECT id, jarak, COUNT(*) AS jml, HASIL
	FROM sort
	GROUP BY HASIL
	HAVING ( COUNT(HASIL) > 1 )";
	$data=mysqli_query($koneksi,$sql5);
	$i=0;
	while($baris=mysqli_fetch_row($data)){
		$id[]=$baris[0];
		$jarak[]=$baris[1];
		$jml[]=$baris[2];
		$status[]=$baris[3];
		$i++;
	}

	$what_biggest = 0;
$what_values = false;
	foreach ($status as $key => $value) {
		$oval = $jarak[$key];
		if ($what_values === false || $what_values > $oval) {
	$what_values = $oval;
		$what_biggest = $key;
	}
}


	//membandingkan banyak data per status
	if ($i==1){
		$hasil = $status[0];
	}else if ($i==2){
		$hasil = $status[$what_biggest];
	}else{
		$hasil = "Tidak Diketahui";
		for ($i=1; $i <= 12 ; $i++) { 
			${"g".$i} = trim(${"g".$i}) == "" ? "0" : "1"; 
		}
		$sql_check = "SELECT id from gejalas where `sesak_aktifitas` = '$g1' and `sesak_istirahat` = '$g2' and  `nyeri_dada` = '$g3' and  `nyeri_leher` = '$g4' and  `kepala_pusing` = '$g5' and  `badan_lemas` = '$g6' and  `jantung_berdebar` = '$g7' and  `mudah_cape` = '$g8' and  `kaki_bengkak` = '$g9' and  `batuk` = '$g10' and  `riwayat_darahtinggi` = '$g11' and  `riwayat_kencingmanis` = '$g12';";
		$q = mysqli_query($koneksi, $sql_check);
		if (!$q || mysqli_num_rows($q) < 1) {
			$sql = "INSERT INTO `gejalas`(`id`, `nama`, `sesak_aktifitas`, `sesak_istirahat`, `nyeri_dada`, `nyeri_leher`, `kepala_pusing`, `badan_lemas`, `jantung_berdebar`, `mudah_cape`, `kaki_bengkak`, `batuk`, `riwayat_darahtinggi`, `riwayat_kencingmanis`, `hasil`) VALUES (NULL,'Tidak Diketahui','$g1','$g2','$g3','$g4','$g5','$g6','$g7','$g8','$g9','$g10','$g11','$g12','Tidak Diketahui'); ";
			mysqli_query($koneksi, $sql);
		}
		
	}

	mysqli_query($koneksi,"DELETE FROM temp");
	mysqli_query($koneksi,"DELETE FROM sort");
?>

<table class="table table-striped">
	<tr>
		<th> Hasil Diagnosa </th>
	</tr>
	<?php
	$pe = mysqli_query($koneksi,"SELECT keterangan FROM penyakit WHERE nm_penyakit = '$hasil'");
	$penyakit=mysqli_fetch_row($pe)
	?>
	<tr>
		<td>Hasil Perhitungan Aplikasi Diagnosa Awal Penyakit Jantung Anda Menderita Penyakit Jantung <?php echo $hasil ?></td>
	</tr>
	<tr>
		<td><?php echo $penyakit[0] ?></td>
	</tr>
	<tr>
		<td>Sumber : www.alodokter.com</td>
	</tr>
	<tr>
		<td><font color="red">Disarankan agar Anda segera memeriksakan diri ke dokter spesialis jantung untuk pemeriksaan lebih lanjut.</font></td>
	</tr>
</table>

</div>
</form>
</div>
</div>
</div>
</body>
</html>
