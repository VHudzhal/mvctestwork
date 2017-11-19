<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 10.08.2017
 * Time: 12:08
 */

class Controller {
	public function __construct() {
		echo 'Head Controller';
		$this->view = new View();
	}
}