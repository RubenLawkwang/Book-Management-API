<?php
/* this code will export json files as csv */
// Read JSON file
$jsonData = file_get_contents('book.json');

// Decode Json files in array
$data = json_decode($jsonData, true);

// Open CSV file for writing
$csvFile = fopen('books.csv', 'w');

// Write header row
fputcsv($csvFile, array('title', 'author', 'genre', 'price', 'quantity'));

// Write student data to CSV file
foreach ($data['library']['book'] as $book) {
    fputcsv($csvFile, array($book['title'], $book['author'], $book['genre'], $book['price'], $book['quantity']));
}


fclose($csvFile);
// successful message
echo "Book data has been exported!!.";
