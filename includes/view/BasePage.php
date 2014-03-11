<?php

namespace View {
	require PROJECT_LOCATION . '/configured.php';

	abstract class BasePage {
		/**
		 * Our templating engine instance.
		 *
		 * @var object DiggysSmarty
		 */
		private $smarty = getConfigured();

		/**
		 * Template rendering, when finished.
		 * This method does all general, when it goes
		 * to headers sending etc.
		 *
		 * @return void
		 */
		public function render() {
			$this->smarty->display();
		}
	}
}