<?php

namespace BookLibrary\App\Layout;

require_once __DIR__ . '/../data/environment/class.php';
require_once __DIR__ . '/../data/db/connection/class.php';
require_once __DIR__ . '/../objects/book/class.php';

use BookLibrary\Data\Environment;
use BookLibrary\Data\DB\Connection;
use BookLibrary\Objects\Book;

Environment::get();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title>Учетная система библиотеки</title>
	<style>
		table, th, td {
			border: 1px solid;
		}
		table {
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
		}
	</style>
</head>

<body>

	<h2>Данные соединения:</h2>
	<p>Соединение:
		<?php
			if (Connection::get_result()) {
				echo 'Соединение установлено';
			} else {
				echo 'Соединение не установлено';
			}
		?>
	</p>
	<p>Хост: <?php echo Connection::get_host(); ?></p>
	<p>Логин: <?php echo Connection::get_username(); ?></p>
	<p>Пароль: <?php echo Connection::get_password(); ?></p>
	<p>БД: <?php echo Connection::get_database(); ?></p>

	<h2>Добавление книги</h2>
	<?php include(__DIR__ . '/parts/forms/book_add.php'); ?>

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
				<th>Автор</th>
				<th>Название</th>
				<th>Год издания</th>
				<th>Страниц</th>
				<th>ISBN</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$book = new Book();

				foreach($book->get() as $item) {
					echo '<tr>';
					echo '<td>' . $item[1] . '</td>';
					echo '<td>' . $item[2] . '</td>';
					echo '<td>' . $item[3] . '</td>';
					echo '<td>' . $item[4] . '</td>';
					echo '<td>' . $item[5] . '</td>';
					echo '<td>' . '</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>
</body>

</html>