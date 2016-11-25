<?php
	session_start();
	
	// Setup db connection
	require "database.php";
	
	// Simpan session ketika login valid
	$resp = "";
	if(isset($_POST["username"])){
		if(login($_POST["username"], $_POST["password"])){
			$resp = "login success";	
			$_SESSION["userlogin"] = $_POST["username"];
		} else {
			$resp = "invalid login";
		}
	}
	
	// Redirect ke dashboard.php ketika session masih ada
	if (isset($_SESSION["userlogin"])) {
		header("Location: dashboard.php");
	}
	
	// Fungsi login
	function login($user, $pass){		
		$conn = connectDB();
		//   query the database to return username and password existence
		$sqlMhs = "SELECT username, password, nama FROM MAHASISWA WHERE username='$user' and password='$pass'";
		$sqlDosen = "SELECT username, password FROM DOSEN WHERE username='$user' and password='$pass'";
		$resultMhs = pg_query($conn, $sqlMhs);
		$resultDosen = pg_query($conn, $sqlDosen);
		if (!$resultMhs OR !$resultDosen) {
			die("Error in SQL query: " . pg_last_error());
		}
		
		$success = false;
		if (pg_num_rows($resultMhs) != 0) {
			$field = pg_fetch_array($resultMhs);
			$_SESSION["username"] = $user;
			$_SESSION["role"] = "MHS";
			$_SESSION["nama"] = $field[2];
			$success = true;
		}
		
		if (pg_num_rows($resultDosen) != 0) {
			$field = pg_fetch_array($resultDosen);
			$_SESSION["username"] = $user;
			$_SESSION["role"] = "DOSEN";
			$_SESSION["nama"] = $field[2];
			$success = true;
		}
		
		pg_close($conn);
		return $success;		
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIAsisten Fasilkom UI</title>
	</head>

	<body>
		<div id="maintitle">
			<h1>SIAsisten</h1>
		</div>

		<div id="loginform">
			<form method="POST" action="index.php">
			<h2>Login Panel</h2>
			<input type="text" name="username" placeholder="username"/>
			<input type="password" name="password" placeholder="password"/>
			<button>Submit</button>
			</form>
			<?php echo $resp; ?>
		</div>
		
	</body>
</html>