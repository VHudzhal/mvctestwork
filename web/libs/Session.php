<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 09.08.2017
 * Time: 17:05
 */

class Session{
	public static function init() {
		@session_start();
	}

	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	public static function get($key) {
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
	}

	public static function destroy() {
		// unset($_SESSION);
		session_destroy();
	}
}
