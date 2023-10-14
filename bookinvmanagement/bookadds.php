<?php
/* this code will retrive information through the
form from addbook.html
*/
/* this code will add books from both xml and Json file */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read Json File
    $jsonData = file_get_contents('book.json');
    $data = json_decode($jsonData, true);

    // Read through xml file
    $xml = simplexml_load_file('books.xml');

    //Retrieve Data From form in addbook.html
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // create an arry to add new book
    $addedbook = array(
        'title' => $title,
        'author' => $author,
        'genre' => $genre,
        'price' => $price,
        'quantity' => $quantity
    );

    // Add new book into existing data
    $data['library']['book'][] = $addedbook;

    // Add new book to XML file

    $addedbookXml = $xml->addChild('book');
    $addedbookXml->addChild('title', $title);
    $addedbookXml->addChild('author', $author);
    $addedbookXml->addChild('genre', $genre);
    $addedbookXml->addChild('price', $price);
    $addedbookXml->addChild('quantity', $quantity);

    // Save XML file
    $xml->asXML('books.xml');

    // save new book added in xml files directly in Json
    $modifiedJsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Modify Json Files
    file_put_contents('book.json', $modifiedJsonData);
    //Successful Messages
    echo "New book added successfully!";
}
