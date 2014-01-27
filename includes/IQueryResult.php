<?php

/**
 * Represents result created by processing query.
 *
 * @package DiggysHelper
 */

interface IQueryResult extends IStorage {
	/**
	 * Removes all items from IQueryResult object's storage.
	 *
	 * @return void
	 */
	public function free();
	
}