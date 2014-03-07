<?php

/**
 * Miscellanous functions library.
 *
 * @package DiggysHelper
 * @subpackage Libraries
 */

/**
 * Converting string representation of boolean
 * values to its real boolean equivalents.
 * 
 * @param string $val string boolean representation
 * @return boolean its real boolean equivalent or NULL if there is no one
 * @access public
 */
function str2bool($val) {
	static $true = [ "true", '1', "yes", "on", "ano", "áno" ];
	static $false = [ "false", '0', "no", "off", "ne", "nie" ];
	$val = strtolower($val);
	return (
		in_array($val, $true) ? true : (
			in_array($val, $false) ? false : NULL
		)
	);
}