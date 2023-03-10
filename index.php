
<?php
include 'config/database.php';

$bookTitleErr = $authorErr = $coveErr = $statusErr = '';

// to connect and fetch from database
$sql = 'SELECT * FROM books';
$result = mysqli_query($con, $sql);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC );

// *** To post to the database **** //

if(isset($_POST['submit'])){
  // Validate book title
if(empty($_POST['bookTitle'])){
  $bookTitleErr = "Book Title is required !";
}else {
  $bookTitle= filter_input(INPUT_POST, 'bookTitle', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
}
// validate author name
if(empty($_POST['author'])){
  $authorErr = "Author's name is required !";
}else {
  $author= filter_input(INPUT_POST, 'author', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
}
// Validate cover link
if(empty($_POST['cover'])){
  $coveErr = "Cover link is required !";
}else {
  $cover= filter_input(INPUT_POST, 'cover', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;
}
// Validate status
if(empty($_POST['status'])){
  $statusErr = " The status is required !";
}else{
  $status= filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

   // sql query to insert to database
   if(empty($bookTitleErr) && empty($authorErr) && empty($coveErr) && empty($statusErr)){
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
}

$timestamp = date("YmdHis");


?>
<?php include "./partials/header.php" ?>

<body>
<main>

  <div class="container d-flex flex-column align-items-center mb-6">

    <form action="" method="POST" class="mt-4 w-75">
      <div class="mb-1">
        <label for="bookTitle" class="form-label">Book Title</label>
        <input type="text" class="form-control <?php echo $bookTitleErr ? 'is-invalid' : null; ?>" id="bookTitle" name="bookTitle" placeholder="Enter book title">
        <div class="invalid-feedback">
          <?php echo $bookTitleErr ?>
        </div>
      </div>
      <div class="mb-1">
        <label for="author" class="form-label">Author's name</label>
        <input type="text" class="form-control <?php echo $authorErr ? 'is-invalid' : null; ?> " id="author" name="author" placeholder="Enter Author's name">
        <div class="invalid-feedback">
          <?php echo $authorErr ?>
        </div>
      </div>

      <div class="mb-1">
        <label for="cover" class="form-label"> Book cover </label>
        <input type="text" class="form-control <?php echo $coveErr ? 'is-invalid': null; ?> " id="cover" name="cover" placeholder="Enter image link">
         <div class="invalid-feedback">
          <?php echo $coveErr ?>
          </div>
      </div>
      <div class="mb-1">
        <label for="status" class="form-label">Have you read this book</label>
        <input type="text" class="form-control <?php echo $statusErr ? 'is-invalid': null; ?>" id="status" name="status" placeholder="Have you read this book (Yes / No/ in Progress)">
        <div class="invalid-feedback">
          <?php echo $statusErr ?>
          </div>
            </div>
      <div class="mb-1">
        <input type="submit" name="submit" value="Add Book" class="btn btn-dark gray w-100">
      </div>
    </form>
</div>
</main>

<section>
  <div class="container d-flex flex-row align-items-center justify-content-around flex-wrap  ">
  <?php

   foreach($books as $book): ?>
  <div class="card my-1 ">
    <div class="card-body text-center ">
      <img  src="<?php echo $book['cover']; ?>" class="cover-image" alt="book cover" >
      <div class="text-secondary mt-2">
        <h5 class="text-wrap "  ><?php echo $book['bookTitle']; ?> </h5>
        Author : <?php echo $book['author'] ?>
        <p> Read : <?php echo $book['status'] ?></p>
       <a type="button"  class="btn btn-update" href="update.php?updateid=<?php echo $book['id'] ?>" >Update</a>
       <a class="btn btn-delete "  href="delete.php?deleteid=<?php echo $book['id'] ?>" >Delete</a>
      </div>

    </div>
  </div>

  <?php endforeach; ?>

  </div>
</section>

<?php include "./partials/footer.php" ?>
</body>
</html>