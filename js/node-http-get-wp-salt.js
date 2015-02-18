var http = require('http');

var options = {
  host: 'api.wordpress.org',
  port: 80,
  path: '/secret-key/1.1/salt/'
};

http.get(options, function(res) {
  console.log("Got response: " + res.statusCode);
  res.on('data', function (chunk) {
    console.log('' + chunk);
  });
}).on('error', function(e) {
  console.log("Got error: " + e.message);
});
