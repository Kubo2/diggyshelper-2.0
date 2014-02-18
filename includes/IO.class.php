<?php

/**
 * Input/Output.
 * 
 * @access public
 * @abstract 
 * @package DiggysHelper
 */

abstract class IO {
	/**
	 * Buffer for storing output templates.
	 *
	 * @var Array of strings
	 */
	protected static $buffer = array();
}