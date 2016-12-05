<?php 
	session_start();
	include "../navbar.php";
	require "../database.php";
	if(!isset($_SESSION["username"])){
		header("Location: ../index.php");
	}

	$npm = $_GET['npm'];
	$idLamaran = $_GET['idLam'];
	$role = $_SESSION["role"];
	$telp = "";
	$ket = "";

	$conn = connectDB();
	$sql = "SELECT * FROM MAHASISWA WHERE npm='" .$npm. "'";
	$result = pg_query($conn, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	if (pg_num_rows($result) != 0) {
		$field = pg_fetch_array($result);
		$nama = $field[1];
		$emailAktif = $field[5];
		$waktuKosong = $field[6];
		$bank = $field[7];
		$norek = $field[8];
	}
	
	$sql = "SELECT * FROM TELEPON_MAHASISWA WHERE npm='" . $npm . "'";
	$result = pg_query($conn, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	while($row = pg_fetch_assoc($result)){
		$telp = $telp . $row['nomortelepon'] . " ";
	}

	$dataPelamar = "";
	$dataPelamar = $dataPelamar .
		"<table>
			<tr>
				<td>Nama</td>
				<td>" .$nama. "</td>
			</tr><tr>
				<td>Email</td>
				<td>" .$emailAktif. "</td>
			</tr><tr>
				<td>NPM</td>
				<td>" .$npm. "</td>
			</tr><tr>
				<td>Telepon</td>
				<td>" .$telp. "</td>
			</tr><tr>
				<td>Waktu Kosong</td>
				<td>" .$waktuKosong. "</td>
			</tr><tr>
				<td>Detail Rekening</td>
				<td>" .$bank. " - " .$norek. "<br>a/n " .$nama. "</td>
			</tr>
		</table>";

	$sql = "SELECT mk.nama, mmkmk.nilai, mk.kode, la.id_st_lamaran
		FROM MAHASISWA m, LAMARAN la, LOWONGAN lo, KELAS_MK kmk, MATA_KULIAH mk, MHS_MENGAMBIL_KELAS_MK mmkmk 
		WHERE m.npm=la.npm AND la.idlowongan=lo.idlowongan AND lo.idkelasmk=kmk.idkelasmk AND kmk.kode_mk=mk.kode AND mmkmk.idkelasmk=kmk.idkelasmk AND mmkmk.npm=m.npm AND m.npm='" .$npm. "' AND la.idlamaran='" .$idLamaran. "'";
	$result = pg_query($conn, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	if (pg_num_rows($result) != 0) {
		$field = pg_fetch_array($result);
		$namaMk = $field[0];
		$nilai = $field[1];
		$kodeMkParent = $field[2];
		$status = $field[3];
	}

	// Memastikan bukan data yang sudah di Terima
	if($status == '3'){
		header("Location: melihatLamaran.php");
	}

	$dataAkademis = "";
	$dataAkademis = $dataAkademis .
		"<table>
			<tr>
				<td>" .$namaMk. "</td>
				<td>" .$nilai. "</td>
			</tr>";

	$sql = "SELECT mkChild.nama FROM MATA_KULIAH mkChild, MATA_KULIAH mkParent WHERE mkParent.prasyarat=mkChild.kode AND mkParent.kode='" .$kodeMkParent. "'";
	$result = pg_query($conn, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	if (pg_num_rows($result) != 0) {
		$field = pg_fetch_array($result);
		$namaMkChild = $field[0];
		$dataAkademis = $dataAkademis .
			"<tr>
				<td>Prasyarat1: " .$namaMkChild. "</td>
			</tr></table>";
	}
	else
		$dataAkademis = $dataAkademis . "</table>";

	if($role == "DOSEN"){
		if($status != '2'){
			$ket = "<p>Silahkan klik tombol <strong>Rekomendasikan</strong> jika ingin memilih <strong>" .$nama. "</strong> sebagai Asisten, Administrator akan menerima lamaran mahasiswa tersebut jika mahasiswa tersebut jika beban jam kerja yang dimiliki oleh mahasiswa tersebut masih memadai</p>
			<form method='POST' action='detailPelamar.php?npm=" .$npm. "&idLam=" .$idLamaran. "'><input type='submit' name='rekomendasi' value='Rekomendasi'/></form>";
		}
		else{
			$ket = "<h3>Sudah direkomendasikan</h3>";
		}
	}
	elseif($role == "ADMIN"){
		if($status != '3'){
			$ket = "<p>Silahkan klik tombol <strong>Terima</strong> jika ingin memilih <strong>" .$nama. "</strong> sebagai Asisten. Pastikan beban jam kerja yang dimiliki oleh mahasiswa tersebut masih memadai</p>
			<form method='POST' action='detailPelamar.php?npm=" .$npm. "&idLam=" .$idLamaran. "'><input type='submit' name='terima' value='Terima'/></form>";
		}
		// Dari Daftar Pelamar, Seharusnya sudah tidak ada yang statusnya "diterima"
		else{
			$ket = "<h3>Sudah diterima</h3>";
		}
	}

	$test = "";
	if(isset($_POST["rekomendasi"])){
		if ($_POST["rekomendasi"] != null) {
			$test = "Masuk Rekomendasi";
			$sql = "UPDATE LAMARAN SET id_st_lamaran='2' WHERE npm='" .$npm. "' AND idlamaran='" .$idLamaran. "'";
			$result = pg_query($conn, $sql);
			if (!$result) {
				die("Error in SQL query: " . pg_last_error());
			}
			else {
				$ket = "<h3>Recomended</h3>";
			}
		}
	}
	if(isset($_POST["terima"])){
		if ($_POST["terima"] != null) {
			$test = "Masuk Terima";
			$sql = "UPDATE LAMARAN SET id_st_lamaran='3' WHERE npm='" .$npm. "' AND idlamaran='" .$idLamaran. "'";
			$result = pg_query($conn, $sql);
			if (!$result) {
				die("Error in SQL query: " . pg_last_error());
			}
			else {
				$ket = "<h3>Diterima</h3>";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
		<title>Detail Pelamar</title>
	</head>

	<body>
		<div id="maintitle">
			<h1>Detail Pelamar</h1>
		</div>
		<?php echo $dataPelamar; ?>

		<div id="maintitle">
			<h1>Riwayat Akademis</h1>
		</div>
		<?php echo $dataAkademis; ?>
		<?php echo $ket; ?>
		<?php echo $test; ?>
	</body>
</html>