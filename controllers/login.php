<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 09.08.2017
 * Time: 16:56
 */
include "../models/model_login.php";
class Login extends Controller {
	public $model_login;
	public  $load;
	function __construct()
	{
		$this->load = new model_login();
	}

public function run()
{
	if(isset($_POST['login']) && isset($_POST['password']))
	{
		$login = $_POST['login'];
		$password =$_POST['password'];

		/*
		Производим аутентификацию, сравнивая полученные значения со значениями прописанными в коде.
		Такое решение не верно с точки зрения безопсаности и сделано для упрощения примера.
		Логин и пароль должны храниться в БД, причем пароль должен быть захеширован.
		*/
		if($login=="admin" && $password=="123")
		{
			$data["login_status"] = "access_granted";

			session_start(); echo $_SESSION['admin'];
			$_SESSION['admin'] = $password;
			header('Location:/admin/');
		}
		else
		{
			$data["login_status"] = "access_denied";
		}
	}
	else
	{
		$data["login_status"] = "";
	}

	$this->load->view('index.php', $data);
}
}