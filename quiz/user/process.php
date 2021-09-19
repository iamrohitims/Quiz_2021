<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
   
	if(!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}
    
	if ($_POST) {
        $newtime = time();
    if ( $newtime > $_SESSION['time_up']) {
    echo "<script>alert('time up');
    window.location.href='results.php';</script>";
}
else {
        $_SESSION['start_time'] = $newtime;  // time 
		$qno = $_POST['number'];             // to get the que no. by default (1)
        $_SESSION['quiz'] = $_SESSION['quiz'] + 1; // every time user hits the submit will increse by 1
		$selected_choice = $_POST['choice'];   // choice selected be user 
		$nextqno = $qno+1;  // to change the que
          // to check whether given ans is correct or not
		$query = "SELECT correct_answer FROM questions WHERE qno= '$qno' ";
        $run = mysqli_query($conn , $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($run) > 0 ) {
        	$row = mysqli_fetch_array($run);
        	$correct_answer = $row['correct_answer'];
        } // if given ans is correct then score will be increased by one (1)
        if ($correct_answer == $selected_choice) {
        	$_SESSION['score']++;
        }
          // to check whether all ques are compleated 
        $query1 = "SELECT * FROM questions ";
        $run = mysqli_query($conn , $query1) or die(mysqli_error($conn));
        $totalqn = mysqli_num_rows($run);
          // if yes (true) then it will display the result 
        if ($qno == $totalqn) {
        	header("location: results.php");
        } // else next question will display
        else {
        	header("location: question.php?n=".$nextqno);
        }

    
}
}
else {
    header("location: home.php");
}
}
else {
	header("location: home.php");
}
?>