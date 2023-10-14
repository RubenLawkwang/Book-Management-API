<?php
/* this code will display all of the books 
available in the json file */
// connection to the xml files to load the data
$xml = simplexml_load_file('books.xml');

// Books table
echo "<table border='1'>
      <tr>
        <th style='background-color:cyan'>Title</th>
        <th style='background-color:cyan'>Author</th>
        <th style='background-color:cyan'>Genre</th>
        <th style='background-color:cyan'>Price</th>
        <th style='background-color:cyan'>Quantity</th>
      </tr>";

// Fetching each book in a foreach loop 
//and display it on a table
foreach ($xml->book as $book) {
  echo "<tr>";
  echo "<td>" . $book->title . "</td>";
  echo "<td>" . $book->author . "</td>";
  echo "<td>" . $book->genre . "</td>";
  echo "<td>" . $book->price . "</td>";
  echo "<td>" . $book->quantity . "</td>";
  echo "</tr>";
}

// End of table
echo "</table>";
