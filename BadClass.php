<?php

class BadClass {
	public function __construct() {
		user_error("Silly error, catchable by set_error_handler().");
	}
}
