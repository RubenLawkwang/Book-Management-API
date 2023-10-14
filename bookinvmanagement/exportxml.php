<?php
/* this code will export xml files as csv */
$xml = simplexml_load_file('books.xml');


$csvFile = fopen('booksxml.csv', 'w');


fputcsv($csvFile, array('title', 'author', 'genre', 'price', 'quantity'));


foreach ($xml->book as $book) {
    fputcsv($csvFile, array(
        (string) $book->title,
        (string) $book->author,
        (string) $book->genre,
        (string) $book->price,
        (string) $book->quantity
    ));
}


fclose($csvFile);

echo "Book data exported to booksxml.csv successfully.";
?>
<?php
// Read XML file
$xml = simplexml_load_file('books.xml');

// Convert XML to JSON
$jsondata = json_encode($xml, JSON_PRETTY_PRINT);

// Save converted JSON data to a new file
$jsonFile = 'books_converted.json';
file_put_contents($jsonFile, $jsondata);
// successful message
echo "XML converted to JSON and was save as $jsonFile successfully.";
?>