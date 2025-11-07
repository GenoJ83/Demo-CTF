from flask import Flask, request
import hashlib
app = Flask(__name__)

@app.route('/')
def home():
    data = request.args.get('data', '')
    # Weak MD5 used deliberately for demo
    hash_val = hashlib.md5(data.encode()).hexdigest()
    if hash_val == '5f4dcc3b5aa765d61d8327deb882cf99':  # MD5 of "password"
        return '<h1>Valid</h1><p>Flag: UCU{1nt3gr1ty_br34k}</p>'
    return '<h1>Invalid</h1><p>Try data=password</p>'

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)

# How to Exploit: Enter data=password (weak hash collision).
# Flag: UCU{1nt3gr1ty_br34k}
