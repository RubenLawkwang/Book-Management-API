<!DOCTYPE html>
<html>

<head>
    <title>Update Book by Price</title>
    <!-- boot strap 5 cnd -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- end of boot strap 5 cnd -->
</head>

<body>
    <div class="container my-5 text-center">
        <h2>Update Book by Price</h2>
        <!-- start of update price form -->
        <form action="updatebooks.php" method="post">
            <!-- display books by title in a selected format -->
            <label for="title">Select a Book By Title:</label>
            <select name="title" id="title">
                <!-- load data throught xml -->
                <?php
                // Generate dropdown option
                $xml = simplexml_load_file('books.xml');
                foreach ($xml->book as $book) {
                    echo '<option value="' . $book->title . '">' . $book->title . '</option>';
                }
                ?>
            </select>
            <br>
            <label for="price">New Price:</label>
            <input type="number" step="0.01" name="price" id="price" required>
            <br>
            <input type="submit" value="Update Price">
        </form>
        <!-- end of form -->
    </div>
</body>

</html>