<?php

/**
 * Represents query to send to IQueryable object.
 *
 * @package DiggysHelper
 */

interface IQuery {
	/**
	 * Sets type of query representing.
	 *
	 * @param int query type
	 * @return void
	 */
	public function setType($type);

	/**
	 * Sets data relevant with query.
	 *
	 * @param IStorage query data
	 * @return void
	 */
	public function setData(IStorage $data);

	/**
	 * Returns data relevant with query.
	 * Data are specified by user explicitly, this is mostly used 
	 * by IQueryable object when proccessing query.
	 *
	 * @return IStorage query data
	 */
	public function getData();

	/**
	 * Returns query as a string with wildcards rather than data.
	 *
	 * @return string query representation
	 */
	public function getRepresentation();

	/**
	 * Returns raw query representation (also with data included) as string.
	 *
	 * @return string raw query
	 */
	public function getRawRepresentation();
}