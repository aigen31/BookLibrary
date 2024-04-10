<?php

namespace BookLibrary\Data\DB;

class Connection
{
	private $host;
	private $username;
	private $password;
	private $database;
	private $mysqli;
	private $connection_result;

	public function __construct(string $host, string $username, string $password, string $database)
	{
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
	}

	public function get_host()
	{
		return $this->host;
	}

	public function get_username()
	{
		return $this->username;
	}

	public function get_password()
	{
		return $this->password;
	}

	public function get_database()
	{
		return $this->database;
	}

	public function get_connection_result()
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$this->mysqli = new \mysqli($this->host, $this->username, $this->password, $this->database);
		$this->connection_result = $this->mysqli->real_connect($this->host, $this->username, $this->password, $this->database);

		return $this->connection_result;
	}

	public function connect() {
		$this->mysqli = new \mysqli($this->host, $this->username, $this->password, $this->database);
	}

	public function get_mysqli() {
		return $this->mysqli;
	}
}
