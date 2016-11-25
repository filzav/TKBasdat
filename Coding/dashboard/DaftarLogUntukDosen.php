
<!DOCTYPE html>
<html>
	<head>
		<style>
			table, th, td {
				border: 1px solid black;
			}
		</style>
		<title>Buat Log</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h2>Buat Log</h2> <br>
		<br>
		<table style="width: 50%">
			<tr>
				<td><b>Term</b></td>
				<td>Ganjil,2016</td>
			</tr>
			<tr>
				<td><b>Mata Kuliah</b></td>
				<td>CS1234 Basis Data Lanjut</td>
			</tr>
			<tr>
				<td><b>Nama</b></td>
				<td>Ihsan Naufal Ardanto</td>
			</tr>
		</table>
		
		<table style="width:100%">
  			<tr>
    			<th>NPM</th>
    			<th>Nama</th> 
    			<th>Durasi</th>
    			<th>Kategori</th>
    			<th>Tanggal</th>
    			<th>Jam Mulai</th>
				<th>Jam Selesai</th>
  				<th>Deskripsi Kerja</th>
				<th>Status</th>
				<th></th>
			</tr>
			<tr>
				<td>1406576641</td>
				<td>Ihsan</td>
				<td>2</td>
				<td>Mengoreksi</td>
				<td>12-10-2016</td>
				<td>08:00</td>
				<td>10:00</td>
				<td>PR 3</td>
				<td>Dilaporkan</td>
				<td>
					<button type="submit" name="action" value="save">setujui</button>
					<button type="submit" name="action" value="save">tolak</button>
				</td>
			</tr>
			<tr>
				<td>1406576641</td>
				<td>Ihsan</td>
				<td>2</td>
				<td>Mengawas</td>
				<td>21-12-2016</td>
				<td>13:00</td>
				<td>15:00</td>
				<td>UAS</td>
				<td>Disetujui</td>
				<td>
					<button type="submit" name="action" value="save">batal</button>
				</td>
			</tr>
			<tr>
				<td>1406576641</td>
				<td>Ihsan</td>
				<td>2</td>
				<td>Mengoreksi</td>
				<td>10-09-2016</td>
				<td>13:00</td>
				<td>15:00</td>
				<td>Tugas 1</td>
				<td>Dilaporkan</td>
				<td>
					<button type="submit" name="action" value="save">setujui</button>
					<button type="submit" name="action" value="save">tolak</button>
				</td>
			</tr>
			<tr>
				<td>1406576641</td>
				<td>Irfan</td>
				<td>3</td>
				<td>Mengoreksi</td>
				<td>22-10-2016</td>
				<td>11:00</td>
				<td>14:00</td>
				<td>Tugas 2</td>
				<td>-</td>
				<td>
					<button type="submit" name="action" value="save">setujui</button>
					<button type="submit" name="action" value="save">tolak</button>
				</td>
			</tr>
			<tr>
				<td>1406576641</td>
				<td>Irfan</td>
				<td>2</td>
				<td>Mengoreksi</td>
				<td>12-10-2016</td>
				<td>08:00</td>
				<td>11:00</td>
				<td>Tugas 3</td>
				<td>Disetujui</td>
				<td>
					<button type="submit" name="action" value="save">batal</button>
				</td>
			</tr>
		</table>
		
	</body>
</html>