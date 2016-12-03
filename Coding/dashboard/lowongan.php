<?php
	$GLOBALS['resp'] = '';
	session_start();
	if(!isset($_SESSION["userlogin"])){
		header('index.php');
	}
	
	if(isset($_SESSION["role"])){
		$GLOBALS['role'] = $_SESSION["role"]; 
	}
	include "../navbar.php";
?>

<html>
	<head>
		<title>Daftar Lowongan Asisten</title>
	</head>
	
	<body>
		<h1>Daftar Lowongan Asisten</h1>
		<font color ='red'>
			<?php 
				if($GLOBALS['role'] == "MHS")
					echo "Mahasiswa";
				else if($GLOBALS['role'] == "ADMIN")
					echo "Admin";
				else if($GLOBALS['role'] == "DOSEN")
					echo "Dosen";
			?>
		</font>
		<?php
			if($GLOBALS['role'] != "MHS")
				echo "<form action='bukaLowongan.php'>
						<input type='submit' value='Tambah'>
					  </form> ";
		?>
		<table>
			<tr>
				<th>Kode</th>
				<th>Mata Kuliah</th>
				<th>Dosen Pengajar</th>
				<th>Status</th>
				<th>Jumlah Lowongan</th>
				<th>Jumlah Pelamar</th>
				<th>Jumlah Pelamar Diterima</th>
				
				<?php 
				if($GLOBALS['role'] == "MHS")
					echo "<th>Status Lamaran</th>";
				?>
				<th>Action</th>
			</tr>

		<?php
		
			require "../database.php";
			$conn = connectDB();
			
			if(isset($_GET['page']))
				$curpage = $_GET['page'] - 1;
			else
				$curpage = 0;
			
			$curpage = $curpage * 10;
			
			if($GLOBALS['role'] == "ADMIN"){
				$sql = "SELECT * 
						FROM lowongan,Mata_kuliah,KELAS_MK
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
							  KELAS_MK.kode_mk = Mata_kuliah.kode
						ORDER BY Mata_kuliah.nama OFFSET '".$curpage."' LIMIT 10";
						
			}
			
			else if ($GLOBALS['role'] == "DOSEN"){
				
				$sql = "SELECT nip FROM dosen WHERE dosen.username = '".$GLOBALS['username']."'";
				$result = pg_query($conn, $sql);
				if (pg_num_rows($result) != 0){
					$field = pg_fetch_array($result);
					$nip = $field[0];
				}
				
				$sql = "SELECT distinct(idlowongan), mata_kuliah.nama, KELAS_MK.kode_mk,lowongan.idkelasmk,lowongan.status,lowongan.jumlah_asisten,
						lowongan.jumlah_pelamar,lowongan.jumlah_pelamar_diterima
						FROM lowongan,Mata_kuliah,KELAS_MK,dosen_kelas_mk
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
						      KELAS_MK.kode_mk = Mata_kuliah.kode AND
							  dosen_kelas_mk.idkelasMK = lowongan.idkelasMK AND
							  (lowongan.nipdosenpembuka = '".$nip."' OR dosen_kelas_mk.nip = '".$nip."' )
							 
						ORDER BY Mata_kuliah.nama OFFSET '".$curpage."' LIMIT 10";
					
		
			}
			
			else if ($GLOBALS['role'] == "MHS"){
				
				$sql = "SELECT npm FROM mahasiswa WHERE mahasiswa.username = '".$GLOBALS['username']."'";
				$result = pg_query($conn, $sql);
				if (pg_num_rows($result) != 0){
					$field = pg_fetch_array($result);
					$npm = $field[0];
				}
				
				$sql = "SELECT idlowongan, mata_kuliah.nama, KELAS_MK.kode_mk,lowongan.idkelasmk,lowongan.status,lowongan.jumlah_asisten,
						lowongan.jumlah_pelamar,lowongan.jumlah_pelamar_diterima
						FROM lowongan,Mata_kuliah,KELAS_MK,term
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
							  KELAS_MK.kode_mk = Mata_kuliah.kode AND
							  kelas_mk.tahun = term.tahun AND
							  kelas_mk.semester = term.semester AND
							  term.tahun = '2016' AND
							  term.semester = '2' AND
							  lowongan.status = 't' 
							  
						UNION
						
						SELECT lowongan.idlowongan, mata_kuliah.nama, KELAS_MK.kode_mk,lowongan.idkelasmk,lowongan.status,lowongan.jumlah_asisten,
						lowongan.jumlah_pelamar,lowongan.jumlah_pelamar_diterima
						FROM lowongan,Mata_kuliah,KELAS_MK,term,lamaran
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
							  KELAS_MK.kode_mk = Mata_kuliah.kode AND
							  kelas_mk.tahun = term.tahun AND
							  kelas_mk.semester = term.semester AND
							  lamaran.idlowongan = lowongan.idlowongan AND
							  lamaran.npm = '".$npm."'
							 
						 ORDER BY nama OFFSET '".$curpage."' LIMIT 10";
			}
			
			$result = pg_query($conn, $sql);
			
			if (pg_num_rows($result) > 0) {
				
				$numrow = pg_num_rows($result);
				
				while($row = pg_fetch_assoc($result)) {
					
					$kode = $row['kode_mk'];
					$matakuliah = $row['nama'];
					
					echo "<tr>";
					echo "<td>".$kode."</td>";
					echo "<td>".$matakuliah."</td>";
					echo "<td>";
					
					$sql = "SELECT nama 
							FROM dosen, dosen_kelas_mk, lowongan, kelas_mk
							WHERE dosen.nip = dosen_kelas_mk.nip AND 
								  lowongan.idlowongan = '".$row['idlowongan']."' AND
								  kelas_mk.idkelasMK = lowongan.idkelasMK AND
								  dosen_kelas_mk.idkelasMK = kelas_mk.idkelasMK";
								  
					$result1 = pg_query($conn, $sql);
					if (pg_num_rows($result1) != 0){
						$x = 0;
						while($dosen = pg_fetch_assoc($result1)){
							echo $dosen['nama'];
							if($x != pg_num_rows($result1) - 1)
								echo ", ";
							$x++;
						}
					}
					echo "</td>";
					if($row['status'] == 't')
						echo "<td>Dibuka</td>";
					else
						echo "<td>Belum dibuka / Sudah ditutup</td>";
					echo "<td>".$row['jumlah_asisten']."</td>";
					
					
					if($GLOBALS['role'] != "MHS")
						echo "<td><a href='melihatLamaran'>".$row['jumlah_pelamar']. "</a></td>";
					else 
						echo "<td>".$row['jumlah_pelamar']. "</td>";
					
					
					
					echo "<td>" .$row['jumlah_pelamar_diterima']."</td>";
					
					
					if($GLOBALS['role'] == "MHS")
					{
						$sql = "SELECT status 
							FROM lamaran,status_lamaran
							WHERE lamaran.idlowongan = '".$row['idlowongan']."' AND
								  lamaran.id_st_lamaran = status_lamaran.id AND
								  lamaran.npm = '".$npm."'";
						
						$result1 = pg_query($conn, $sql);
						
						$status = null;
						
						if (pg_num_rows($result1) != 0){
							$field = pg_fetch_array($result1);
							$status = $field[0];
						}
						if (!isset($status))
							echo "<td></td>";
						else
							echo "<td>$status</td>";
						
						if(!isset($status) || $status == "DIREKOMENDASIKAN")
							echo "<td><form action='membuatLamaran.php'> <input type='submit' value='Daftar'></form><td>";
						else if($status == "MELAMAR")
							echo "<td><button onclick='batal()'>Batal</button></td>";
				
					}	
					else 
						echo "<td><button>Edit</button><button>Delete</button></td>";
					echo "</tr>";
				}
			} 
		?>
		
		<script>
			function batal() {
				
				var r = confirm("Apakah anda yakin untuk membatalkan lamaran?");
				if (r == true) {
				} else {
				}
			}
		</script>
		</table>
		<?php
			if($GLOBALS['role'] == "ADMIN"){
				$sql = "SELECT * 
						FROM lowongan,Mata_kuliah,KELAS_MK
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
							  KELAS_MK.kode_mk = Mata_kuliah.kode";
			}
			
			else if ($GLOBALS['role'] == "DOSEN"){
				
				$sql = "SELECT nip FROM dosen WHERE dosen.username = '".$GLOBALS['username']."'";
				$result = pg_query($conn, $sql);
				if (pg_num_rows($result) != 0){
					$field = pg_fetch_array($result);
					$nip = $field[0];
				}
				
				$sql = "SELECT distinct(idlowongan), mata_kuliah.nama, KELAS_MK.kode_mk,lowongan.idkelasmk,lowongan.status,lowongan.jumlah_asisten
						FROM lowongan,Mata_kuliah,KELAS_MK,dosen_kelas_mk
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
						      KELAS_MK.kode_mk = Mata_kuliah.kode AND
							  dosen_kelas_mk.idkelasMK = lowongan.idkelasMK AND
							  (lowongan.nipdosenpembuka = '".$nip."' OR dosen_kelas_mk.nip = '".$nip."' )";
			}
			
			else if ($GLOBALS['role'] == "MHS"){
				
				$sql = "SELECT npm FROM mahasiswa WHERE mahasiswa.username = '".$GLOBALS['username']."'";
				$result = pg_query($conn, $sql);
				if (pg_num_rows($result) != 0){
					$field = pg_fetch_array($result);
					$npm = $field[0];
				}
				
				$sql = "SELECT idlowongan, mata_kuliah.nama, KELAS_MK.kode_mk,lowongan.idkelasmk,lowongan.status,lowongan.jumlah_asisten
						FROM lowongan,Mata_kuliah,KELAS_MK,term
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
							  KELAS_MK.kode_mk = Mata_kuliah.kode AND
							  kelas_mk.tahun = term.tahun AND
							  kelas_mk.semester = term.semester AND
							  term.tahun = '2016' AND
							  term.semester = '2' AND
							  lowongan.status = 't' 
							  
						UNION
						
						SELECT lowongan.idlowongan, mata_kuliah.nama, KELAS_MK.kode_mk,lowongan.idkelasmk,lowongan.status,lowongan.jumlah_asisten
						FROM lowongan,Mata_kuliah,KELAS_MK,term,lamaran
						WHERE lowongan.idkelasMK = KELAS_MK.idkelasMK AND
							  KELAS_MK.kode_mk = Mata_kuliah.kode AND
							  kelas_mk.tahun = term.tahun AND
							  kelas_mk.semester = term.semester AND
							  lamaran.idlowongan = lowongan.idlowongan AND
							  lamaran.npm = '".$npm."'";
			}
				
			$result = pg_query($conn, $sql);
			
			if (pg_num_rows($result) > 0) 
				$numrow = pg_num_rows($result);
			
			for($i = 1; $i <= $numrow+10 ; $i++){
				if($i % 10 == 0){
					$x = $i/10;
					echo "<a href = 'lowongan.php?page=$x'> $x </a>";
				}
			}
		?>
		
	</body>

</html>