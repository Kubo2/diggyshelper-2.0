<?php

/**
 * Input/Output. Represents VIEW part of project.
 * 
 * @access public
 * @abstract 
 * @package DiggysHelper
 */

abstract class IO implements ArrayAccess, Iterator {
	/**
	 * Buffer for storing output templates.
	 *
	 * @var Array of strings
	 */
	private static $buffer = array();

	/**
	 * Constructor throws StaticClassException, to let user see,
	 * that he/she can not instantiate static class.
	 *
	 * @throws StaticClassException
	 */
	function __construct() {
		throw new ClassException(__CLASS__ . "is static class. You can not instantiate it.", ClassException::ClassUtility);
	}

	/**
	 * ArrayAccess::offsetExists()
	 *
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) { }

	/**
	 * ArrayAccess::offsetUnset()
	 *
	 * @param mixed $offset
	 */
	public function offsetUnset($offset) { }

	/**
	 * ArrayAccess::offsetGet()
	 *
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetGet($offset) { }

	/**
	 * ArrayAccess::offsetSet()
	 *
	 * @param mixed
	 * @param mixed
	 */
	public function offsetSet($name, $value) { }

	/**
	 * Iterator::rewind()
	 * Move to first position (start position of an array).
	 *
	 * @return void
	 */
	public function rewind() { }
	
	/**
	 * Iterator::current()
	 * Returns current value.
	 *
	 * @return mixed
	 */
	public function current() { }

    /**
     * Iterator::key()
     * Index for current position.
     *
     * @return mixed
     */
    public function key() { }

    /**
     * Iterator::next()
     * Move to next field.
     *
     * @return void
     */
    public function next() { }

    /**
     * Iterator::valid()
     * Whether exists current offset.
     *
     * @return boolean
     */
    public function valid() { }
}