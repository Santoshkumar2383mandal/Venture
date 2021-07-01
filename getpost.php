<?php
include "includes/header.php";
?>
<!-- <h1>Hello Bddy</h1> -->





<div class="container">

<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{

$email=$_POST['email'];
$password=$_POST['password'];

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>sucess!</strong> Your email is: '.$email.' and password ****** is submitted.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
//////////////////////////////// Insertion Start ///////////////////////////////
$host="localhost";
$user="root";
$pswd="";
$db="detailsdb";
//connection establish


$con=mysqli_connect($host,$user,$pswd,$db);
if(!$con)
{
    die("failed to connect<br>".mysqli_connect_error());
}
else{
    echo "data base connected<br>";
}
/////////////////////////////////////////////////////////


$query="INSERT INTO `details` (`Email`, `password`) VALUES ('$email', '$password');
";
  $rs=  mysqli_query($con,$query);

  if($rs)
  {
      echo "Table Inserted";

  }
  else 
  {
      echo "Failed to insert table<br>".mysqli_error($con);
  }









/////////////////////////////// Insertion End ///////////////////////////////////
}


?>

<form action="getpost.php" method="POST">
  <div class="mb-3">
    <label for="Email1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>




<?php
include "includes/footer.php";
?>