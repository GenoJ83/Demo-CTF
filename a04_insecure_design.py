from flask import Flask, request
app = Flask(__name__)

@app.route('/')
def home():
    secret = request.args.get('secret', '')
    if secret == 'debug=true':
        return '<h1>Debug Mode</h1><p>Flag: UCU{d3s1gn_fl4w}</p>'
    return '<h1>App</h1><p>Try ?secret=debug=true</p>'

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)

# How to Exploit: Add ?secret=debug=true to URL.
# Flag: UCU{d3s1gn_fl4w}
