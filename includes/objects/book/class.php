<?php

namespace BookLibrary\Objects;

require_once __DIR__ . '/../../data/environment/class.php';
require_once __DIR__ . '/../../data/db/connection/class.php';

use BookLibrary\Data\Environment;
use BookLibrary\Data\DB\Connection;

Environment::get();

class Book
{
	private $author;
	private $name;
	private $year;
	private $number_of_pages;
	private $isbn;
	private $connection;

	public function __construct(string $author = '', string $name = '', string $year = '2023', int $number_of_pages = 0, int $isbn = 0)
	{
		$this->author = $author;
		$this->name = $name;
		$this->year = $year;
		$this->number_of_pages = $number_of_pages;
		$this->isbn = $isbn;
		// $this->connection = new Connection($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USERNAME'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);
		$this->connection = Connection::get_mysqli();
	}

	public function create_table() : void
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

		$stmt = $this->connection->prepare("CREATE TABLE IF NOT EXISTS books (id INT AUTO_INCREMENT PRIMARY KEY, author VARCHAR(20), name VARCHAR(20), year YEAR, pages INT, isbn BIGINT)");

		$stmt->execute();
	}

	public function add() : bool
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

		$stmt = $this->connection->prepare("INSERT INTO books (author, name, year, pages, isbn) VALUES (?, ?, ?, ?, ?);");

		$stmt->bind_param("sssii", $this->author, $this->name, $this->year, $this->number_of_pages, $this->isbn);

		$result = $stmt->execute();

		return $result;
	}

	public function get()
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

		$stmt = $this->connection->prepare("SELECT * FROM books;");

		$stmt->execute();

		$result = $stmt->get_result();

		return $result->fetch_all();
	}
}
