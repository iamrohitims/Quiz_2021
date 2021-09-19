<?php
    $con=mysqli_connect("localhost","root","","contact");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $result = mysqli_query($con,"SELECT * FROM tblcontact");

    while($row = mysqli_fetch_array($result))
      {
      echo $row['contact_id'] . " " . $row['user_name'] . " " . $row['user_email'] . " " . $row['subject'] . " " . $row['content']; //these are the fields that you have stored in your database table employee
      echo "<br />";
      }

    mysqli_close($con);
    ?>
