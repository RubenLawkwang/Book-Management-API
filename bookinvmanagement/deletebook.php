<!DOCTYPE html>
<html>

<head>
  <title>Delete Book</title>
  <!-- boot strap 5 cnd -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- end of boot strap 5 cnd -->
</head>

<body>
  <div class="container my-5 text-center">
    <h2>Delete Existing Books</h2>
    <!-- Delete book form -->
    <form action="delete.php" method="post">
      <label for="title">Select Book by Title:</label>
      <!-- select book from xml -->
      <select name="title" id="title">
        <option value="" selected disabled>Select a book</option>
        <!-- retriving book details form xml -->
        <?php
        $xml = simplexml_load_file('books.xml');
        // populating book title
        foreach ($xml->book as $book) {
          echo '
        
        <option value="' . htmlspecialchars($book->title) . '">
          ' . htmlspecialchars($book->title) . '
        </option>
        ';
        } ?>
        <!-- end of fetching details form xml -->
      </select>
      <br />
      <input type="submit" value="Delete Book" />
    </form>
    <!-- end of form-->
  </div>
</body>

</html>