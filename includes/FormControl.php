<?php

/**
 * Gives simple way for working with input form data.
 *
 * @access public
 * @final
 * @static
 * @package DiggysHelper
 */

final class FormControl extends IOInput {
	/**
	 * Static constructor.
	 *
	 * @throws ClassException
	 */
	public function __construct() {
		throw new ClassException(__CLASS__ . "is static class. You cannot instantiate it.", ClassException::ClassUtility);
	}
	
}
