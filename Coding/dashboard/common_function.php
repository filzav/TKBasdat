<?php

function getNPM($username){
	 	$conn = connectDB();
		 $sql = "SELECT * FROM mahasiswa WHERE username='$username'" ;
		 $result = pg_query($conn, $sql);
		 $user_arr= pg_fetch_array($result);
		 return $user_arr['npm'];
}

?>