<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$10$8WkSLFcoaqhJUJoqjg3K8eWixJWswsICf7FTxehKmx8hpmIKYWqju';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
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
				<a href="../index.php" class="start">Home</a>

			</div>
		</header>

		<main>
		<div class="container">
				<h2>Enter Password</h2>
				<form method="POST" action="">
				<input type="password" name="password" required="" >
				<input type="submit" name="submit" value="Send"> 

			</div>


		</main>

		<footer>
			<div class="container">
				Copyright @ PHP-Quiz
			</div>
		</footer>

	</body>
</html>