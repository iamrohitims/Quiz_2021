<?php 
session_start();
include "../connection.php";


?>
<html>
	<head>
		<title>PHP-Quiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="style_contact.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>

<body>	
		<header>
			<div class="container">
				<h1>PHP-Quiz</h1>
				<a href="../userhome.php" class="start">Home</a>
				<a href="index.php" class="start">Feedback</a>
				<a href="../viewresult.php" class="start">Result</a>
				<a href="Survey/Servey.php" class="start">Survey</a>
				<a href="../exit.php" class="start">Logout</a>

			</div>
		</header>
  <main>
		<meta name="viewport" content="width=device-width, initial-scale=1">
   <div class="form-target">
        <form name="frmContact" id="frmContact"  method="post"
            action="" enctype="multipart/form-data"
            onsubmit="return validateContactForm()">

            <div class="input-row">
                <label style="padding-top: 20px;">Name</label> <span
                    id="userName-info" class="info"></span><br /> <input
                    type="text" class="input-field" name="userName"
                    id="userName" />
            </div>
            <div class="input-row">
                <label>Email</label> <span id="userEmail-info"
                    class="info"></span><br /> <input type="text"
                    class="input-field" value="<?php  { echo $_SESSION['email']; }; ?>" name="userEmail" id="userEmail" />
            </div>
            <div class="input-row">
                <label>Subject</label> <span id="subject-info"
                    class="info"></span><br />  
					     <select id="subject" name="subject">
                         <option value="Feedback">Feedback</option>
                         <option value="Complaint">Complaint</option>
                         <option value="Suggestion">Suggestion</option>
                          </select>
                    
                     					
            </div>
            <div class="input-row">
                <label>Message</label> <span id="userMessage-info"
                    class="info"></span><br />
                <textarea name="content" id="content"
                    class="input-field" cols="60" rows="6"></textarea>
            </div>
            <div>
                <input type="submit" name="send" class="btn-submit"
                    value="Send" />

                <div id="statusMessage"> 
                        <?php
                        if (! empty($message)) {
                            ?>
                            <p class='<?php echo $type; ?>Message'> <?php echo $message; ?> </p>
                        <?php
                        }
                        ?>
                    </div>
            </div>
        </form>
    </div>
  

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
            return valid;
        }
</script> 
</main>

</body>
</html>