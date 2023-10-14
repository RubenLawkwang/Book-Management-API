<?php
/* 
This code will retrieve data from both
Json file and xml files to then delete it from
the storage files
*/
// retrieve form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read JSON file
    $jsonData = file_get_contents('book.json');
    $data = json_decode($jsonData, true);

    // Read XML file
    $xml = simplexml_load_file('books.xml');

    // Retrieve  data in form by book title
    $title = $_POST['title'];

    // Delete book from JSON
    foreach ($data['library']['book'] as $key => $book) {
        if ($book['title'] === $title) {
            unset($data['library']['book'][$key]);
            break; // end of foreach
        }
    }

    // Delete book from XML
    foreach ($xml->book as $bookNode) {
        if ((string)$bookNode->title === $title) {
            $dom = dom_import_simplexml($bookNode);
            $dom->parentNode->removeChild($dom);
            break; //end of foreach
        }
    }

    // Save XML file
    $xml->asXML('books.xml');

    //modified data back to JSON
    $modifiedJsonData = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Write new data JSON file
    file_put_contents('book.json', $modifiedJsonData);
    // successful message
    echo "Book has been deleted!";
}
