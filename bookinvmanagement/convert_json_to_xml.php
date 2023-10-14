<?php
/* This code will mostly convert json files to
xml files */
// Read JSON file
$jsonData = file_get_contents('book.json');

// Decode JSON data into an associative array
$data = json_decode($jsonData, true);


$dom = new DOMDocument('1.0', 'UTF-8');
$dom->formatOutput = true; // This code will regulate
// the format of the converted json file

// create root
$root = $dom->createElement('books');
$dom->appendChild($root);

// convert array to xml
function arrayToXml($data, &$dom, &$parent)
{
    foreach ($data as $key => $value) {
        if (is_numeric($key)) {

            $key = 'item';
        }

        if (is_array($value)) {
            $subnode = $dom->createElement($key);
            $parent->appendChild($subnode);
            arrayToXml($value, $dom, $subnode);
        } else {
            $child = $dom->createElement($key, htmlspecialchars($value));
            $parent->appendChild($child);
        }
    }
}

// Convert JSON to XML
arrayToXml($data, $dom, $root);

// Save XML to a new file
$xmlFileName = 'books_converted.xml';
$dom->save($xmlFileName);
// sucessful message
echo "JSON data converted to XML and saved to $xmlFileName successfully.";
