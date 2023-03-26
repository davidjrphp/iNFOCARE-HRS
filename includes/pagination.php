<?php

// connect to the database
require 'connect.php';

// set the number of records per page
$records_per_page = 10;

// get the total number of records in the database
$sql = "SELECT COUNT(*) FROM users";
$result = mysqli_query($con, $sql);
$total_records = mysqli_fetch_array($result)[0];

// calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// calculate the offset for the current page
$offset = ($current_page - 1) * $records_per_page;

// retrieve the records for the current page
$sql = "SELECT * FROM users LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $sql);

// display the records
while ($row = mysqli_fetch_assoc($result)) {
    // display the record data here
}

// display the pagination links
if ($total_pages > 1) {
    echo "<div>";
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span>$i</span>";
        } else {
            echo "<a href=\"users.php?page=$i\">$i</a>";
        }
    }
    echo "</div>";
}

// close the database connection
mysqli_close($con);

?>
