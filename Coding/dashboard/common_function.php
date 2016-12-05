<?php

	function getNPM($username){
		$conn = connectDB();
		$sql = "SELECT * FROM mahasiswa WHERE username='$username'" ;
		$result = pg_query($conn, $sql);
		$user_arr= pg_fetch_array($result);
		return $user_arr['npm'];
	}

	function getDataMahasiswaByNPM($npm){
		$conn = connectDB();
		$sql = "SELECT * FROM mahasiswa WHERE npm='$npm'" ;
		$result = pg_query($conn, $sql);
		$user_arr= pg_fetch_array($result);
		return $user_arr;
	}

	function getStatus($i){
		$conn = connectDB();
		$sql = "SELECT * FROM status_lamaran WHERE id=$i" ;
		$result = pg_query($conn, $sql);
		$user_arr= pg_fetch_array($result);
		return $user_arr['status'];
	}

	function getNamaMK($nama){
		$conn = connectDB();
		$sql = "SELECT * FROM mata_kuliah WHERE nama='$nama'" ;
		$result = pg_query($conn, $sql);
		$user_arr= pg_fetch_array($result);
		return $user_arr['status'];
	}

?>