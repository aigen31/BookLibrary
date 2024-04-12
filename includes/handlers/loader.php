<?php

namespace BookLibrary\Handlers;

require_once __DIR__ . '/../objects/book/class.php';

use BookLibrary\Objects\Book;

switch ($_POST['handler']) {
	case 'book_add':
		$object = new Book($_POST['title'], $_POST['author'], $_POST['year'], $_POST['pages'], $_POST['isbn']);
		$object->create_table();
		$result = $object->add();
		if ($result) {
			echo 'Книга создана!';
		} else {
			echo 'Произошла ошибка, обратитесь к администратору.';
		}
		break;
	default:
		# code...
		break;
}