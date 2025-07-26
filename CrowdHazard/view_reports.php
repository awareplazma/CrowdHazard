<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

include 'db_connection.php';

// Fetch user reports from the database
$sql = "SELECT * FROM user_reports";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User Reports</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .view-reports-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .report {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: left;
        }

        .report strong {
            color: #007bff;
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .no-reports {
            color: #555;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="view-reports-container">
    <h2>Details of Report</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='report'>";
            echo "<strong>Username:</strong> " . $row['user_name'] . "<br>";
            echo "<strong>Report Title:</strong> " . $row['report_title'] . "<br>";
            echo "<strong>Location:</strong> " . $row['report_location'] . "<br>";
            echo "<strong>Report Content:</strong> " . $row['report_content'] . "<br>";
            echo "<strong>Report Time:</strong> " . $row['report_time'] . "<br>";
            echo "</div>";
        }
    } else {
        echo "<p class='no-reports'>No user reports available.</p>";
    }
    ?>

    <a href="admin_dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
