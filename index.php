
<?php
include 'config/database.php';

// to connect and fetch from database
$sql = 'SELECT * FROM books';
$result = mysqli_query($con, $sql);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC );

// *** To post to the database **** //
if(isset($_POST['submit'])){
  $bookTitle= filter_input(INPUT_POST, 'bookTitle', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
  $author= filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
  $cover= filter_input(INPUT_POST, 'cover', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
  $status= filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   // sql query to insert to database
$sql = "INSERT INTO books (bookTitle, author, cover, status) VALUES ('$bookTitle', '$author', '$cover', '$status')";

   // handle error when inserting to database
if(mysqli_query($con, $sql)){
     // success
    header('Location: index.php');
}else {

    // Error
  echo 'Error' . mysqli_error($con);
}
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="./styles.css">
  <title>Document</title>
</head>
<body>
<main>
  <div class="container d-flex flex-column align-items-center">
    <nav>
      <a href="">Home</a>
      <a href="./about.php">About</a>
    </nav>
    <h1>My Library PHP</h1>

    <form action="" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="bookTitle" class="form-label">Book Title</label>
        <input type="text" class="form-control" id="bookTitle" name="bookTitle" placeholder="Enter book title">
      </div>
      <div class="mb-3">
        <label for="author" class="form-label">Author's name</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Enter Author's name">
      </div>

      <div class="mb-3">
        <label for="cover" class="form-label"> Book cover </label>
               <input type="text" class="form-control" id="cover" name="cover" placeholder="Enter image link">
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Have you read this book</label>
        <input type="text" class="form-control" id="status" name="status" placeholder="Have you read this book (Yes / No)">
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Add Book" class="btn btn-dark w-100">
      </div>
    </form>
</div>
</main>
<section>

  <div class="container d-flex flex-column align-items-center">
<?php
foreach($books as $book): ?>
  <div class="card my-3 w-75">
     <div class="card-body text-center">
       <img  src="<?php echo $book['cover']; ?>" class="cover" alt="book cover" >
       <div class="text-secondary mt-2">
         <h3><?php echo $book['bookTitle']; ?> </h3>
        By : <?php echo $book['author'] ?>
        <p> Status : <?php echo $book['status'] ?></p>
        <button type="button" class="btn btn-success">Update</button>
        <button type="button" class="btn btn-danger"> <a class="delete-button" href="delete.php?deleteid=<?php echo $book['id'] ?>" >Delete</a> </button>
      </div>

     </div>
   </div>

<?php endforeach; ?>


</div>
</section>
</body>
</html>