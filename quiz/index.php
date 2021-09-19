<?php
session_start();
include "connection.php";
?>
<?php 
if (isset($_SESSION['id'])) {
	header("location: user/home.php");
}
?>
<?php
        //to check existing Email And Update
if (isset($_POST['email'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
$name=mysqli_real_escape_string($conn , $_POST['name']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from users WHERE email = '$email'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE users SET played_on = '$played_on' , name = '$name' WHERE email = '$email' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
			
		header("location: user/userhome.php");
	}
    // if not found existing then create new one 
	else {
		
		$played_on = date('Y-m-d H:i:s');
	$query = "INSERT INTO users(email,name,played_on) VALUES ('$email','$name','$played_on')";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "SELECT * FROM users WHERE email = '$email' ";
		$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
		if (mysqli_num_rows($run2) > 0) {
			$row = mysqli_fetch_array($run2);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
			header("location: user/userhome.php");
		}
}
	else {
		echo "<script> alert('something is wrong'); </script>";
	}
}
}
else {
	echo "<script> alert('Invalid Email'); </script>";
}
}



?>
<html>
	<head>
		<title>PHP-Quiz</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-Quiz</h1>
				<a href="index.php" class="start">Home</a>
				<a href="admin/admin.php" class="start">Admin Panel</a>

			</div>
		</header>

		<main>
		<div class="container">
				<h2>Enter Your Details:</h2>
				<form method="POST" action="">
				<label> Name:
				<input type="text" name="name" placeholder="Enter Full Name..." required="" >
				</label> <br><br>
				<label> Email:
				<input type="email" name="email" placeholder="Enter Your Email..."required="" >
				</label> <br><br>
				<input type="submit" name="submit" value="PLAY NOW">

			</div>


		</main>

		<footer>
			<div class="container">
				Made With 💙 By Rohit & Somnath 
			</div>
		</footer>

	</body>
</html>