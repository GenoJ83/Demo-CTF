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
        $db = new SQLite3(':memory:');
        $db->exec("CREATE TABLE users (id INT, name TEXT); INSERT INTO users VALUES (1, 'user'), (2, 'admin');");

        $id = $_GET['id'] ?? 1;
        // Use a prepared statement (keeps example but still demonstrates intended behavior)
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $stmt->execute();
        ?>
        <h1>User Search</h1>
        <form>ID: <input name="id" value="<?= htmlspecialchars($id) ?>"><button>Search</button></form>
        <pre>
        <?php
        while ($row = $result->fetchArray()) {
            echo "ID: {$row['id']} | Name: {$row['name']}\n";
        }
        // The next check emulates an injection detection for the demo page
        if (strpos((string)$id, "' OR '1'='1") !== false) {
            echo "<span class='flag'>Admin Flag: $flag</span>\n";
        }
        ?>
        </pre>
        <p>How to Exploit: Enter 1' OR '1'='1 in ID field (SQLi).</p>
    </div>
</body>
</html>
