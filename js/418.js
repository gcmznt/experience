var http = require('http');
 
var server = http.createServer(function (req, res) {
  res.writeHead(418, {'Content-Type': 'text/plain'});
  res.end('Hello World');
})
 
server.listen(1337, '0.0.0.0');
 
console.log('Server running at http://0.0.0.0:1337/');
