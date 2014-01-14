<?php

/**
 * Project loader.
 *
 * @package DiggysHelper
 */

/**
 * Constant containing absolute path to our project/app directory IN LOCAL FILESYSTEM.
 *
 * @var string
 * @access public
 */
define('PROJECT_LOCATION', defined("__DIR__") ? dirname(__DIR__) : dirname(dirname(__FILE__)));

/**
 * Constant containing absoulute web URI to our project's LOCATION (with http:// prefix).
 *
 * @var string
 * @access public
 */
define('PROJECT_URI',
	'http://'
	. (!empty($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : $_SERVER["SERVER_NAME"])
	. (preg_replace("~/public/.*$~", '', dirname($_SERVER["PHP_SELF"])))
	. '/'
);

// Prevents from searching for files in more directories
set_include_path(".");

/**
 * Autoload function.
 * 
 * @param string class name
 * @access public
 */

function __autoload($className) {
	if(!error_reporting() || !(int)ini_get('error_reporting')) {
		(1 === include(PROJECT_LOCATION . "/includes/$className.class.php"))
		|| (1 === include(PROJECT_LOCATION . "/includes/$className.inc.php"))
		|| (1 === include(PROJECT_LOCATION . "/includes/traits/$className.php"))
		|| (require(PROJECT_LOCATION . "/includes/$className.php"));
	} else {
		(1 === @include(PROJECT_LOCATION . "/includes/$className.class.php"))
		|| (1 === @include(PROJECT_LOCATION . "/includes/$className.inc.php"))
		|| (1 === @include(PROJECT_LOCATION . "/includes/traits/$className.php"))
		|| (require(PROJECT_LOCATION . "/includes/$className.php"));
	}
}

// includes configuration class
// @since 2.0.0.1 will be included automatically by __autoload() implementation
//require(PROJECT_LOCATION . "/includes/Config.php");