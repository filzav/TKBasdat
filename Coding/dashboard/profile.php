<?php 
	session_start();
	include "../navbar.php";
	require "../database.php";
	if(!isset($_SESSION["username"])){
		header("Location: ../index.php");
	}

	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
	$telp = "";
	$respPass = "";
	$respEmail = "";
	$respWaktu = "";
	$respTelp = "";
	$respBank = "";
	$respNorek = "";
	$respMukatab = "";
	$respFoto = "";
	
	$conn = connectDB();
	$sql = "SELECT * FROM MAHASISWA WHERE username='" . $username . "'";
	$result = pg_query($conn, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}
	if (pg_num_rows($result) != 0) {
		$field = pg_fetch_array($result);
		$npm = $field[0];
		$password = $field[3];
		$email = $field[4];
		$emailAktif = $field[5];
		$waktuKosong = $field[6];
		$bank = $field[7];
		$norek = $field[8];
		$urlMukatab = $field[9];
		$urlFoto = $field[10];
	}
	
	$sql = "SELECT * FROM TELEPON_MAHASISWA WHERE npm='" . $npm . "'";
	$result = pg_query($conn, $sql);
	while($row = pg_fetch_assoc($result)){
		$telp = $telp . $row['nomortelepon'];
	}

	if(isset($_POST["newPassword"]) OR isset($_POST["newEmailAktif"]) OR isset($_POST["newWaktuKosong"]) OR isset($_POST["newNoTelp"]) OR isset($_POST["newBank"]) OR isset($_POST["newNoRek"]) OR isset($_POST["newUrlMukatab"]) OR isset($_POST["newUrlFoto"])){
		if ($_POST["newPassword"] != null) {
			if($_POST["newPassword"] != $password){
				$newPassword = $_POST["newPassword"];
				$sql = "UPDATE MAHASISWA SET password='" .$newPassword."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respPass = "*saved";
			}
			else {
				$respPass = "*Sama dengan Password lama";
			}
		}
		if ($_POST["newEmailAktif"] != null) {
			if($_POST["newEmailAktif"] != $emailAktif){
				$newEmailAktif = $_POST["newEmailAktif"];
				$sql = "UPDATE MAHASISWA SET email_aktif='" .$newEmailAktif."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respEmail = "*saved";
			}
			else {
				$respEmail = "*Sama dengan Email lama";
			}
		}
		if ($_POST["newWaktuKosong"] != null) {
			if($_POST["newWaktuKosong"] != $waktuKosong){
				$newWaktuKosong = $_POST["newWaktuKosong"];
				$sql = "UPDATE MAHASISWA SET waktu_kosong='" .$newWaktuKosong."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respWaktu = "*saved";
			}
			else {
				$respWaktu = "*Sama dengan Waktu Kosong lama";
			}
		}
		if ($_POST["newNoTelp"] != null) {
			if($_POST["newNoTelp"] != $telp){
				$newNoTelp = $_POST["newNoTelp"];
				$sql = "UPDATE TELEPON_MAHASISWA SET nomortelepon='" .$newNoTelp."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respTelp = "*saved";
			}
			else {
				$respTelp = "*Sama dengan Nomor Telepon lama";
			}
		}
		if ($_POST["newBank"] != null) {
			if($_POST["newBank"] != $bank){
				$newBank = $_POST["newBank"];
				$sql = "UPDATE MAHASISWA SET bank='" .$newBank."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respBank = "*saved";
			}
			else {
				$respBank = "*Sama dengan Bank lama";
			}
		}
		if ($_POST["newNoRek"] != null) {
			if($_POST["newNoRek"] != $norek){
				$newNoRek = $_POST["newNoRek"];
				$sql = "UPDATE MAHASISWA SET norekening='" .$newNoRek."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respNorek = "*saved";
			}
			else {
				$respNorek = "*Sama dengan Nomor Rekening lama";
			}
		}
		if ($_POST["newUrlMukatab"] != null) {
			if($_POST["newUrlMukatab"] != $urlMukatab){
				$newUrlMukatab = $_POST["newUrlMukatab"];
				$sql = "UPDATE MAHASISWA SET url_mukatab='" .$newUrlMukatab."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respMukatab = "*saved";
			}
			else {
				$respMukatab = "*Sama dengan url lama";
			}
		}
		if ($_POST["newUrlFoto"] != null) {
			if($_POST["newUrlFoto"] != $urlFoto){
				$newUrlFoto = $_POST["newUrlFoto"];
				$sql = "UPDATE MAHASISWA SET url_foto='" .$newUrlFoto."' WHERE npm='" .$npm. "'";
				$result = pg_query($conn, $sql);
				$respFoto = "*saved";
			}
			else {
				$respFoto = "*Sama dengan url lama";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
		<title>Profile <?php echo $nama; ?></title>
	</head>

	<body>
		<div id="maintitle">
			<h1>Data Profil <?php echo $nama; ?></h1>
		</div>
		<table>
			<form method="POST" action="profile.php">
				<button>Submit</button>
				<tr>
					<td>NPM</td>
					<td><?php echo $npm; ?></td>
				</tr><tr>
					<td>Nama</td>
					<td><?php echo $nama; ?></td>
				</tr><tr>
					<td>Username</td>
					<td><?php echo $username; ?></td>
				</tr><tr>
					<td>Password</td>
					<td><input type="text" name="newPassword" placeholder="<?php echo $password; ?>"/></td>
					<td><?php echo $respPass; ?></td>
				</tr><tr>
					<td>E-mail</td>
					<td><?php echo $email; ?></td>
				</tr><tr>
					<td>E-mail Aktif</td>
					<td><input type="text" name="newEmailAktif" placeholder="<?php echo $emailAktif; ?>"/></td>
					<td><?php echo $respEmail; ?></td>
				</tr><tr>
					<td>Waktu Kosong</td>
					<td><input type="text" name="newWaktuKosong" placeholder="<?php echo $waktuKosong; ?>"/></td>
					<td><?php echo $respWaktu; ?></td>
				</tr><tr>
					<td>No. Telp.</td>
					<td><input type="text" name="newNoTelp" placeholder="<?php echo $telp; ?>"/></td>
					<td><?php echo $respTelp; ?></td>
				</tr><tr>
					<td>Bank</td>
					<td><input type="text" name="newBank" placeholder="<?php echo $bank; ?>"/></td>
					<td><?php echo $respBank; ?></td>
				</tr><tr>
					<td>No. Rekening</td>
					<td><input type="text" name="newNoRek" placeholder="<?php echo $norek; ?>"/></td>
					<td><?php echo $respNorek; ?></td>
				</tr><tr>
					<td>Halaman Muka Buku Tabungan (*.jpg)</td>
					<td><input type="text" name="newUrlMukatab" placeholder="<?php echo $urlMukatab; ?>"/></td>
					<td><?php echo $respMukatab; ?></td>
				</tr><tr>
					<td>Foto (*.jpg)</td>
					<td><input type="text" name="newUrlFoto" placeholder="<?php echo $urlFoto; ?>"/></td>
					<td><?php echo $respFoto; ?></td>
				</tr>
			</form>
		</table>
	</body>
</html>