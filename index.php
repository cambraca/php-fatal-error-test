<?php

/**
 * Simple autoloader, copied straight from the PHP docs.
 */
spl_autoload_register(function ($class_name) {
	include $class_name . '.php';
});

/**
 * This function catches some errors, but not all of them.
 */
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	header('HTTP/1.1 500 Internal Server Error', TRUE, 500);
	die($errstr . PHP_EOL);
});

/**
 * This one is needed to catch fatal errors and set the HTTP status code appropriately.
 */
register_shutdown_function(function () {
	$last_error = error_get_last();
	if ($last_error && in_array($last_error['type'], [E_ERROR, E_PARSE, E_COMPILE_ERROR, E_CORE_ERROR]))
		header('HTTP/1.1 500 Terrible Internal Server Error', TRUE, 500);
});

/**
 * Without this, in the "terrible" case we'll have already sent output so we won't be able to set the header. The output
 * sent is the "Fatal error" message. It's left as an exercise for the reader to figure out how to hide that message.
 */
ob_start();

/**
 * Now our script starts. We'll load a "bad" class or a "terrible" class according to the query string.
 * Try these:
 *
 *   - http://localhost:8666
 *   - http://localhost:8666?bad
 *   - http://localhost:8666?terrible
 */

if (isset($_GET['bad']))
	$a = new BadClass(); // Constructor triggers a user error

if (isset($_GET['terrible']))
	$a = new TerribleClass(); // Constructor triggers a fatal error

echo 'Current date is: ' . date('c') . PHP_EOL;
