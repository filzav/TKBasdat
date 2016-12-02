<?php
	session_start();
	include "../navbar.php";
	require "../database.php";

	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
	$idlamaran = 47;
	$nomor = "";
	$npm = "";
	$email = "";
	$profil = "";
	$status = "";


	$conn = connectDB();
	$sql = "SELECT * FROM LAMARAN WHERE idlamaran=".$idlamaran."";
	$result = pg_query($conn, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	if ($result) {
		$field = pg_fetch_array($result);
		$nomor = $field[0];
		$nama = $field[1];
		$npm = $field[2];
		$email = $field[3];
		$profil = $field[4];
		$status = $field[5];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Pelamar</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h2>Pelamar Lowongan <?echo $matkul . $tahun . $semester; ?></h2>
		<table style="width: 100%">
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>NPM</th>
				<th>Email</th>	
				<th>Profil</th>
				<th>Status</th>
			</tr>
			<tr>
				<td><?= $nomor ?></td>
				<td><?= $nama ?></td>
				<td><?= $npm ?></td>
				<td><?= $email ?></td>
				<td><?= $profil ?></td>
				<td><?= $status ?></td>
			</tr>
			</table>
	</body>
</html>