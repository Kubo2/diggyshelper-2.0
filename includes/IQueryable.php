<?php

/**
 * Represents every object you can send a query.
 *
 * @package DiggysHelper
 */

interface IQueryable {
	/**
	 * Processes a query specified by IQuery object.
	 *
	 * @param IQuery query object
	 * @return IQueryResult result of the query
	 */
	public function query(IQuery $query);

	/**
	 * Processes a raw query specified by string.
	 *
	 * @param string query
	 * @return IQueryResult result of raw query
	 */
	public function rawQuery($query);
}