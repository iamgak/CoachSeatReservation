<?php
//i have not added in main file because i have done manually
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($createDbQuery) === TRUE) {
    echo "Database created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select the database
$conn->select_db($dbname);

// Create the seating table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS seating (
    block INT PRIMARY KEY AUTO_INCREMENT,
    seat INT DEFAULT 0 CHECK (seat >= 0 AND seat <= 7)
)";
if ($conn->query($createTableQuery) === TRUE) {
    echo "Table created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Close the connection
$conn->close();

?>
