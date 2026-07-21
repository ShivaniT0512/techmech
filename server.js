const http = require('http');
const fs = require('fs');
const path = require('path');

const server = http.createServer((req, res) => {
  let filePath = '.' + req.url;
  if (filePath === './') filePath = './index.php';
  
  const extname = path.extname(filePath);
  let contentType = 'text/html';
  
  if (extname === '.css') contentType = 'text/css';
  else if (extname === '.js') contentType = 'text/javascript';
  else if (extname === '.png') contentType = 'image/png';
  else if (extname === '.jpg' || extname === '.jpeg') contentType = 'image/jpeg';
  
  fs.readFile(filePath, (error, content) => {
    if (error) {
      res.writeHead(404);
      res.end('Not Found');
    } else {
      res.writeHead(200, { 'Content-Type': contentType });
      res.end(content, 'utf-8');
    }
  });
});

server.listen(3000, () => {
  console.log('Server running at http://localhost:3000/');
});
