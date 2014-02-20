<?php

/**
 * Represents VIEW part of project.
 *
 * @access public
 * @static
 * @package DiggysHelper
 */

class IOOutput extends IO {
	/**
	 * Static constructor.
	 *
	 * @throws ClassException
	 */
	public function __construct() {
		throw new ClassException(__CLASS__ . "is static class. You cannot instantiate it.", ClassException::ClassUtility);
	}
	
}
