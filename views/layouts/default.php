<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tasks List Table</title>
    <link rel="stylesheet" href="/application/web/css/style.css"/>
    <link rel="stylesheet" href="/application/web/css/bootstrap.min.css">
    <link rel="stylesheet" href="/application/web/css/bootstrap.css">
    <link rel="stylesheet" href="/application/web/css/modal-contact-form.css">
    <link rel="stylesheet" href="/application/web/css/pop-up.css">
    <script type="text/javascript" src="/application/web/js/packed.js"></script>
    <script type="text/javascript" src="/application/web/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/application/web/js/jquery.form.min.js"></script>
</head>
<?php

?>
<body>
<div class="main">
	<script language="JavaScript" type="text/javascript">
	$.fn.popup = function() { 
		this.css('position', 'absolute').fadeIn();
		this.css('top', ($(window).height() - this.height()) / 2 + $(window).scrollTop() + 'px');
		this.css('left', ($(window).width() - this.width()) / 2  + 'px');
		$('.backpopup').fadeIn();
	}
	$(document).ready(function(){
		$('.open').click(function(){
			$('.popup-window').popup();
		});
		$('.backpopup,.close').click(function(){
			$('.popup-window').fadeOut();
			$('.backpopup').fadeOut();
		});
	});
	</script>
<?php

?>
<div class="backpopup"></div>
<input type="button" id="login" name="Login" class="btn btn-default open" value="Login" style="float: left">

	<div class="popup-window" style="position: absolute; display: none; top: 254.5px; left: 636.5px;">
		<p class="close">x</p>

<form action="/application/models/model_login.php" method="post">
<table align=center>
<tr>
<td>Логин:</td>
<td><input type="text" name="login" /></td>
</tr>
<tr>
<td>Пароль:</td>
<td><input type="password" name="password" /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" class="btn btn-successful" value="Войти" /></td>
</tr>
</table>
</form>
</div>

<div id="tasks_list">
<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
    <thead>
    <tr>
        <th class="nosort"><h3>ID</h3></th>
        <th><h3>Name</h3></th>
        <th><h3>Email</h3></th>
        <th><h3>Task</h3></th>
        <th><h3>Image</h3></th>
        <th><h3>Status</h3></th>

    </tr>
    </thead>
    <tbody>

    <?php
    	$db = mysqli_connect('localhost', 'id2563280_vladymyrlem', 'vg13ddt92', 'id2563280_mvctestwork');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$task = $_POST['task'];
		$image = $_POST['image'];
		$status = $_POST['Status'];
	}
	$result = mysqli_query($db,"SELECT * FROM `id2563280_mvctestwork`.tasks_list");
 $i = 1;
	do{
	    printf('<tr>
            <td name="ID">%d</td>
             <td name="name">%s</td>
             <td name="email"><a href="#">%s</a></td>
             <td name="task">%s</td>
             <td name="image">%s</td>
             <td name-"status">%s</td>
        </tr>',$i, $row['user_name'], $row['email'], $row['task'], $row['image'], $row['Status']);
	    $i++;
    }while($row = mysqli_fetch_array($result));
	mysqli_close($db);
?>
    </tbody>

</table>
</div>
<div id="controls">
    <div id="perpage">
        <select onchange="sorter.size(this.value)">
            <option value="5">5</option>
            <option value="10" selected="selected">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <span>Entries Per Page</span>
    </div>
    <div id="navigation">
        <img src="/application/web/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
        <img src="/application/web/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
        <img src="/application/web/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
        <img src="/application/web/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
    </div>
    <div id="text">Displaying Page <span id="currentpage"></span> of <span id="pagelimit"></span></div>
</div>

<script type="text/javascript" src="application/web/js/script.js"></script>
<script type="text/javascript">
    var sorter = new TINY.table.sorter("sorter");
    sorter.head = "head";
    sorter.asc = "asc";
    sorter.desc = "desc";
    sorter.even = "evenrow";
    sorter.odd = "oddrow";
    sorter.evensel = "evenselected";
    sorter.oddsel = "oddselected";
    sorter.paginate = true;
    sorter.currentid = "currentpage";
    sorter.limitid = "pagelimit";
    sorter.init("table",1);
</script>
<div id="creating">
<form action="" name="created" class="" >
<input type="button" value="Create task" class="btn-success show-btn" style="float: right;" onclick="javascript:window.location='https://mvc-testwork.000webhostapp.com/application/views/created.php'">
</form>
</div>
</body>
</html>