<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 07.08.2017
 * Time: 12:57
 */

class View
{
	function generate($content, $template, $data = null)
	{
		include 'application/views/' . $template;
	}
}