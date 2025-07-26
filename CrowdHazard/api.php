<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Replace with your actual database credentials
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'safetyfirst';

// Create a connection to the database
$link = mysqli_connect($hostname, $username, $password, $database);

// Check the connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required fields are set
    if (isset($_POST['name'], $_POST['hazard_type'], $_POST['hazard_loc'], $_POST['hazard_desc'])) {
        // Filter all input to prevent SQL injection
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $hazardType = filter_var($_POST['hazard_type'], FILTER_SANITIZE_STRING);
        $hazardLoc = filter_var($_POST['hazard_loc'], FILTER_SANITIZE_STRING);
        $hazardDesc = filter_var($_POST['hazard_desc'], FILTER_SANITIZE_STRING);

        // Insert data into the database
        $query = "INSERT INTO user_reports (user_name, report_title, report_content, report_location)
                  VALUES ('$name', '$hazardType', '$hazardDesc', '$hazardLoc')";

        if ($result = mysqli_query($link, $query)) {
            echo "Report posted successfully";
        } else {
            echo "Error: " . mysqli_error($link);
        }
    } else {
        echo "Error: Incomplete form data";
    }
} else {
    echo "Error: Invalid request method";
}

// Close the database connection
mysqli_close($link);

?>