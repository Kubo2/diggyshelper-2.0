<?php

/**
 * Dispatcher class.
 *
 * @package DiggysHelper
 */

class Controller implements IInitializable {
	/**
	 * IInitializable::init()
	 *
	 * @param array
	 * @return void
	 */
	public static function init($params = []) {
		$controller = null;
		$method = 'view';
		$parameters = [];

		if(preg_match("#^" . PROJECT_URL . "/+(([^/]+/?)*)?#", $_SERVER['REQUEST_URI'], $appendPath)) {
			$location = PROJECT_URI . $appendPath[1] . '?' . $_SERVER['QUERY_STRING'];
			header("Location: $location", true, 301);
			exit;
		}

		if(strrpos($_SERVER['REQUEST_URI'], 'index.php') !== false) {
			$location = PROJECT_URI . '?' . $_SERVER['QUERY_STRING'];
			header("Location: $location", true, 301);
			exit;
		}

		if(PROJECT_URL == preg_replace("/\?.*$/", '', $_SERVER['REQUEST_URI'])) {
			$controller = new IndexController;
			$controller->view();
			exit;
		}

		$components = explode(
			'/', 
			trim(
				str_replace(
					PROJECT_URL, 
					'/', 
					preg_replace(
						'#\?.+$#', 
						'', 
						$_SERVER['REQUEST_URI']
					)
				), 
		'/')
		);

		$components[0][0] = strtoupper($components[0][0]);
		$components[0] .= 'Controller';

		if(count($components ) > 1) {
			$parameters = array_slice($components, 1);
		}

		if(!empty($_SERVER['QUERY_STRING'])) {
			$method = preg_replace("~(?:&.+)$~", '', $_SERVER['QUERY_STRING']);
			$method = str_replace('/', '', $method);
		}

		// sanitize method and controllername
		self::sanitizeInternalls(array(&$components[0], &$method));


		//var_dump($components[0], $parameters, $method);

		try {
			$controller = new $components[0]($params);
			$controller->$method($parameters);
		} catch(NotFoundException $e) {
			$controller = new NotFoundController;
			$controller->view();
		} catch(ClassException $e) {
			if($e->getCode() != ClassException::UndeclaredMethod)
				throw $e;
			$controller = new InvalidOperationController;
			$controller->view();
		}
	}

	private static function sanitizeInternalls($arguments) {
		if(!count($arguments)) return;
		foreach($arguments as &$reference) {
			$reference = preg_replace("~[^_a-z0-9]+~i", '', $reference);
			$reference = preg_replace("~^\d+~", '', $reference);
		}
	}

	private function view() {
		throw new PageNotFoundException;
	}
}