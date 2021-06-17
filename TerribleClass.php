<?php

class TerribleClass {
	public function __construct() {
		$a = [1, 2, 3];
		return $a{1}; // Old syntax, not supported by PHP 8. Causes a fatal error.
	}
}
