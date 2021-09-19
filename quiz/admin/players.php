<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
    
	<head>
		<title>PHP-Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>
     <style>
      blink {
        color: #1c87c9;
        font-size: 20px;
        font-weight: bold;
        font-family: sans-serif;
		position: absolute;
        right: 420px;  
        width: 150px;
        border: 3px solid green;
        animation: animate 
                1.5s linear infinite;
      }
      @keyframes animate {
            0% {
                opacity: 0;
            }
  
            50% {
                opacity: 0.7;
            }
  
            100% {
                opacity: 0;
            }
        }
    </style>
	<body>
		<header>
			<div class="container">
				<h1>PHP-Quiz</h1>
				<a href="../index.php" class="start">Home</a>
				<a href="add.php" class="start">Add Question</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="players.php" class="start">Players</a>
				<a href="feedback.php" class="start">Feedback</a>
                <a href="viewsurvey.php" class="start">Survey</a>
				<a href="exit.php" class="start">Logout</a>
				
			</div>
		</header>
       
		
	<h1> All Players</h1>
	<table class="data-table">
		<caption class="title">All Quiz players</caption>
	     <center>
		 <blink> <a href="search/index.php">Live Search </blink>
		
		<thead>
			<tr>
			<th>Player_Id</th>
			<th>Player_Email</th>
            <th>Player_Name</th>
			<th>Played On</th>
			<th>Score</th>
			</tr>
		</thead>
		<tbody>
	 <?php 
            
            $query = "SELECT * FROM users ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
                $name =$row['name'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$name</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
              
                echo "</tr>";
             }
         }
	  
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>

