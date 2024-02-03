<?php
// Import connection.php
require_once 'connection.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Query the products table
$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch all rows from the result set
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Output the products as JSON
    echo json_encode($products);
} else {
    // Handle the error
    echo json_encode(["error" => mysqli_error($connection)]);
}

// Close the database connection
mysqli_close($connection);
?>