<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <!-- boot strap 5 cnd -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- end of boot strap 5 cnd -->
</head>
<!-- This page is use to itterate through 
the books and display the genre in a drop down menu  -->

<body>
    <div class="container my-5 text-center">
        <h2>Search Books by Genre</h2>
        <!-- start of form -->
        <form action="search.php" method="post">
            <label for="genre">Select Book Genre:</label>
            <select name="genre" id="genre">
                <?php
                // Load xml file to generate dropdown option
                $xml = simplexml_load_file('books.xml');
                $genres = [];
                foreach ($xml->book as $book) {
                    echo '<option value="' . $book->genre . '">' . $book->genre . '</option>';
                }


                foreach ($genres as $genre => $_) {
                    echo "<option value=\"$genre\">$genre</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Search">
            <!-- end of form-->
        </form>
    </div>
</body>

</html>