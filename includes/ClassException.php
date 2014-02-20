<?php

/**
 * Often throws constructor.
 * This is throwed, when someone's trying to use
 * the class as the is not usable that way.
 *
 * @access public
 * @package DiggysHelper
 */

class ClassException extends Exception {
	/**
	 * Exception error level code constants.
	 *
	 * @var int
	 */
	/**
	 * Undefined kind of problem when throwing with this error level code.
	 */
	const Undefined = 1;
	
	/**
	 * When someone attempts to instantiate singleton more times.
	 */
	const Singleton = 1.8e1;
	/**
	 * When someone attempts to instantiate static class.
	 */
	const ClassUtility =  1.8e2;

	/**
	 * When someone attempts to call class method, that this class doesn't declare.
	 */
	const UndeclaredMethod = 1.9e1;

	/**
	 * Calls parent's constructor with optional $message and $code parameters.
	 *
	 * @param string Message shrotly describing what happened | default NULL
	 * @param int Exception error level code. This is useful when automatically catching exceptions | default 1
	 */
	public function __construct($message = NULL, $code = self::Undefined) {
		parent::__construct($message, $code);
	}
}