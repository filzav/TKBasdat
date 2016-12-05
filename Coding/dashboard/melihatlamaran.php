<?php
	session_start();
	include "../navbar.php";
	require_once "../database.php";
	require_once "common_function.php";

	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];

	if(!empty($_GET)) {
		$namamk = $_GET['namamk'];
		$tahun = $_GET['tahun'];
		$semester = $_GET['semester'];
		$idlowongan = $_GET['idlowongan'];
		$conn = connectDB();
		$sql = "SELECT  * 
		FROM lamaran l
		WHERE idlowongan=".$idlowongan;
		$result = pg_query($conn, $sql);
		
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
		<h2>Pelamar Lowongan <?php echo $namamk ." ". $tahun ." ". $semester; ?></h2>
		<table style="width: 100%">


			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>NPM</th>
				<th>Email</th>	
				<th>Profil</th>
				<th>Status</th>
			</tr>
			<?php
			$i = 1;
			while($row = pg_fetch_array($result)){
				$mahasiswa = getDataMahasiswaByNPM($row['npm']);
			?>
			<tr>
				<td><?=$i?></td>
				<td><?=$mahasiswa['nama']?></td>
				<td><?=$row['npm']?></td>
				<td><?=$mahasiswa['email']?></td>
				<td><a href="detailPelamar.php?npm=<?=$row['npm']?>&idLam=<?=$row['idlamaran']?>">lihat</a></td>
				<td><?=getStatus($row['id_st_lamaran'])?></td>
			</tr>
			<?php
			$i++;
			}?>
			</table>
	</body>
</html>