<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Demo</title>
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
            margin-bottom: 20px;
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
        pre {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
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
        $flag = "UCU{inj3ct10n_r1sk}";
        // Simulate database with array (SQLite3 not available)
        $users = [
            1 => 'user',
            2 => 'admin'
        ];

        $id = $_GET['id'] ?? 1;
        // Simulate query result
        $result = isset($users[$id]) ? [['id' => $id, 'name' => $users[$id]]] : [];
        ?>
        <h1>User Search</h1>
        <form>ID: <input name="id" value="<?= htmlspecialchars($id) ?>"><button>Search</button></form>
        <pre>
        <?php
        foreach ($result as $row) {
            echo "ID: {$row['id']} | Name: {$row['name']}\n";
        }
        // The next check emulates an injection detection for the demo page
        if (strpos((string)$id, "' OR '1'='1") !== false) {
            echo "<span class='flag'>Admin Flag: $flag</span>\n";
        }
        ?>
        </pre>
        <p>How to Exploit: Enter <code>1' OR '1'='1</code> in the ID field and submit. This bypasses the intended query logic by making the WHERE clause always true, revealing the admin flag. In a real scenario, this would allow access to unauthorized data.</p>
    </div>
</body>
</html>
