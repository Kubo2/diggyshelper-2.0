<?php

/**
 * Input/Output.
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
	protected static $buffer = array();

	/**
	 * ArrayAccess::offsetExists()
	 *
	 * @param mixed $offset
	 * @return bool
	 */
	abstract public function offsetExists($offset);

	/**
	 * ArrayAccess::offsetUnset()
	 *
	 * @param mixed $offset
	 */
	abstract public function offsetUnset($offset);

	/**
	 * ArrayAccess::offsetGet()
	 *
	 * @param mixed $offset
	 * @return mixed
	 */
	abstract public function offsetGet($offset);

	/**
	 * ArrayAccess::offsetSet()
	 *
	 * @param mixed
	 * @param mixed
	 */
	abstract public function offsetSet($name, $value);

	/**
	 * Iterator::rewind()
	 * Move to first position (start position of an array).
	 *
	 * @return void
	 */
	abstract public function rewind();
	
	/**
	 * Iterator::current()
	 * Returns current value.
	 *
	 * @return mixed
	 */
	abstract public function current();

    /**
     * Iterator::key()
     * Index for current position.
     *
     * @return mixed
     */
    abstract public function key();

    /**
     * Iterator::next()
     * Move to next field.
     *
     * @return void
     */
    abstract public function next();

    /**
     * Iterator::valid()
     * Whether exists current offset.
     *
     * @return boolean
     */
    abstract public function valid();
}