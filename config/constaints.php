<?php 
    define('DATABASE', 'phptest');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('HOST', 'localhost');

	/*Security*/
	define('SECRETE_KEY', 'test123');

	// Error Codes
	
	define('BAD_REQUEST',"HTTP/1.0 400 Bad Request");
	define('OK_REQUEST',"HTTP/1.0 200 OK");
	define('SERVER_ERROR',"HTTP/1.0 500 Internal Server Error");
	define('USER_EXIST',"User is previously existed enter email address unique");
	define("NOT_FOUND","HTTP/1.0 404 Not Found");

	define("NOT_EXIST","User does not exist");
?>