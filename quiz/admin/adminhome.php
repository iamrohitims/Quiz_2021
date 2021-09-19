<?php 
session_start();

if (isset($_SESSION['admin'])) {
?>




<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<style>
	div.c {
  float: center;
  white-space: nowrap; 
  width: 200px;
  height: 200px;
  text-align: center;
  color: blue;
  overflow: hidden;
  text-overflow: "----"; 
  border: dotted;
  border-radius: 50px;
 
}
 
h3 {
  text-shadow: 2px 2px #FF0000;
  align: center;
}
</style>

	<body>
		<header>
			<div class="container">
				<h1>PHP-Quiz</h1>
				<a href="adminhome.php" class="start">Home</a>
				<a href="add.php" class="start">Add Question</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="players.php" class="start">Players</a>
				<a href="feedback.php" class="start">Feedback</a>
				<a href="viewsurvey.php" class="start">Survey</a>
				<a href="exit.php" class="start">Logout</a>

			</div>
		</header>

		<main>
			<div class="container">
				<h2>Welcome back, Admin</h2>
				<div class="c"> <img src="rohit.jpg" alt="Rohit Kumar" height="200px" width="200px"></div>
				<h3> &nbsp &nbsp &nbsp &nbsp &nbsp Rohit Kumar </h3>
				<textarea resize>Resize me to know about Admin! 🎇
				
				
				
				I'm Rohit , a tea lover ☕, 20-something-year-old front-end web developer 💻 with a strong educational background in Information Technology. I am doing freelance work 🚀 based in India.
                I started creating cool web designs using HTML and CSS back in 2016. I am a JavaScript enthusiast and extremely passionate about coding.
                I love to learn new things every day and keep up with the new technologies. In many ways, websites are my first love 💙
				</textarea>
				
				</div>
				
				
				</main>
                
				</body>
				</html>
          
				<?php } 
				else {
				header("location: admin.php");
				}
				?>