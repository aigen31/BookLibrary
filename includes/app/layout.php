<?php

namespace BookLibrary\App\Layout;

require_once __DIR__ . '/../data/environment/class.php';
require_once __DIR__ . '/../data/db/connection/class.php';

use BookLibrary\Data\Environment;
use BookLibrary\Data\DB\Connection;

Environment::get();
$connection = new Connection($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USERNAME'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>Учетная система библиотеки</title>
</head>

<body>

	<h2>Данные соединения:</h2>
	<p>Соединение:
		<?php
			if ($connection->get_connection_result()) {
				echo 'Соединение установлено';
			} else {
				echo 'Соединение не установлено';
			}
		?>
	</p>
	<p>Хост: <?php echo $connection->get_host(); ?></p>
	<p>Логин: <?php echo $connection->get_username(); ?></p>
	<p>Пароль: <?php echo $connection->get_password(); ?></p>
	<p>БД: <?php echo $connection->get_database(); ?></p>

	<h2>Добавление книги</h2>
	<form id="addBookForm">
		<label for="title">Название:</label><br>
		<input type="text" id="title" name="title" required><br>
		<label for="author">Автор:</label><br>
		<input type="text" id="author" name="author" required><br>
		<label for="year">Год издания:</label><br>
		<input type="number" id="year" name="year"><br>
		<label for="pages">Количество страниц:</label><br>
		<input type="number" id="pages" name="pages"><br>
		<label for="isbn">ISBN:</label><br>
		<input type="text" id="isbn" name="isbn"><br>
		<button type="submit">Добавить книгу</button>
	</form>

	<h2>Поиск книг</h2>
	<form id="searchBooksForm">
		<label for="searchQuery">Поиск:</label><br>
		<input type="text" id="searchQuery" name="searchQuery" placeholder="Название, автор, ISBN..."><br>
		<button type="submit">Искать</button>
	</form>

	<h2>Список книг</h2>
	<table id="booksList">
		<thead>
			<tr>
				<th>Название</th>
				<th>Автор</th>
				<th>Год издания</th>
				<th>Страниц</th>
				<th>ISBN</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			<!-- Книги будут добавляться сюда динамически -->
		</tbody>
	</table>

	<script>
		// Здесь можно добавить JavaScript для обработки форм и взаимодействия с сервером
	</script>

</body>

</html>