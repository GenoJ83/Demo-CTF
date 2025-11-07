<?php
$flag = "UCU{p4th_tr4v3rs4l}";
if (isset($_GET['page']) && $_GET['page'] == '../flag.txt') {
    echo "<h1>Flag: $flag</h1>";
} else {
    echo "<h1>Home</h1><p>Try ?page=../flag.txt</p>";
}
?>
<p>How to Exploit: Path traversal: ?page=../flag.txt (create flag.txt with flag).</p>
<p>Flag: UCU{p4th_tr4v3rs4l}</p>
