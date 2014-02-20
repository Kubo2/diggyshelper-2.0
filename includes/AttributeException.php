<?php

/**
 * Code attribute error. Does not commit with HTML code.
 *
 * @package DiggysHelper
 */

class AttributeException extends Exception {
	/**
	 * Represents class attr only for reading.
	 */
	const ReadOnly = 1.2e1;

	/**
	 * Only calls parent's constructor.
	 */
	public function __construct($message, $code) {
		parent::__construct($message, $code);
	}
}