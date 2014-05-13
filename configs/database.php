<?php
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match('/^192.168./', $_SERVER['HTTP_HOST']) or preg_match('/^10.0./', $_SERVER['HTTP_HOST']) ){

	define('DB_HOST', '');
	define('DB_BASE', '');
	define('DB_USER', '');
	define('DB_PASS', '');

} else {

	define('DB_HOST', '');
	define('DB_BASE', '');
	define('DB_USER', '');
	define('DB_PASS', '');

}
	define('_PREFIX_', '');
	define('PREFIX', '');
?>
