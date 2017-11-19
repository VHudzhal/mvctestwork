 <?php
//  echo "<h1><b>ПТН ПНХ</b></h1"
//$enter_login = "admin";
//$enter_password = "123";
//$login = $_REQUEST['login'];
//$passw = $_REQUEST['passw'];
//session_start();

class model_login extends application\model\DB {
	private $_login;
	private $_password;
function login () { 	
ini_set ("session.use_trans_sid", true); 	session_start();  	if (isset($_SESSION['id']))//если сесcия есть 	

{ 		
if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если cookie есть, то просто обновим время их жизни и вернём true 		{ 			
SetCookie("login", "", time() - 1, '/'); 			SetCookie("password","", time() - 1, '/'); 			

setcookie ("login", $_COOKIE['login'], time() + 50000, '/'); 			

setcookie ("password", $_COOKIE['password'], time() + 50000, '/'); 			

$id = $_SESSION['id']; 			
lastAct($id); 			
return true; 		

} 		
else //иначе добавим cookie с логином и паролем, чтобы после перезапуска браузера сессия не слетала  		
{ 			
$rez = mysqli_query("SELECT id FROM `id2563280_mvctestwork`.users_list WHERE `Login`='{$_login}' AND `Password`='{$_password}'"); //запрашиваем строку с искомым id 			

if (mysqli_num_rows($rez) == 1) //если получена одна строка 			
{ 		
$row = mysqli_fetch_assoc($rez); //записываем её в ассоциативный массив 				

setcookie ("login", $row['login'], time()+50000, '/'); 				

setcookie ("password", md5($row['login'].$row['password']), time() + 50000, '/'); 

$id = $_SESSION['id'];
lastAct($id); 
return true; 			

} 
else return false; 		
} 
}	
else //если сессии нет, то проверим существование cookie. Если они существуют, то проверим их валидность по БД 	
{ 		
if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если куки существуют. 		

{ 			
$rez = mysqli_query("SELECT id FROM `id2563280_mvctestwork`.users_list WHERE login='{$_COOKIE['login']}'"); //запрашиваем строку с искомым логином и паролем 			
@$row = mysqli_fetch_assoc($rez); 			

if(@mysqli_num_rows($rez) == 1 && md5($row['login'].$row['password']) == $_COOKIE['password']) //если логин и пароль нашлись в БД 			

{ 				
$_SESSION['id'] = $row['id']; //записываем в сесиию id 				
$id = $_SESSION['id']; 				

lastAct($id); 				
return true; 			
} 			
else //если данные из cookie не подошли, то удаляем эти куки, ибо нахуй они такие нам не нужны 			
{ 				
SetCookie("login", "", time() - 360000, '/'); 				

SetCookie("password", "", time() - 360000, '/');	 				
return false; 			

} 		
} 		
else //если куки не существуют 		
{ 			
return false; 		
} 	
} 
}

function is_admin($id) { 	
@$rez = mysqli_query("SELECT `prava` FROM `id2563280_mvctestwork`.users_list WHERE id='$id'"); 	

if (mysqli_num_rows($rez) == 1) 	
{ 		
$prava = mysql1_result($rez, 0); 		

if ($prava == 1) return true; 		
else return false; 

} 	
else return false;	 
}


function logout () { 	
session_start(); 	
$id = $_SESSION['id'];			 	

mysqli_query("UPDATE `id2563280_mvctestwork`.users_list SET online=0 WHERE id='$id'"); //обнуляем поле online, говорящее, что пользователь вышел с сайта (пригодится в будущем) 	
unset($_SESSION['id']); //удаляем переменную сессии 	
SetCookie("login", ""); //удаляем cookie с логином 	

SetCookie("password", ""); //удаляем cookie с паролем  	
header('Location: http://https://mvc-testwork.000webhostapp.com/index.php'.$_SERVER['HTTP_HOST'].'/'); //перенаправляем на главную страницу сайта 
}
}