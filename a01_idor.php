<?php
$user_id = $_GET['id'] ?? 1;
$flag = "UCU{1d0r_vuln3r4bl3}";

if ($user_id == 1) {
    echo "<h1>User Dashboard</h1><p>Your ID: $user_id</p>";
} else {
    echo "<h1>Admin Panel</h1><p>Secret Flag: $flag</p>";
}
?>
<h2>Test App</h2>
<p>Visit: <a href="?id=1">User Page</a> | <a href="?id=2">Admin Page</a></p>
<p>How to Exploit: Change URL from ?id=1 to ?id=2 (IDOR).</p>
<p>Flag: UCU{1d0r_vuln3r4bl3}</p>
