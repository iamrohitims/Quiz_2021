<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "quiz");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM users 
  WHERE id LIKE '%".$search."%'
  OR email LIKE '%".$search."%' 
  OR played_on LIKE '%".$search."%' 
  ";
}
else
{
 $query = "
  SELECT * FROM users ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
 if (mysqli_num_rows($result) > 0) {
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Id</th>
     <th>Email</th>
     <th>Played_On</th>
     <th>Score</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["played_on"].'</td>
    <td>'.$row["score"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>