<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth Failures Demo</title>
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
        .flag {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        $flag = "UCU{4uth_f41l}";
        if (isset($_GET['session']) && $_GET['session'] == 'admin') {
            $_SESSION['user'] = 'admin';
        }
        if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
            echo "<h1>Admin</h1><div class='flag'>Flag: $flag</div>";
        } else {
            echo "<h1>Login</h1><p>Try ?session=admin</p>";
        }
        ?>
        <p>How to Exploit: Add ?session=admin to URL (session fixation).</p>
    </div>
</body>
</html>
