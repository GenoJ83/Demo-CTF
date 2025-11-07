<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDOR Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #666;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .flag {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $user_id = $_GET['id'] ?? 1;
        $flag = "UCU{1d0r_vuln3r4bl3}";

        if ($user_id == 1) {
            echo "<h1>User Dashboard</h1><p>Your ID: $user_id</p>";
        } else {
            echo "<h1>Admin Panel</h1><p>Secret Flag: <span class='flag'>$flag</span></p>";
        }
        ?>
        <h2>Test App</h2>
        <p>Visit: <a href="?id=1">User Page</a> | <a href="?id=2">Admin Page</a></p>
        <p>How to Exploit: Change URL from ?id=1 to ?id=2 (IDOR).</p>
    </div>
</body>
</html>
