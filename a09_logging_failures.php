<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Failures Demo</title>
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
        form {
            margin: 20px 0;
        }
        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }
        button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
        $flag = "UCU{l0gg1ng_m1ss}";
        $attempt = $_POST['attempt'] ?? '';
        if ($attempt == 'admin') {
            echo "<h1>Success</h1><div class='flag'>Flag: $flag</div>";
        } else {
            // No logging!
            echo "<h1>Wrong</h1><p>Try 1000 times...</p>";
        }
        ?>
        <form method="POST">
          Attempt: <input name="attempt" type="text">
          <button>Try</button>
        </form>
        <p>How to Exploit: Brute-force "admin" (no rate limit/logs).</p>
    </div>
</body>
</html>
