<?php
$flag = "UCU{n0_l0gs_n0_pr0bl3m}";
$attempt = $_POST['attempt'] ?? '';
if ($attempt == 'admin') {
    echo "<h1>Success</h1><p>Flag: $flag</p>";
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
<p>Flag: UCU{n0_l0gs_n0_pr0bl3m}</p>
