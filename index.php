<?php

/**
 * Diggy's helper website.
 * Front controller, dispatcher bootstrap.
 * Based on partially modified MVC framework.
 * @author Jakub Kubíček <kelerest123@gmail.com>
 * @author Vladimír Jacko <vladimir.jacko.ml@gmail.com>
 * @author Jakub Szabo <beastaros@gmail.com>
 * @version 2.0
 * @internal Main rendering file.
 * @package DiggysHelper
 * 
 */

require "./includes/load.php";

try {
	Controller::init();
} catch(ClassNotFoundException $e) {

}