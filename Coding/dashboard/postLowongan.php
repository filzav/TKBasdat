<?php
	session_start();
	
	if(!isset($_SESSION["userlogin"])){
		header('index.php');
	}
	
	require "../database.php";
	$conn = connectDB();
	
	$sql = "SELECT idlowongan from lowongan order by idlowongan desc limit 1";	
	$result = pg_query($conn, $sql);
	
	if (pg_num_rows($result) != 0){
		$row = pg_fetch_assoc($result);
		$newId = $row['idlowongan'];
	} 
	
	$newId++;
	
	$status = $_POST['status'];
	$jumlah_asisten = $_POST['jumlah_asisten'];
	$syarat_tambahan = $_POST['syarat_tambahan'];
	
	$sql = "SELECT nip from dosen where username = '".$_SESSION["username"]."'";	
	$result = pg_query($conn, $sql);
	
	if (pg_num_rows($result) != 0){
		$row = pg_fetch_assoc($result);
		$nip = $row['nip'];
	} 
	
	$sql = "SELECT kode_mk from kelas_mk where idkelasmk = '".$_POST['mata_kuliah']."'";	
	$result = pg_query($conn, $sql);
	
	if (pg_num_rows($result) != 0){
		$row = pg_fetch_assoc($result);
		$mataKuliah = $row['kode_mk'];
	} 
	
	$sql = "INSERT INTO lowongan (idlowongan, idkelasmk, status, jumlah_asisten,syarat_tambahan,nipdosenpembuka)
	VALUES ('".$newId."','".$mataKuliah."', '".$status."','".$jumlah_asisten."','".$syarat_tambahan."','".$nip."')";
	
	
	if (pg_query($conn, $sql)) {
		header('Location: lowongan.php');
	} 
	
?>