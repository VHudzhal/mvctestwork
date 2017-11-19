<?php
$uploaddir = '../web/uploads/'; 
if (isset($_POST['upload'])) {
			$image = file_get_contents( $_FILES['uploaded_image']['tmp_name'] );
// Экранируем специальные символы в содержимом файла
			$image = mysqli_escape_string( $db,$image );
// Формируем запрос на добавление файла в базу данных
			$query="INSERT INTO `tasks_list`.`image` VALUE(NULL, '$image')";
// После чего остается только выполнить данный запрос к базе данных
			mysqli_query($db, $query );
	$type = getimagesize($_FILES['uploaded_image']['tmp_name']);
	if ($type && ($type['mime'] != 'image/png' ||
	              $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
		if ($_FILES['uploaded_image']['size'] < 1024 * 1000) {
			$upload = 'uploads/'.$_FILES['im']['name'];
			if (move_uploaded_file($_FILES['im']['tmp_name'], $upload)) echo 'Файл успешно загружен!';
			else echo 'Ошибка при загрузке файла';
		}
		else exit('Размер файла превышен!');
	}
	else exit('Тип файла не подходит');
}