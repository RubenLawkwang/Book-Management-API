<?php
// retrieve data from form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read Json files
    $jsonData = file_get_contents('book.json');
    $data = json_decode($jsonData, true);

    // Read XML file
    $xml = simplexml_load_file('books.xml');

    // Retrieve form data
    $title = $_POST['title'];
    $setPrice = $_POST['price'];

    // Update price in JSON
    foreach ($data['library']['book'] as &$book) {
        if ($book['title'] === $title) {
            $book['price'] = $setPrice;
            break; //end for each

        }
    }

    // Update price in XML data
    foreach ($xml->book as $book) {
        if ((string)$book->title === $title) {
            $book->price = $setPrice;
            break; //end for each
        }
    }

    // Save XML file
    $xml->asXML('books.xml');

    // Encode new price into Json
    $modifiedJsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Modified Json files
    file_put_contents('book.json', $modifiedJsonData);
    // successful messages
    echo "Price has been updated successfully!";
}
