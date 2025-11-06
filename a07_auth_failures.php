<?php
session_start();
$flag = "UCU{s3ss10n_h1j4ck}";
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
<p>Flag: UCU{s3ss10n_h1j4ck}</p>
