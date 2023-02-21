

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        <label for="book-title" class="form-label">Book Title</label>
        <input type="text" class="form-control" id="book-title" name="book-title" placeholder="Enter book title">
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
</body>
</html>