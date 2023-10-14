<?php
/* this code will display all of the books 
available in the json file */
// iterate through Json file
$jsonData = file_get_contents('book.json');

// Decode JSON data
$data = json_decode($jsonData, true);

// Starting of table 
echo "<table border='1'>
      <tr>
        <th style='background-color:cyan'>Title</th>
        <th style='background-color:cyan'>Author</th>
        <th style='background-color:cyan'>Genre</th>
        <th style='background-color:cyan'>Price</th>
        <th style='background-color:cyan'>Quantity</th>
      </tr>";

/*
Display Jason data
In table
*/
foreach ($data['library']['book'] as $book) {
  echo "<tr>";
  echo "<td>" . $book['title'] . "</td>";
  echo "<td>" . $book['author'] . "</td>";
  echo "<td>" . $book['genre'] . "</td>";
  echo "<td>" . $book['price'] . "</td>";
  echo "<td>" . $book['quantity'] . "</td>";
  echo "</tr>";
}

// End of table
echo "</table>";
