<form id="addBookForm" action="" method="post">
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
	<input hidden name="handler" value="book_add">
</form>