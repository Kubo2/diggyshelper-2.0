<?php

class DbLayer implements IQueryable {
	public function __construct() {
		list($server, $login, $password, $db) = Config::getInstance()->getDb();
		$socket = new mysqli($server, $login, $password, $db);

		if(!$socket) {
			throw new ClassCantBeInstantiatedException;
		}

		if($socket->connect_errno) {
			throw new CantOpenSocketException($socket->connect_error, $socket->connect_errno);
		}

		if(!$socket->set_charset("utf8")) {
			$socket->query("SET NAMES utf8");
		}
		
		$this->socket = $socket;
	}
	
	public function __destruct() {
	$this->socket->close();
	unset($this->socket);
	}

	public function query(IQuery $query) {

	}

	public function rawQuery($query) {

	}
}