<?php
	session_start();
	include "../navbar.php";
	require "../database.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Buat Log</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h2>Buat Log</h2> <br>
		<br>
		<table style="width: 100%">
			<tr>
				<td>Kategori</td>
				<td><input type="Kategori" name="Kategori"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><input type="Tanggal" name="Tanggal"></td>
			</tr>
			<tr>
				<td>Jam Mulai</td>
				<td><input type="Jam Mulai" name="Jam Mulai"></td>
			</tr>
			<tr>
				<td>Jam Selesai</td>
				<td><input type="Jam Selesai" name="Jam Selesai"></td>
			</tr>
			<tr>
				<td>Deskripsi Kerja</td>
				<td><input type="text" name="Deskripsi Kerja"></td>
			</tr>
		</table>
		
		<div>
			<button type="submit" name="action" value="save">Simpan</button>
			<button type="submit" name="action" value="save">Batal</button>
		</div>
		
	</body>
</html>