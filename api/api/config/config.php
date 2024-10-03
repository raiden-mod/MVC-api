<?php
// get the serer parameters
$server = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// this is for the app root
define('APPROOT', dirname(path: dirname(path: __FILE__)));
// site name 
const SITENAME = "";
const DB_HOST = 'localhost';
// this will check if it is a loccalhost sever
if (strpos($server, "localhost") !== false) {
 // this will contain database root app root and file location
 // database params
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', '');


 // this is the url root to create dynamic links 
 define('URLROOT', 'http://localhost/'.SITENAME);
} else {
 // this will check if the server  is a secure HTTPS
 if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
  $redirectUri = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  header(header: "Location:" . $redirectUri);
  exit();
 }
 // this will contain database root app root and file location
 // database params
 define('DB_USER', '');
 define('DB_PASS', '');
 define('DB_NAME', '');

 // this is the url root to create dynamic links 
 define('URLROOT', '');
}
