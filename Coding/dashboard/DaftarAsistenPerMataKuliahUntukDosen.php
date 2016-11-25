<?php
	session_start();
	include "../navbar.php";
	require "../database.php";
?>
<html>
	<title> Log Asistensi </title>
	<head> 
		<style>
			table, th, td {
				border: 1px solid black;
			}
		</style>
		<h1> Log Asistensi Per Mata Kuliah </h> 
	</head>
	
	<body>
		<table style="width:100%">
  			<tr>
    			<th>No</th>
    			<th>Nama Asisten</th> 
    			<th>Log Asisten</th>
  			</tr>
			<tr>
				<td>1</td>
				<td>Muhammad Irfan</td>
				<td><u>lihat Log Asisten</u></td>
			</tr>
			<tr>
				<td>2</td>
				<td>Ihsan Naufal Ardanto</td>
				<td><u>lihat Log Asisten</u></td>
			</tr>
			<tr>
				<td>3</td>
				<td>Filza Valorisantyo</td>
				<td><u>lihat Log Asisten</u></td>
			</tr>
		</table>
	</body>
</html>
		