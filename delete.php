<?php
// to connect to database
include 'config/database.php';

// *** To Delete Books from Database  *** ///

if(isset($_GET['deleteid'])){
  $id = $_GET['deleteid'];
  echo $id;
}

$sqlDelete = "DELETE FROM books WHERE id =$id";
$result = mysqli_query($con, $sqlDelete);

if($result){
  // redirect to index.php
  header("Location:index.php");
}else {
  echo 'Error' . mysqli_error($con);
  die(mysqli_error($con));
}

?>