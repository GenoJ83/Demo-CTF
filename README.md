Vulnerable Demo Suite (local only)

This folder contains intentionally vulnerable demo apps corresponding to the OWASP-like list you provided. The following section documents how to run each demo locally and how to trigger the vulnerability (for learning/testing only).

Safety first
- Run these demos only on an isolated machine, disposable VM, or container.
- Do NOT expose these services to the public internet.
- These examples include hardcoded flags and insecure behavior for educational purposes.

Files and exploitation instructions

1) a01_idor.php — Insecure Direct Object Reference (PHP)
- Run: Start PHP built-in server in the folder:

```powershell
cd "c:\Users\HP\Desktop\MOCK"
php -S localhost:8000
```

- Exploit steps:
	1. Open http://localhost:8000/a01_idor.php?id=1 — you'll see the User Dashboard.
	2. Change the URL to ?id=2 (http://localhost:8000/a01_idor.php?id=2).
	3. The page will show the Admin Panel and the flag: UCU{br0k3n_4cc3ss_c0ntr0l}.

2) a02_crypto_fail.html — Weak client-side 'crypto' (HTML/JS)
- Run: Open `a02_crypto_fail.html` in your browser (file:// or via the local server).
- Exploit steps:
	1. Enter password `secret123` into the Password field.
	2. Click Login — the page displays the Base64 hash `c2VjcmV0MTIz` and reveals the flag: UCU{cr4ck3d_crYpt0}.
	3. Alternatively, open DevTools Console and run `btoa('secret123')` to confirm the hash.

3) a03_injection.php — SQL injection demo (PHP + SQLite)
- Run: Use the PHP built-in server as above.
- Exploit steps:
	1. Open http://localhost:8000/a03_injection.php
	2. In the ID field enter the payload: 1' OR '1'='1 and submit.
	3. The demo checks for that pattern and will print the admin flag: UCU{sql1_inj3ct3d} (note: this demo uses an in-memory SQLite DB and a simple detection string to illustrate SQLi).

4) a04_insecure_design.py — Insecure design (Flask)
- Run:

```powershell
cd "c:\Users\HP\Desktop\MOCK"
python -m venv .venv
.\.venv\Scripts\Activate.ps1
pip install flask
python a04_insecure_design.py
```

- Exploit steps:
	1. Visit http://127.0.0.1:5000/ — page suggests the `secret` parameter.
	2. Append `?secret=debug=true` to the URL: http://127.0.0.1:5000/?secret=debug=true
	3. The app returns the debug view and the flag: UCU{1n53cur3_d3s1gn}.

5) a05_misconfig.php — Path traversal (PHP)
- Run: start PHP built-in server as for other PHP files.
- Exploit steps:
	1. Visit http://localhost:8000/a05_misconfig.php
	2. Request `?page=../flag.txt` (http://localhost:8000/a05_misconfig.php?page=../flag.txt).
	3. For this demo the script checks for that parameter and prints the flag: UCU{m1sc0nf1gur3d} — you can also create a `flag.txt` file in the parent folder to simulate reading arbitrary files (do not do this on production systems).

6) a06_vulnerable_components.html — Old jQuery XSS demo (HTML/JS)
- Run: Open `a06_vulnerable_components.html` in a browser (it loads jQuery from CDN).
- Exploit steps:
	1. In the input field type: <script>document.getElementById('flag').style.display='block'</script>
	2. Click Test — the vulnerable `.html()` call executes the script, revealing the hidden flag element with UCU{0ld_l0g4j}.

7) a07_auth_failures.php — Session fixation/demo (PHP)
- Run: start the PHP built-in server.
- Exploit steps:
	1. Visit http://localhost:8000/a07_auth_failures.php
	2. Append `?session=admin` to the URL: http://localhost:8000/a07_auth_failures.php?session=admin
	3. The script sets the session user to `admin` and shows the flag: UCU{s3ss10n_h1j4ck}.

8) a08_integrity_failures.py — Weak MD5 demo (Flask)
- Run:

```powershell
cd "c:\Users\HP\Desktop\MOCK"
python -m venv .venv
.\.venv\Scripts\Activate.ps1
pip install flask
python a08_integrity_failures.py
```

- Exploit steps:
	1. Visit http://127.0.0.1:5000/
	2. Append `?data=password` (http://127.0.0.1:5000/?data=password).
	3. The app calculates MD5 and matches the stored hash, returning the flag: UCU{supply_ch41n_pwn3d}.

9) a09_logging_failures.php — No logging / brute-force demo (PHP)
- Run: start the PHP built-in server.
- Exploit steps:
	1. Visit http://localhost:8000/a09_logging_failures.php
	2. Submit the form with `attempt=admin` (or post to the endpoint) — the script will return the flag: UCU{n0_l0gs_n0_pr0bl3m} (the point: no logging/rate-limit in place).

10) a10_ssrf.py — Server-Side Request Forgery (Flask + requests)
- Run:

```powershell
cd "c:\Users\HP\Desktop\MOCK"
python -m venv .venv
.\.venv\Scripts\Activate.ps1
pip install flask requests
python a10_ssrf.py
```

- Exploit steps:
	1. Visit http://127.0.0.1:5000/
	2. Append `?url=http://169.254.169.254` (http://127.0.0.1:5000/?url=http://169.254.169.254).
	3. The demo checks for that IP and returns the metadata flag: UCU{ssrf_t0_m3t4d4t4} (do NOT perform SSRF against real metadata endpoints on cloud infrastructure unless you control the environment).

Notes about running and safety
- These steps are intended for controlled, local testing only.
- Use virtual environments, firewalled hosts, or containers to keep tests isolated.
- If you want, I can also add a `patched/` directory with fixed versions and short tests showing the patched behavior.

Next steps I can take for you
- Create patched versions for selected files and explain the fixes (recommended start: a03_injection.php, a01_idor.php, a10_ssrf.py).
- Add Docker Compose to run the demos in isolated containers.
- Add automated tests that demonstrate exploitation of the vulnerable versions and confirm the patched versions are safe.

If you want patched versions or a Docker setup, tell me which files to prioritize.
