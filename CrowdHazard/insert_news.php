<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

include 'db_connection.php';

if (isset($_POST['insert_crowdinfo'])) {
    $name = $_POST['name'];
    $hazardType = $_POST['hazard_type'];
    $hazardLoc = $_POST['hazard_loc'];
    $hazardDesc = $_POST['hazard_desc'];


    // Insert crowd information into the database
    $sql = "INSERT INTO crowdinfo (`name`, `hazard_type`, `hazard_loc`, `hazard_desc`) VALUES
    ('$name', '$hazardType', '$hazardLoc', '$hazardDesc')";

    if ($conn->query($sql) === TRUE) {
        $success = "Crowd information inserted successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert News Information</title>
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

        .insert-news-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="insert-news-container">
    <h2>Insert News Information</h2>

    <?php
    if (isset($success)) {
        echo "<p class='success'>$success</p>";
    } elseif (isset($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>

    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="hazard_type">Hazard Type:</label>
        <input type="text" name="hazard_type" required><br>

        <label for="hazard_loc">Hazard Location:</label>
        <input type="text" name="hazard_loc" required><br>

        <label for="hazard_desc">Hazard Description:</label>
        <textarea name="hazard_desc" required></textarea><br>

        <input type="submit" name="insert_crowdinfo" value="Insert Crowd Information">
    </form>

    <a href="admin_dashboard.php">Back to Dashboard</a>

</body>
</html>
