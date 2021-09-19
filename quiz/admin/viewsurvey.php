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

	<body>
		<header>
			<div class="container">
				<h1>PHP-Quiz</h1>
				<a href="../index.php" class="start">Home</a>
				<a href="add.php" class="start">Add Question</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="players.php" class="start">Players</a>
				<a href="feedback.php" class="start">Feedback</a>
				<a href="surveyview.php" class="start">Survey</a>
				<a href="exit.php" class="start">Logout</a>
				
			</div>
		</header>

		
	<h1> All Survey's</h1>
	<table class="data-table">
		<caption class="title">All Quiz Survey's</caption>
		<thead>
			<tr>
				<th>Survey_id</th>
				<th>user_name</th>
				<th>User_email</th>
				<th>Age</th>
				<th>Satisfaction</th>
				<th>First_Time_visitor</th>
				<th>Question_Level?</th>
				<th>Question_want?</th>
				<th>Suggestion?</th>
			</tr>
		</thead>
		<tbody>
        
        <?php 
            
            $query = "SELECT * FROM user_survey ORDER BY survey_id DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
               $survey_id = $row['survey_id'];
               $name =  $row['name'];
               $email = $row['email'];
               $age =  $row['age'];
               $satisfaction = $row['satisfaction'];
               $quiz_used = $row['quiz_used'];
		       $quiz_like = $row['quiz_like'];
		       $quiz_want = $row['que_want'];
		       $user_sug = $row['user_sug'];
              
                echo "<tr>";
                echo "<td>$survey_id</td>";
                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo "<td>$age</td>";
                echo "<td>$satisfaction</td>";
				echo "<td>$quiz_used</td>";
				echo "<td>$quiz_like</td>";
				echo "<td>$quiz_want</td>";
				echo "<td>$user_sug</td>";
                
                
              
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


