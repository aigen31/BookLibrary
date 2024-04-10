<?php

namespace BookLibrary\Data;

require_once __DIR__ . '/../../../vendor/autoload.php';

class Environment {
	public static function get() {
		$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../..');
		$dotenv->load();
	}
}
