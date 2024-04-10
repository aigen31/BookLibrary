<?php

namespace BookLibrary\Objects;

require_once __DIR__ . '/../data/environment/loader.php';
require_once __DIR__ . '/../../data/db/connection/class.php';

use BookLibrary\Data\DB\Connection;

class Book
{
	private $author;
	private $name;
	private $year;
	private $number_of_pages;
	private $isbn;
	private $connection;

	public function __construct(string $author, string $name, string $year, int $number_of_pages, int $isbn)
	{
		$this->author = $author;
		$this->name = $name;
		$this->year = $year;
		$this->number_of_pages = $number_of_pages;
		$this->isbn = $isbn;
		$this->connection = new Connection($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USERNAME'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);;
	}

	public function add()
	{
		$mysqli = $this->connection->get_mysqli();

		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

		/* Подготовленный запрос, шаг 1: подготовка */
		$stmt = $mysqli->prepare("CREATE TABLE IF NOT EXISTS books (id INT AUTO_INCREMENT PRIMARY KEY, author VARCHAR(20), name VARCHAR(20), year YEAR, pages INT, isbn BIGINT);");
		$stmt = $mysqli->prepare("INSERT INTO books (author, name, year, pages, isbn) VALUES (?, ?, ?, ?, ?);");

		/* Подготовленный запрос, шаг 2: связывание и выполнение */
		$stmt->bind_param("sssii", $this->author, $this->name, $this->year, $this->number_of_pages, $this->isbn); // "is" означает, что $id связывается, как целое число, а $label — как строка

		$mysqli->execute();
	}
}
