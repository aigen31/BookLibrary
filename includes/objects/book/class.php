<?php

namespace BookLibrary\Objects;

require_once __DIR__ . '/../data/environment/loader.php';
require_once __DIR__ . '/../../data/db/connection/class.php';

use BookLibrary\Data\DB\Connection;

$connection = new Connection($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USERNAME'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);

class Book {
	private $author;
	private $name;
	private $year;
	private $number_of_pages;
	private $isbn;
	
	public function __construct(string $author, string $name, string $year, int $number_of_pages, int $isbn) {
		$this->author = $author;
		$this->name = $name;
		$this->year = $year;
		$this->number_of_pages = $number_of_pages;
		$this->isbn = $isbn;
	}

	public function add() {
		
	}
}