<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 07.08.2017
 * Time: 13:06
 */

class Controller {
	public $model;
	public $view;
	function __construct()
	{
		$this -> view = new View();
	}
	function action_index()
	{
	}
}