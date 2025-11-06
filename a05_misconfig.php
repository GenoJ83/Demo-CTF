<?php
$flag = "UCU{m1sc0nf1gur3d}";
if (isset($_GET['page']) && $_GET['page'] == '../flag.txt') {
    echo "<h1>Flag: $flag</h1>";
} else {
    echo "<h1>Home</h1><p>Try ?page=../flag.txt</p>";
}
?>
<p>How to Exploit: Path traversal: ?page=../flag.txt (create flag.txt with flag).</p>
<p>Flag: UCU{m1sc0nf1gur3d}</p>
