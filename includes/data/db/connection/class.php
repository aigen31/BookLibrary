<?php

namespace BookLibrary\Data\DB;

require_once __DIR__ . '/../../environment/class.php';

use BookLibrary\Data\Environment;
Environment::get();

class Connection
{
	private static $host;
	private static $username;
	private static $password;
	private static $database;
	private static $mysqli;
	private static $connection_result;

	public static function get_host()
	{
		return self::$host;
	}

	public static function get_username()
	{
		return self::$username;
	}

	public static function get_password()
	{
		return self::$password;
	}

	public static function get_database()
	{
		return self::$database;
	}

	private static function authorization() {
		self::$host = $_ENV['MYSQL_HOST'];
		self::$username = $_ENV['MYSQL_USERNAME'];
		self::$password = $_ENV['MYSQL_PASSWORD'];
		self::$database = $_ENV['MYSQL_DATABASE'];
		self::$mysqli = new \mysqli(self::$host, self::$username, self::$password, self::$database);
	}

	public static function get_result()
	{
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		self::authorization();
		self::$connection_result = self::$mysqli->real_connect(self::$host, self::$username, self::$password, self::$database);
		return self::$connection_result;
	}

	public static function get_mysqli() {
		self::authorization();
		return self::$mysqli;
	}
}
