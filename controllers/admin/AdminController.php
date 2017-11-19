<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 09.08.2017
 * Time: 19:17
 */

namespace app\controllers\admin;
use Controller;

class AdminController extends Controller {

//	public $layout = 'admin';
	public function Login(){
		session_start();

		/*
		Для простоты, в нашем случае, проверяется равенство сессионной переменной admin прописанному
		в коде значению — паролю. Такое решение не правильно с точки зрения безопасности.
		Пароль должен храниться в базе данных в захешированном виде, но пока оставим как есть.
		*/
		if ( $_SESSION['admin'] == "123" )
		{
			$this->view('../layouts/admin.php');
		}
		else
		{
			session_destroy();
			Route::ErrorPage404();
		}

	}
}