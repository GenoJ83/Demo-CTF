from flask import Flask, request
import requests
app = Flask(__name__)

@app.route('/')
def ssrf():
    url = request.args.get('url', '')
    try:
        if '169.254.169.254' in url:
            return '<h1>Metadata</h1><p>Flag: UCU{ssrf_t0_m3t4d4t4}</p>'
        r = requests.get(url)
        return f'<p>{r.text[:200]}</p>'
    except:
        return '<h1>Invalid URL</h1><p>Try url=http://169.254.169.254</p>'

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)

# How to Exploit: Enter url=http://169.254.169.254 (SSRF to metadata).
# Flag: UCU{ssrf_t0_m3t4d8}
