<?php
/**
 * Main abstract function.
 *
 * @package Astral
 */

/**
 * Class astral_Abstract_Main
 */
abstract class astral_Abstract_Main {

	abstract public function __construct();

	/**
	 * Initialize the control. Add all the hooks necessary.
	 */
	abstract public function init();
}