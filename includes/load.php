<?php

/**
 * Project loader.
 *
 * @package DiggysHelper
 */

// sets default encoding when using mb_* functions
mb_internal_encoding("UTF-8");

// Prevents from searching for files in more directories
set_include_path(".");

/**
 * Constant containing absolute path to our project/app directory IN LOCAL FILESYSTEM.
 *
 * @var string
 */
define('PROJECT_LOCATION', defined("__DIR__") ? dirname(__DIR__) : dirname(dirname(__FILE__)));

/**
 * Constant containing relative web URL of our project.
 *
 * @var string
 */
define('PROJECT_URL', rtrim(dirname($_SERVER["SCRIPT_NAME"]), DIRECTORY_SEPARATOR) . '/');

/**
 * Constant containing absoulute web URI to our project's LOCATION (with http:// prefix).
 *
 * @var string
 */
define('PROJECT_URI',
	'http'
	. (isset($_SERVER["HTTPS"]) && strtoupper($_SERVER["HTTPS"]) != "OFF" ? 's' : '')
	. '://'
	. (!empty($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : $_SERVER["SERVER_NAME"])
	. rtrim(preg_replace("~/public/.*$~", '', dirname($_SERVER["SCRIPT_NAME"])), DIRECTORY_SEPARATOR)
	. '/'
);

// this makes it possible to load vendor sources automatically
require PROJECT_LOCATION . "/vendor/autoload.php";

/**
 * Autoload function.
 * 
 * @todo Rewrite autoloading so it will respect namespaces.
 * @param string class name
 * @access public
 */

function __autoload($className) {
	// where to search in filesystem
	static $paths = [ "%s.php", "controllers/%s.inc.php", "%s.class.php", "%s.inc.php", "traits/%s.php" ];
	
	if(class_exists($className))
		// class already exists in current context
		return;

	// nothing found in context
	foreach ($paths as $path) {
		// loop over all paths
		/*echo "\n", */$fullPath = PROJECT_LOCATION . sprintf("/includes/$path", $className);
		if(file_exists($fullPath)) {
			require $fullPath;
			return;
		}
	}

	// nothing found in filesystem
	eval("class $className{}");
	throw new ClassNotFoundException("Class wasn't found in global context and filesystem: $className");
}

spl_autoload_register('__autoload');

/**
 * Defines default implementation of ClassNotFoundException.
 * @access public
 */
final class ClassNotFoundException extends NotFoundException {
	// empty implementation
}

