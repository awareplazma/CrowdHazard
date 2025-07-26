<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .dashboard-links {
            margin-top: 20px;
            text-align: center;
        }

        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
    
    
</head>
<body>

<div class="dashboard-container">
    <h1>Welcome</h1>

    <div class="dashboard-links">
        <a href="insert_news.php">Update News</a><br>
        <a href="view_reports.php">View Reports</a><br>
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>
