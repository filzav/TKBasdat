<?php
	session_start();
	include "../navbar.php";
	require_once "../database.php";
	require_once "common_function.php";

	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
	if($_POST) {
		$idlowongan = $_POST['idlowongan'];
		$npm= (getNPM($username));
		$namamhs = "";
		$nomor = "";
		$email = "";

		$conn = connectDB();
		$sql = "SELECT npm FROM LAMARAN WHERE id_st_lamaran = 1 and idlowongan = $idlowongan";
		$result = pg_query($conn, $sql);
		if ($result) {
			$field = pg_fetch_array($result);
			$nomor = $field[0];
			$namamhs = $field[1];
			$npm = $field[2];
			$email = $field[3];
			$profil = $field[4];
			$status = $field[5];
		}		
	}
	if(!empty($_GET)) {
		$idkelasmk = $_GET['idkelasmk'];
		$tahun = $_GET['tahun'];
		$semester = $_GET['semester'];
	} else {
		die();
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
		<h2>Pelamar Lowongan <?echo $idkelasmk . $tahun . $semester; ?></h2>
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
			<script>
			for($result) {
				$field = pg_fetch_array($result);
				$nomor = $field[0];
				$namamhs = $field[1];
				$npm = $field[2];
				$email = $field[3];
				$profil = $field[4];
				$status = $field[5];
			}</script>
				<td><?echo $nomor; ?></td>
				<td><?echo $namamhs; ?></td>
				<td><?echo $npm; ?></td>
				<td><?echo $email; ?></td>
				<td><?echo $profil ?></td>
				<td><?echo $status ?></td>
			</tr>
			</table>
	</body>
</html>