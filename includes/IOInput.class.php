<?php

/**
 * Represents CONTROLLER part of project.
 *
 * @access public
 * @static
 * @package DiggysHelper
 */

class IOInput extends IO {
	/**
	 * Static constructor.
	 *
	 * @throws ClassException
	 */
	public function __construct() {
		throw new ClassException(__CLASS__ . "is static class. You cannot instantiate it.", ClassException::ClassUtility);
	}

	/**
	 * Finds out HTTP method used for current request.
	 *
	 * @return string HTTP Request method
	 */
	public static function getMethod() {
		return $_SERVER['REQUEST_METHOD'];
	}

	/**
	 * Populates raw post data.
	 *
	 * @return string raw post data
	 */
	public static function getRawInput() {
		static $data;
		if(!empty($data))
			$data = self::getMethod() != "POST" || !file_exists("php://input") ? false : file_get_contents("php://input");
		return $data;
	}

	/**
	 * Provides universal way for accessing GET/POST data depending on request method
	 *
	 * @param string name of GET/POST var
	 * @return mixed value of GET/POST var
	 */
	public static function getInput($name) {
			return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : false);
	}

	/**
	 * Provides access to GET vars.
	 *
	 * @param string name of the var, optional
	 * @return string|array
	 */
	public static function getQsVar($name = false) {
		if(!$name)
			return $_GET;
		return isset($_GET[$name]) ? $_GET[$name] : false;
	}

	/**
	 * Provides access to POST vars.
	 *
	 * @param string varname, optional
	 * @return string|array
	 */
}
