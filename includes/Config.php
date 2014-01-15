<?php

/**
 * Singleton for storing configuration vars/directives.
 * Can not be extended. There MUST exist only one instance
 * of it in whole context.
 *
 * @access public
 * @package DiggysHelper
 */

final class Config {
	/**
	 * Constant containing absolute path to our project/app directory IN LOCAL FILESYSTEM.
	 *
	 * @var string
	 */
	const ProjectLocation = defined("__DIR__") ? dirname(__DIR__) : dirname(dirname(__FILE__));

	/**
	 * Constant containing relative web URL of our project.
	 *
	 * @var string
	 */
	const ProjectUrl = dirname($_SERVER["PHP_SELF"]) . '/';

	/**
	 * Constant containing absoulute web URI to our project's LOCATION (with http:// prefix).
	 *
	 * @var string
	 */
	const ProjectUri = 'http://'
		. (!empty($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : $_SERVER["SERVER_NAME"])
		. (preg_replace("~/public/.*$~", '', dirname($_SERVER["PHP_SELF"])))
		. '/';

	/**
	 * Single instance of this class.
	 *
	 * @var object Config
	 * @static 
	 */
	private static $instance;

	/**
	 * Allowed configuration sections to return.
	 *
	 * @var array
	 */
	private $sections = array(
		"db",
		"stats",
	);

	/**
	 * Array of database configuration data.
	 *
	 * @var array
	 */
	private $db = array(
		"host" => "localhost",
		"database" => "test",
		"login" => "root",
		"password" => "root",
	);

	/**
	 * Stats data.
	 *
	 * @var array
	 */
	private $stats = array(
		"activity.max_users" => 40,
	);

	/**
	 * Private constructor, only self can instantiate self.
	 *
	 * @internal because this class is singleton.
	 */
	private function __construct() {
		$configArray = FALSE;

		if(file_exists(PROJECT_LOCATION . "/.config.ini"))
			$configArray = parse_ini_file(PROJECT_LOCATION . "/.config.ini", true);

		if(!$configArray)
			$configArray = array();
		$configArray = array_change_key_case($configArray, CASE_LOWER);

		foreach($this->sections as $section) {
			if(isset($configArray[$section]) && is_array($configArray[$section])) {
				$this->$section = $configArray[$section] + $this->$section;
			}
		}
	}

	/**
	 * Prevents from creating new instance of self using cloning objects.
	 *
	 * @throws ClassException
	 */
	public function __clone() {
		throw new ClassException(__CLASS__ . "is singleton. You can not create more than one instance of it.", ClassException::Singleton);
	}

	/**
	 * Prevents from creating new instance of self using serialization.
	 *
	 * @throws ClassException
	 */
	public function __wakeup() {
		throw new ClassException(__CLASS__ . "is singleton. You can not deserialize it.", ClassException::Singleton);
	}

	/**
	 * Handler of calling undeclared methods for getting configuration values.
	 *
	 * @param string Name of the method called.
	 * @param array Arguments
	 * @return mixed Array if $args are empty, string if $args[0] contains value, otherwise false.
	 * @throws ClassException when bad method is called
	 */
	public function __call($name, $args) {
		if(substr($name, 0, 3) == "get") {
			$section = strtolower(substr($name, 3));
			if(in_array($section, $this->sections) && isset($this->$section) && is_array($this->$section)) {
				$section = $this->$section;
				if(!count($args))
					return $section;
				$directive = $args[0];
				if(isset($section[$directive]))
					return $section[$directive];
			}
			return false;
		} else {
			throw new ClassException(__CLASS__ . "::$name method is not declared in " . __CLASS__, ClassException::UndeclaredMethod);
		}
	}

	/**
	 * Returns instance of this class.
	 *
	 * @return object Config
	 */
	public static function getInstance() {
		if(is_null(self::$instance))
			self::$instance = new self;
		return self::$instance;
	}
}
