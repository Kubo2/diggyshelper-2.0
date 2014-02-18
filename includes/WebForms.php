<?php

/**
 * Gives simple way for manipulating with forms server-side.
 *
 * @access public
 * @static
 * @package DiggysHelper
 */

class WebForms extends IOOutput {
	/**
	 * Static constructor.
	 *
	 * @throws ClassException
	 */
	public function __construct() {
		throw new ClassException(__CLASS__ . "is static class. You cannot instantiate it.", ClassException::ClassUtility);
	}
	
}
