<?php

/**
 * Diggy's helper website.
 * Front controller, dispatcher bootstrap.
 * Based on partially modified MVC framework.
 * @author Jakub Kubíček <kelerest123@gmail.com>
 * @author Vladimír Jacko <vladimir.jacko.ml@gmail.com>
 * @author Jakub Szabo <beastaros@gmail.com>
 * @version 2.0
 * @internal Main rendering file.
 * @package DiggysHelper
 * 
 */

require "./includes/load.php";

try {
	if(isset($_GET['js'])) {
		Controller::init( [ 'ajax_request' => true ] );
	} else {
		Controller::init();
	}
} catch(Exception $e) {
	@ob_end_clean();
	@header("Retry-After: 604800", true, 503);
	@header("Connection: close");
?>
<!DOCTYPE html><html><head><meta charset="utf-8">
<title>503 Service Unavailable</title>
</head><body><h1>503 Web nedostupný</h1><p>
Server vrátil stavový kód 503 oznamujúci dočasnú nedostupnosť webu.<br>
Pravdepodobne nastala fatálna chyba v aplikácii alebo prebieha údržba.
Skúste sa sem prosím vrátiť neskôr.</p></body></html>
<?php
}