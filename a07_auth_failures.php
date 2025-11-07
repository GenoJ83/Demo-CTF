<?php
session_start();
$flag = "UCU{4uth_f41l}";
if (isset($_GET['session']) && $_GET['session'] == 'admin') {
    $_SESSION['user'] = 'admin';
}
if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
    echo "<h1>Admin</h1><p>Flag: $flag</p>";
} else {
    echo "<h1>Login</h1><p>Try ?session=admin</p>";
}
?>
<p>How to Exploit: Add ?session=admin to URL (session fixation).</p>
<p>Flag: UCU{4uth_f41l}</p>
