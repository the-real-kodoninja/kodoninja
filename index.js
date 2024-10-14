// super globals
const express = require('express');
var expressSession = require('express-session');
var bodyParser = require('body-parser');
var sessionStore = new expressSession.MemoryStore();
const pyodide = require('pyodide'); // global python
const sphp = require('sphp'); // global php
const pg = require("pg");
const dotenv = require("dotenv")
dotenv.config()
// middleware
const app = express();
app.use(express.json());
// port
var server = app.listen(port = process.env.PORT || 5501, () => console.log(`Listening on Port: ${port}`));
// const ws = new require('ws').Server({server: server});
var sessionOptions={
     store: sessionStore
    ,secret:'yes :c)'
    ,resave:false
    ,saveUninitialized:false
    ,rolling: true
    ,name: 'SID'
}
//
app.use(expressSession(sessionOptions));
app.use(function(request, response, next){ 
  // Save session data
  request.session.ip=request.client.remoteAddress;
  next();
});
app.use(bodyParser.json());      
app.use(bodyParser.urlencoded({extended: true}));

app.use(sphp.express('public/'));
// ws.on('connection',sphp.websocket(sessionOptions));
app.use(express.static('public/'));


async function main() {
  let pyodide = await loadPyodide();
  // Pyodide is now ready to use...
  console.log(pyodide.runPython(`
    import sys
    sys.version
  `));
};
main();

// // note rename all .php to js
// // require('./js/mjs.js');

