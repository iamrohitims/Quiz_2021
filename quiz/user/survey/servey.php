<?php
         
        $conn = mysqli_connect("localhost", "root", "", "quiz");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
 ?>         
 <?php     // Taking all 5 values from the form data(input)
        session_start();
		if(isset($_POST['submit'])){
		$survey_id = $_SESSION['id'];
        $name =  $_POST['name'];
        $email = $_POST['email'];
        $age =  $_POST['age'];
        $satisfaction = $_POST['satisfied'];
        $quiz_used = $_POST['quiz_used'];
		$quiz_like = $_POST['qlevel'];
		$quiz_want = $_POST['que_want'];
		$user_sug = $_POST['suggest'];
		     
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO user_survey  VALUES ('$survey_id','$name', 
            '$email','$age','$satisfaction','$quiz_used','$quiz_like','$quiz_want','$user_sug')";
			
		if(mysqli_query($conn, $sql)){
            echo "<script>alert('Response Added successfully !!! Thanks'); </script>";
			$msg = 'Response has been Recorded';
        }
		else{
            echo "<script>alert('Oops You Have Alredy Given A Response!!!'); </script> " ;
			$msg = 'Oops You Have Alredy Given A Response!!!';
        }
		
		}
        mysqli_close($conn);
        ?>
<!DOCTYPE html>
<html>

   <head>
        <title>PHP-Quiz</title>
		<link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="Survey Form.css">
   </head>

   <body>
      <header>
			<div class="container">
				<h2>PHP-Quiz</h2>
				<a href="../userhome.php" class="start">Home</a>
				<a href="../contact/index.php" class="start">Feedback</a>
				<a href="../viewresult.php" class="start">Result</a>
				<a href="Servey.php" class="start">Survey</a>
				<a href="../exit.php" class="start">Logout</a>

			</div>
		</header>
	
     <h1 id="title" ><u>Player Satisfaction Survey</u></h1>
     <p id="description" style="background:black; color:white; padding: 5px">Let us know how we can improve our Quiz<p>
     <br>
   <?php
          if(isset($msg)) {
            echo'<p>'.$msg.'</p>';
      }
	  ?>
<form id="survey-form" method="post" action="servey.php">
  <div class="row-tab">
    <div class="label-detail">
    <label id="name-label"> Name: </label>
    </div>
    <div class="input-detail">
      <input id="name" type="text" name="name" placeholder="Name" required>
    </div>
  </div>
  <div class="row-tab">
    <div class="label-detail">
    <label id="email-label"> Email: </label>
    </div>
    <div class="input-detail">
      <input id="email" type="email" name="email" value="<?php  { echo $_SESSION['email']; }; ?>" placeholder="Email" required>
    </div>
  </div>
   <div class="row-tab">
    <div class="label-detail">
    <label id="number-label"> Age: </label>
    </div>
    <div class="input-detail">
      <input id="number" type="number" name="age" placeholder="Age" min="15" max="60">
    </div>
  </div>
  <div class="row-tab">
    <div class="label-select">
      <label> How satisfied were you with our Quiz today? </label>
    </div>
    <div class="select-input">
      <select id="dropdown" name="satisfied">
  <option value="very satisfied">Very Satisfied</option>
  <option value="satisfied">Satisfied</option>
  <option value="not satisfied">Not Satisfied</option>
</select>
    </div>
  </div>
  <div class="row-tab">
     <fieldset>
        <legend> Is this the first time you have used our Quiz? </legend>
         <label for="Yes"><input type="radio" name="quiz_used" required value="Yes"> Yes</label>
         <label for="No"><input type="radio" name="quiz_used" required value="No"> No</label>
      </fieldset>
  </div>
    <div class="row-tab">
       <fieldset>
    <legend>Quiz Level you like:</legend>
    <div class="control">
      <input id="High" type="radio" name="qlevel" value="High" /><label for="High">High </label>
    </div>
    <div class="control">
      <input id="medium" type="radio" name="qlevel" value="Medium" /><label for="Medium">Medium</label>
    </div>
    <div class="control">
      <input id="low" type="radio" name="qlevel" value="Low" /><label for="Low">Low</label>
    </div>
  </fieldset>
  <fieldset>
    <legend>Quiz Question you want on:</legend>
    <div class="control">
      <input id="Tech" type="radio" name="que_want" value="Tech" /><label for="Tech">Tech </label>
    </div>
    <div class="control">
      <input id="Science" type="radio" name="que_want" value="Science" /><label for="Science">Science</label>
    </div>
    <div class="control">
      <input id="Current Affairs" type="radio" name="que_want" value="Current Affairs" /><label for="Current Affairs">Current Affairs</label>
    </div>
  </fieldset>
    </div>
    <div class="row-tab">
      <div class="textarea-label">
      <label>Any Comments or Suggestions?</label>
      </div>
      <div class="textarea-box">
      <textarea id="box" rows="5" columns="10" name="suggest" placeholder="Enter your comments and suggestions here....."></textarea>
      </div>
    </div>
    <div class="row-tab">
      <button type="submit" name="submit" id="submit">Submit</button>
    </div>
</form>
      
	
</body>
</html>