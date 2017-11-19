<?php
/**
 * Created by PhpStorm.
 * User: Vladymyrlem
 * Date: 07.08.2017
 * Time: 13:27
 */

include 'DB.php';
class Model_Task extends DB{
	public function getTask(){
		return array('id'=>1,'name'=>'name','email'=>'email');
	}
	function downloadImg($img_url, $tmp_name_img, $size_img)
	{
		$img_url1= self::translitPhp($img_url);
		$path = '../upload/'; // Путь к папке
		$file_type = substr($img_url1, strrpos($img_url1, '.')+1); // Получаем Расширение файла
		$pos = strpos($img_url1, ".");
		$fn = substr($img_url1, 0, $pos);
		$file_name = $fn;
		// Новое сгенирированное имя для нашего файла
		$img_url1=$file_name.(self::getRandomFileName($path, $file_type)).'_goodnets.ru_.'.$file_type;
		if (move_uploaded_file($tmp_name_img, $path . $img_url1)) {
			$newFileName = $path . $img_url1;
			// Открытие переданного изображения
			if (($file_type == 'png') || ($file_type == 'PNG')) {
				$src = imagecreatefrompng($newFileName);
				$ar = self::changeSizeImg($newFileName, $src);
				$dest = $ar[0];
				imagepng($dest, $newFileName, 0);
				imagedestroy($dest);
			}
			if (($file_type == 'jpg') || ($file_type == 'JPG') || ($file_type == 'jpeg') || ($file_type == 'JPEG')) {
				$src = imagecreatefromjpeg($newFileName);
				//$ar = self::changeSizeImg($newFileName, $src);
				$dest = $ar[0];
				imagejpeg($dest, $newFileName, 100);
				imagedestroy($dest);
			}
		}
	}
	public static function translitPhp($url){
		$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
		$lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
		$url= str_replace($rus, $lat, $url);
		return $url;
	}
	public static function getRandomFileName($path, $extension='')
	{
		$extension = $extension ? '.' . $extension : '';
		$path = $path ? $path . '/' : '';
		do {
			$name = md5(microtime() . rand(0, 9999));
			$file = $path . $name . $extension;
		} while (file_exists($file));
		return $name;
	}

	public static  function changeSizeImg($full_url, $src){
		// Получение размера загруженного изображения
		$imgInfo = getimagesize($full_url);
		// Масштабный коэффициент
		$scale = 768/$imgInfo[0];
		// Новая высота
		$newheight = $imgInfo[1]*$scale;
		settype($newheight, "integer");
		// Создание нового изображения
		$dest = imagecreatetruecolor(768, $newheight);
		imageAlphaBlending($dest, false);
		imageSaveAlpha($dest, true);
		// Копирование изображения
		imagecopyresampled($dest, $src, 0, 0, 0, 0, 768, $newheight, $imgInfo[0], $imgInfo[1]);
		return array($dest, $newheight);
	}



}