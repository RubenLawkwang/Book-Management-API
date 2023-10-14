<?php
/* 
This code will retrieve data from both
Json file and xml files to then perform a search 
on the genre of book that was entered in the form
*/

// retrieve data from form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // fetch selected data
    $selectedGenre = $_POST['genre'];

    // read Json File
    $jsonData = file_get_contents('book.json');
    $data = json_decode($jsonData, true);

    // read xml file
    $xml = simplexml_load_file('books.xml');

    // Display books form Json data
    echo "<h1>Books from JSON Data:</h1>";
    foreach ($data['library']['book'] as $book) {
        if ($book['genre'] === $selectedGenre) {
            echo "<p>Title: {$book['title']} | Genre: {$book['genre']}</p>";
        }
    }

    // Display books from Json data
    echo "<h1>Books from XML Data:</h1>";
    foreach ($xml->book as $book) {
        if ((string)$book->genre === $selectedGenre) {
            echo "<p>Title: {$book->title} | Genre: {$book->genre}</p>";
        }
    }
}
