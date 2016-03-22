var http = require('http');
var body = '';
http.get('http://stormy-lake-70176.herokuapp.com/', function(res){
  res.on('data', function (chunk) {
      body += chunk;
  });
  res.on('end', function(){
      console.log(JSON.parse(body));
  });
});
