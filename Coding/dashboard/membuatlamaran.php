<?php
	session_start();
	include "../navbar.php";
	require "../database.php";

	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
	$term = "";
	$kode = "";
	$matkul = "";
	$ipk = "";
	$sks = "";

	// $conn = connectDB();
	// $sql = "SELECT * FROM LAMARAN WHERE idlamaran='" . $idlamaran . "'" ;
	// $result = pg_query($conn, $sql);
	// if (!$result) {
	// 	die("Error in SQL query: " . pg_last_error());
	// }
	// if (pg_num_rows($result) != 0) {
	// 	$field = pg_fetch_array($result);
	// 	$idlamaran = field[0];
	// 	$npm = field[1];
	// 	$idlowongan = field[2];
	// 	$id_st_lamaran = field[3];
	// 	$IPK = field[4];
	// 	$jumlahsks = field[5];
	// 	$nip = field[6];
	// }

	// $conn = connectDB();
	// $sql = "SELECT * FROM MATA_KULIAH WHERE kode = '" . $kode . "'";
	// $result = pg_query($conn, $sql);
	/*if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	if (pg_num_rows($result) != 0) {
		$field = pg_fetch_array($result);
		$idlamaran = field[0];
		$npm = field[1];
		$idlowongan = field[2];
		$id_st_lamaran = field[3];
		$IPK = field[4];
		$jumlahsks = field[5];
		$nip = field[6];
	}*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Lowongan</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h2>Daftar Lowongan<?echo $role; ?></h2> <br>
		<table style="width: 100%">
			<tr>
				<td>Term</td>
				<td><?echo $term ?>;</td>
			</tr>
			<tr>
				<td>Kode</td>
				<td><?echo $kode; ?></td>
			</tr>
			<tr>
				<td>Mata Kuliah</td>
				<td><?echo $matkul; ?></td>
			</tr>
			<tr>
				<td>IPK</td>
				<td><?echo $ipk; ?></td>
			</tr>
			<tr>
				<td>SKS</td>
				<td><?echo $sks; ?></td>
			</tr>
		</table>
	</body>
</html>