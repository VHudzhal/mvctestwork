<?php
// Задаем константы:
//define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
//$sitePath = realpath(dirname(__FILE__) . DS) . DS;
//define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

// для подключения к бд
define('DB_USER', 'id2563280_vladymyrlem');
define('DB_PASS', 'vg13ddt92');
define('DB_HOST', 'localhost');
define('DB_NAME', 'id2563280_mvctestwork');
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

ini_set('memory_limit', '1024M');