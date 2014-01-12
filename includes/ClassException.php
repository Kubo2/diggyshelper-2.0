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
	const Undefined = 1;
	
	const Singleton = 1.8e1;
	const ClassUtility =  1.8e2;
	const AbstractClass = 1.8e3;

	const UndeclaredMethod = 1.9e1;

	public function __construct($message = NULL, $code = self::Undefined) {
		parent::__construct($message, $code);
	}
}