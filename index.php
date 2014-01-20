<?php

/**
 * Diggy's helper website.
 * @author Jakub Kubíček <kelerest123@gmail.com>
 * @author Vladimír Jacko <vladimir.jacko.ml@gmail.com>
 * @version 2.0
 * @internal Main rendering file.
 * @package DiggysHelper
 * 
 */

require "./includes/load.php";

/**
 * Constant containing relative web URL of our project.
 *
 * @var string
 */
define('PROJECT_URL', dirname($_SERVER["PHP_SELF"]) . '/');

/**
 * Constant containing absoulute web URI to our project's LOCATION (with http:// prefix).
 *
 * @var string
 */
define('PROJECT_URI',
	'http://'
	. (!empty($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : $_SERVER["SERVER_NAME"])
	. (preg_replace("~/public/.*$~", '', dirname($_SERVER["PHP_SELF"])))
	. '/'
);

