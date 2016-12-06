<?php
function connectDB(){
	$conn_string = "host=dbpg.cs.ui.ac.id dbname=siasisten user=a06 password=NRgdz7";
	$conn = pg_connect($conn_string);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . pg_last_error());
	}

	$sql = "SET search_path TO siasisten";
	$result = pg_query($conn, $sql);
	if (!$result) {
		die("Error in SQL query: " . pg_last_error());
	}   
	
	return $conn;
}
?>
