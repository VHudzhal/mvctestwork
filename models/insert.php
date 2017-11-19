<?php
header("Content-Type: text/html; charset=UTF-8");
	$db = mysqli_connect('localhost', 'id2563280_vladymyrlem', 'vg13ddt92', 'id2563280_mvctestwork');
                $name = $_POST['name'];
		$email = $_POST['email'];
		$task = $_POST['task'];
		$image = $_POST['uploaded_image'];
		$status = $_POST['status'];
	$result = mysqli_query($db,
"INSERT INTO
    `id2563280_mvctestwork`.tasks_list (
        `user_name`,
        `email`,
        `task`,
        `image`,
        `Status`
    )
 VALUES (
'".$name."',
'".$email."',
'$task', 
'$image',
'$status')");
	//echo $result;
mysql_close();
header('Refresh: 100; URL=https://mvc-testwork.000webhostapp.com/index.php');
exit();?>
<script type="text/javascript">
location.replace("https://mvc-testwork.000webhostapp.com/index.php");
</script>