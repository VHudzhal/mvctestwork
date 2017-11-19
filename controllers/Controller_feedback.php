<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 14.08.2017
 * Time: 23:07
 */

class Controller_feedback {
public function model($model){
	require_once ('../application/models'.$model.'.php');
	return new $model();
}
public function view($view,$data=[]){
	require_once('../application/views'.$view.'.php');
}
}