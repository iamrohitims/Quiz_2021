<?php 
session_start();
include "connection.php";
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
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
				<a href="userhome.php" class="start">Home</a>
				<a href="viewresult.php" class="start">Result</a>
				<a href="contact/index.php" class="start">Feedback</a>
				<a href="exit.php" class="start">Logout</a>
				
			</div>
		</header>
       
		<!--<div class="container">
				<h2>Enter Your Email</h2>
				<form method="POST" action="" target="tar">
				<input type="email" name="email" required="" >
				<input type="submit" name="submit" value="SHOW NOW">

			</div>
           -->

		

	<h1> Quiz Result </h1>
	<table class="data-table">
		<caption class="title">Result Of The User</caption>
		<thead>
			<tr>
				<th>id</th>
				<th>Your_email</th>
				<th>Your_Name</th>
				<th>Played_on</th>
				<th>Score</th>
                <th>Percentage</th>
				<th>Overall</th>
				
			</tr>
		</thead>
		<tbody>
        
        <?php 
               // to get total no of questions  
               $query1 = "SELECT * FROM questions ";
               $run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
               $totalqn = mysqli_num_rows($run);
            /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
             // collect value of input field */
            //taking current email from session 
            $email = $_SESSION['email']; 
               //retriving result data of current email 
            $query = "SELECT * FROM `users` WHERE email = '$email' ";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $id = $row['id'];
                $email = $row['email'];
				$name = $row['name'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                //to get pass/fail
                $grade = $totalqn*0.25;
                if ($score >= $grade ) {
                   $msg = "Pass";
                } else {
                  $msg = "Fail";
                }
                //percentage
				$grade1 = $score/$totalqn*100;
                $per = number_format($grade1, 2);
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
				echo "<td>$name</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score / $totalqn </td>";
                echo "<td><center>$per</center></td>";
				echo "<td><center>$msg</center></td>";
				
                
              
                echo "</tr>";
             }
			
         }
		 else  { 
		      echo "<tr>";
		      echo "<td> Plz Logout And Come Again </td>";
			  echo "<td> Null </td>";
			  echo "<td> Null </td>";
			  echo "<td> Null </td>";
		 }
		/*}*/ 
        ?>
	
	    	</tbody>
     	</table>
	<br>
	<br>
	<center>
	
	        <ol> Note:
			       <li> This Result Is Genrated From Session.</li>
				   <li> Play Quiz And Come Back To See Result Again.</li>
			</ol>	   
   
</body>
</html>