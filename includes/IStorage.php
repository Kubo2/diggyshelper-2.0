<?php

/**
 * Represents all objects that serves as kind of storage.
 * Because of inheriting Iterator, can be iterated as array type.
 *
 * @package DiggysHelper
 */

interface IStorage extends Iterator {
	/**
	 * Saves given $data to some storage with optional $name index.
	 *
	 * @param mixed data to save
	 * @param string|int index name on where data are saved (optional)
	 * @return bool
	 */
	public function saveData($data, $index = null);

	/**
	 * Returns stored data from index name given or all of them in mixed array.
	 *
	 * @param string|int index name from where data are wanted
	 * @return mixed data
	 */
	public function readData($index = null);

	/**
	 * Removes data from index name given.
	 * All data can't be removed 'cause object would no longer be usable.
	 *
	 * @param string|int index
	 * @return void
	 */
	public function removeData($index);
}