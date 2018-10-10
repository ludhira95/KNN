<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<title>Diagnosa Penyakit Jantung</title>
</head>
<body>

<h3 class="box-title text-center">Diagnosa Penyakit Jantung</h3>
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<form class="form-horizontal" role="form" action="hitung.php" method="post">
<div class="box">
<div class="box_header">

</div>
<div class="box_body">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Pertanyaan</th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td><input type="checkbox" name="sesak_beraktivitas" value="1"/> Sesak Nafas Saat Beraktivitas</td>
	</tr>

	<tr>
		<td><input type="checkbox" name="sesak_istirahat" value="1"/> Sesak Berkurang Saat Istirahat</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="nyeri_dada" value="1"/> Nyeri Dada Seperti Ditimpa Beban Berat</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="nyeri_leher" value="1"/> Nyeri Dada Menjalar ke Leher, Punggung dan Tangan</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="pusing" value="1"/> Kepala Pusing</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="lemas" value="1"/> Badan Lemas</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="jantung" value="1"/> Jantung Berdebar</td>
	</tr>

	<tr>
		<td><input type="checkbox" name="capek" value="1"/> Mudah Capek</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="kaki" value="1"/> Kaki Bengkak</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="batuk" value="1"/> Batuk</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="darah_tinggi" value="1"/> Punya Riwayat Penyakit Tekanan Darah Tinggi (HT)</td>
	</tr>

	<tr>
	    <td><input type="checkbox" name="kencing_manis" value="1"/> Punya Riwayat Penyakit Gula Darah Tinggi (DM)</td>
	</tr>
</tbody>
</table>
</div>
<button type="submit" class="btn btn-success">proses</button>
</form>
</div>
</div>

</div>
</div>
</body>
</html>
