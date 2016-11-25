<?php
	$username = $_SESSION['username'];
	$role = $_SESSION["role"];
	$nama = $_SESSION["nama"];
	$roleString = "";
	$roleFunctions = "";
	$roleIdentity = "";
	if ($role == "MHS") {
		$roleString = "MAHASISWA";
		$roleFunctions = $roleFunctions . "<li><a href='lowongan.php'>Lowongan</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='melihatLamaran.php'>Lamaran</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='daftarLog.php'>Log</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='buatLog.php'>Buat Log</a></li>";
		$roleIdentity = $roleIdentity . "<li><a href='profile.php'>$nama</a></li>";
	}
	elseif ($role == "DOSEN") {
		$roleString = "DOSEN";
		$roleFunctions = $roleFunctions . "<li><a href='lowongan.php'>Lowongan</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='bukaLowongan.php'>Buka Lowongan</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='melihatLamaran.php'>Daftar Pelamar</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='detailPelamar.php'>Detail Pelamar</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='log.php'>Log</a></li>";
	}
	elseif ($role == "ADMIN") {
		$roleString = "ADMIN";
		$roleFunctions = $roleFunctions . "<li><a href='lowongan.php'>Lowongan</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='bukaLowongan.php'>Buka Lowongan</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='melihatLamaran.php'>Daftar Pelamar</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='detailPelamar.php'>Detail Pelamar</a></li>";
		$roleFunctions = $roleFunctions . "<li><a href='log.php'>Log</a></li>";
	}
	$roleIdentity = $roleIdentity . "<li><a href=#>Logged in as: $roleString</a></li>";
?>


<div>
	<div>
		<a class="navbar-brand" href="#">SIAsisten</a>
	</div>
	<ul>
		<?php echo $roleFunctions; ?>
	</ul>
	<ul>
		<?php echo $roleIdentity; ?>
		<li><a href="../logout.php">Logout</a></li>
	</ul>
</div>