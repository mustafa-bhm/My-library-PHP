<?php
// to connect to database
include 'config/database.php';

if(isset($_GET['updateid'])){

  $id = $_GET['updateid'];
  //  fetch from database
  $sql = "SELECT * FROM books WHERE id = $id";
  $result = mysqli_query($con, $sql);
  $book = mysqli_fetch_all($result, MYSQLI_ASSOC )[0];
}


// *** To post updates  to the database **** //
if(isset($_POST['submit'])){
  $bookTitle= filter_input(INPUT_POST, 'bookTitle', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
  $author= filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
  $cover= filter_input(INPUT_POST, 'cover', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
  $status= filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   // sql query to update database
$sql_update = "UPDATE `books` SET id='$id', bookTitle = '$bookTitle', author = '$author', cover= '$cover', status = '$status'  where id = '$id' ";

   // handle error when updating database
if(mysqli_query($con, $sql_update )){
     // success
    header('Location: index.php');
}else {

    // Error
  echo 'Error' . mysqli_error($con);
  die(mysqli_error($con));
}
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include "./partials/header.php" ?>
<body>
<main>

  <div class="container d-flex flex-column align-items-center">


    <form action="" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="bookTitle" class="form-label">Book Title</label>
        <input type="text" class="form-control" id="bookTitle" name="bookTitle"  value ="<?php echo $book['bookTitle']?>">
      </div>
      <div class="mb-3">
        <label for="author" class="form-label">Author's name</label>
        <input type="text" class="form-control" id="author" name="author" value ="<?php echo $book['author'] ?>">
      </div>

      <div class="mb-3">
        <label for="cover" class="form-label"> Book cover </label>
               <input type="text" class="form-control" id="cover" name="cover" value="<?php echo $book['cover'] ?>">
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Have you read this book</label>
        <input type="text" class="form-control" id="status" name="status" value ="<?php echo $book['status'] ?>">
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Update Book" class="btn btn-update w-100">
      </div>
    </form>
</div>
</main>

</body>
<?php include "./partials/footer.php" ?>
</html>