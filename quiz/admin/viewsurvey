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
				<a href="exit.php" class="start">Logout</a>
				
			</div>
		</header>

		
	<h1> All Feedback's</h1>
	<table class="data-table">
		<caption class="title">All Quiz Feedback's</caption>
		<thead>
			<tr>
				<th>Contact_id</th>
				<th>User_name</th>
				<th>User_email</th>
				<th>Subject</th>
				<th>Content</th>
			</tr>
		</thead>
		<tbody>
        
        <?php 
            
            $query = "SELECT * FROM tblcontact ORDER BY contact_id DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $contact_id = $row['contact_id'];
                $user_name = $row['user_name'];
                $user_email = $row['user_email'];
                $subject = $row['subject'];
                $content = $row['content'];
              
                echo "<tr>";
                echo "<td>$contact_id</td>";
                echo "<td>$user_name</td>";
                echo "<td>$user_email</td>";
                echo "<td>$subject</td>";
                echo "<td>$content</td>";
                
                
              
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


