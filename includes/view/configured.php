<?php

namespace View {
	class DiggysSmarty extends \Smarty {
		public function __construct() {
			parent::__construct();
			$this->caching = true;
			$this->template_dir = PROJECT_LOCATION . "/html/";
			$this->compile_dir = PROJECT_LOCATION . "/html/compiled/";
			$this->config_dir = PROJECT_LOCATION . "/html/config/";
			$this->cache_dir = PROJECT_LOCATION . "/cache/";
		}
	}

	function getConfigured() {
		if(!isset($smarty)) {
			static $smarty = new  DiggysSmarty();
		}
		return clone $smarty;
	}
}