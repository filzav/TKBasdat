<?php
	session_start();
	include "../navbar.php";
	require_once "../database.php";
	require_once "common_function.php";
	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
	
	if($_POST){
		$ipk = $_POST['ipk'];
		$sks = $_POST['sks'];
		$idlowongan = $_POST['idlowongan'];
		$nip = $_POST['nip'];
		$id_st_lamaran = 1;
		$npm= (getNPM($username));

		$conn = connectDB();
		 $sql = "INSERT INTO lamaran (npm,idlowongan,id_st_lamaran,ipk,jumlahsks,nip) VALUES ($npm,$idlowongan,1,$ipk,$sks,$nip)";
		 $result = pg_query($conn, $sql);
		 /*if($result){
		 	echo "masuk";
		 	die();
		 }else{
		 	echo "gakmasuk";
		 	die();
		 }*/
	}
	
	if(!empty($_GET)){
		$kode=$_GET['kode'];
		$matkul=$_GET['matkul'];
		$term = $_GET['term'];
		$idlowongan = $_GET['idlowongan'];
		$nipdosen=$_GET['nip'];
	}else{
		die();
	}

	$id_st_lamaran = 1;//status melamar

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Membuat Lamaran</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h2>Membuat Lamaran<?echo $role; ?></h2> <br>
		<table style="width: 100%">
		<form method="POST" action="membuatlamaran.php">
			<tr>
				<td>Term</td>
				<td><?=$term ?></td>
			</tr>
			<tr>
				<td>Kode</td>
				<td><?=$kode?></td>
			</tr>
			<tr>
				<td>Mata Kuliah</td>
				<td><?=$matkul?></td>
			</tr>
			<tr>
				<td>IPK</td>
				<td><input type="text" name="ipk" required></td>
			</tr>
			<tr>
				<td>SKS</td>
				<td><input type="text" name="sks" required></td>
			</tr>

			
		</table>
		
		<input type="hidden" name="idlowongan" value="<?=$idlowongan?>" required>
		<input type="hidden" name="nip" value="<?=$nipdosen?>" required>

		<input type="submit" value="Daftar">
		<a href="" >BATAL</a>
		</form>
	</body>
</html>