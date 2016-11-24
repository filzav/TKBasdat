<?php 
	session_start();
	include "../navbar.php";
	require "../database.php";

	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
	$telp = "";
	
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
		$telp = $telp . $row['nomortelepon'] . " ";
	}
	if(isset($_POST["username"])){
		$newPassword = $_POST["password"];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1">
		<title>SIAsisten Fasilkom UI</title>
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
					<td><input type="text" name="password" placeholder="<?php echo $password; ?>"/></td>
				</tr><tr>
					<td>E-mail</td>
					<td><?php echo $email; ?></td>
				</tr><tr>
					<td>E-mail Aktif</td>
					<td><input type="text" name="password" placeholder="<?php echo $emailAktif; ?>"/></td>
				</tr><tr>
					<td>Waktu Kosong</td>
					<td><input type="text" name="password" placeholder="<?php echo $waktuKosong; ?>"/></td>
				</tr><tr>
					<td>No. Telp.</td>
					<td><input type="text" name="password" placeholder="<?php echo $telp; ?>"/></td>
				</tr><tr>
					<td>Bank</td>
					<td><input type="text" name="password" placeholder="<?php echo $bank; ?>"/></td>
				</tr><tr>
					<td>No. Rekening</td>
					<td><input type="text" name="password" placeholder="<?php echo $norek; ?>"/></td>
				</tr><tr>
					<td>Halaman Muka Buku Tabungan (*.jpg)</td>
					<td><input type="text" name="password" placeholder="<?php echo $urlMukatab; ?>"/></td>
				</tr><tr>
					<td>Foto (*.jpg)</td>
					<td><input type="text" name="password" placeholder="<?php echo $urlFoto; ?>"/></td>
				</tr>
			</form>
		</table>
	</body>
</html>