<?php 
session_start();

if (isset($_SESSION['id'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<style>
   
</style>

	<body>
		<header>
			<div class="container">
				<h2>PHP-Quiz</h2>
				<a href="userhome.php" class="start">Home</a>
				<a href="contact/index.php" class="start">Feedback</a>
				<a href="viewresult.php" class="start">Result</a>
				<a href="Survey/Servey.php" class="start">Survey</a>
				<a href="exit.php" class="start">Logout</a>

			</div>
		</header>

		<main>
			<div class="container">
				<h2>Welcome <?php  { echo $_SESSION['email']; }; ?> </h2>	
                  <h3> Your ID Is :	<?php  { echo $_SESSION['id']; }; ?> </h3>
                  				  
				<div>
                  <h3>Php quiz</h3>
                     <p>Here is a Free PHP MCQ online test for exam preparation that will help you enhance your basic knowledge of PHP. 
					 This PHP mock test contains 10 PHP MCQ questions and answers with 1 mark each. You can select only 1 answer from the given options. 
					 Complete this free PHP MCQ Quiz for your practice.</p>
					 </div><br>
				<a href="home.php" class="start">Play Now</a>
				</div>
				</main>
                
				</body>
				</html>
          
				<?php } 
				else {
				header("location: ../index.php");
				}
				?>