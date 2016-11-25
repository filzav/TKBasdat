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
		<h1>Daftar Lowongan Asisten</h1><font color ='red'><?php echo $GLOBALS['role']?></font>
		<button type="button" onclick="">Tambah</button>
		<table>
			<tr>
				<th>Kode</th>
				<th>Mata Kuliah</th>
				<th>Dosen Pengajar</th>
				<th>Status</th>
				<th>Jumlah Lowongan</th>
				<th>Jumlah Pelamar</th>
				<th>Jumlah Pelamar Diterima</th>
				<th>Action</th>
			</tr>

		<?php
		
			require "../database.php";
			$conn = connectDB();
			
			$sql = "SELECT * FROM lowongan";
			$result = pg_query($conn, $sql);
			
			if (pg_num_rows($result) > 0) {
				while($row = pg_fetch_assoc($result)) {
		
					$sql = "SELECT kode 
							FROM Mata_kuliah  
							where kode IN (Select kode_mk from KELAS_MK where  idkelasMK ='".$row['idkelasmk']."')";
							
					$result1 = pg_query($conn, $sql);
					if (pg_num_rows($result1) != 0){
						$field = pg_fetch_array($result1);
						$kode = $field[0];
					}

					$sql = "SELECT nama 
							FROM Mata_kuliah  
							where kode IN (Select kode_mk from KELAS_MK where  idkelasMK ='".$row['idkelasmk']."')";
							
					$result1 = pg_query($conn, $sql);
					if (pg_num_rows($result1) != 0){
						$field = pg_fetch_array($result1);
						$matakuliah = $field[0];
					}
					
					$sql = "SELECT nama FROM dosen where nip='".$row['nipdosenpembuka']."'";
					$result1 = pg_query($conn, $sql);
					if (pg_num_rows($result1) != 0){
						$field = pg_fetch_array($result1);
						$dosen = $field[0];
					}
					
					echo "<tr>";
					echo "<td>".$kode."</td>";
					echo "<td>".$matakuliah."</td>";
					echo "<td>".$dosen."</td>";

					if($row['status'] == 't')
						echo "<td>diterima</td>";
					else
						echo "<td>ditolak</td>";

					echo "<td>".$row['jumlah_asisten']."</td>";
					echo "<td> 20 </td>";
					echo "<td></td>";
					echo "<td><button>ACTION</button></td>";
					echo "</tr>";
				}
			} 
		?>
		</table>
	</body>

</html>