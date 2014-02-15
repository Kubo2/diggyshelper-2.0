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
    $this->socket = $socket;
    $this->socket->set_charset("utf-8");
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