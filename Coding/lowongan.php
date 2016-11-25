<?php
	
	$GLOBALS['resp'] = '';
	session_start();
	if(!isset($_SESSION["userlogin"])){
		header('index.php');
	}
	
	if(isset($_SESSION["role"])){
		$GLOBALS['role'] = $_SESSION["role"]; 
	}
		
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
		
			require "database.php";
			$conn = connectDB();
			
			$sql = "SELECT * FROM lowongan";
			$result = $conn-> pg_query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
		
					$sql = "SELECT kode 
							FROM Mata_ kuliah  
							where kode_mk IN (Select kode_mk from KELAS_MK where  idkelasMK ='".$row['idkelasMK']."')";
							
					$kode = $conn-> pg_query($sql);
					
					$sql = "SELECT nama 
							FROM Mata_ kuliah  
							where kode_mk IN (Select kode_mk from KELAS_MK where  idkelasMK ='".$row['idkelasMK']."')";
							
					$matakuliah = $conn-> pg_query($sql);
					
					$sql = "SELECT nama FROM dosen where nip='".$row['nipdosenpembuka']."'";
					$dosen = $conn-> pg_query($sql);
					
					echo "<tr>"
					echo "<td>'".$kode."'</td>";
					echo "<td>'".$matakuliah."'</td>";
					echo "<td>'".$dosen."'</td>";
					echo "<td>'".$row['status']"'</td>";
					echo "<td>'".$row['jumlah_pelamar']"'</td>";
					echo "<td> 20 </td>";
					echo "<td> 0 </td>";
					echo "</tr>"
				}
			} 
		?>
		</table>
	</body>

</html>