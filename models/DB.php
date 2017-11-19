<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 11.08.2017
 * Time: 15:07
 */
include "application/config/db.php";

class DB {

	function connectToDb(){
		$db_host = 'localhost'; //host
		$db_user = 'id2563280_vladymyrlem'; // DB Login
		$db_password = 'vg13ddt92'; // DB Password
		$db_table = 'id2563280_mvctestwork'; // Table name
		$db = mysqli_connect($db_host, $db_user, $db_password) or die ('Не могу соединиться');
		mysqli_select_db($db,$db_table);
	}
	function closeConnecting(){
		$db_table = "id2563280_mvctestwork";
		mysqli_close('SELECT * FROM `tasks_list`',$db_table);
	}
}