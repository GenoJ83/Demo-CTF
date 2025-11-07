<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misconfiguration Demo</title>
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
        $flag = "UCU{p4th_tr4v3rs4l}";
        if (isset($_GET['page']) && $_GET['page'] == '../flag.txt') {
            echo "<h1>Flag</h1><div class='flag'>$flag</div>";
        } else {
            echo "<h1>Home</h1><p>Try ?page=../flag.txt</p>";
        }
        ?>
        <p>How to Exploit: Path traversal: ?page=../flag.txt (create flag.txt with flag).</p>
    </div>
</body>
</html>
