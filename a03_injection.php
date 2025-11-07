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
    echo "Admin Flag: $flag\n";
}
?>
</pre>
<p>How to Exploit: Enter 1' OR '1'='1 in ID field (SQLi).</p>
<p>Flag: UCU{inj3ct10n_r1sk}</p>
