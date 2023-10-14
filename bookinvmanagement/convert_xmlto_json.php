<?php
/* This code will mostly convert xml files to
json files */

// Read XML file
$xml = simplexml_load_file('books.xml');

// Convert XML to JSON
$jsonData = json_encode($xml, JSON_PRETTY_PRINT);

// Save converted JSON data to a new file
$jsonFileName = 'books_converted.json';
file_put_contents($jsonFileName, $jsonData);
// successful message
echo "XML data converted to JSON and saved to $jsonFileName successfully.";
