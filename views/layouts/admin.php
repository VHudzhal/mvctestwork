<?php
$db = mysqli_connect('localhost', 'id2563280_vladymyrlem', 'vg13ddt92', 'id2563280_mvctestwork');
mysqli_select_db($db, 'id2563280_mvctestwork');
				$id = $_POST['id'];                
				$name = $_POST['name'];
		$email = $_POST['email'];
		$task = $_POST['task'];
		$image = $_POST['image'];
		$status = $_POST['Status'];
$result = mysqli_query($db, "SELECT * FROM `id2563280_mvctestwork`.tasks_list");
	if (!($row = mysqli_fetch_array($result))){
		echo "No tasks";
		return;
	}
	if(isset($_POST['e_name']) AND isset($_POST['e_email']) AND isset($_POST['e_task']) AND isset($_POST['e_image']) AND isset($_POST['e_status'])){
$query = "UPDATE `id2563280_mvctestwork`.tasks_list SET `name`='$name', `email`='$email', `task`='$task', `image`='$image', `Status`='$status' WHERE id='$_POST[id]'";
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
mysqli_query($query) or die (mysqli_error());
header("location: admin.php");

}
?>
<html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Admin List Table</title>
	<link rel="stylesheet" href="/application/web/css/style.css"/>
	<link rel="stylesheet" href="/application/web/css/bootstrap.min.css">
	<link rel="stylesheet" href="/application/web/css/bootstrap.css">
	<link rel="stylesheet" href="/application/web/css/modal-contact-form.css">
	<!--<script type="text/javascript" src="/application/web/js/packed.js"></script>-->
	<script type="text/javascript" src="/application/web/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/application/web/js/jquery.form.min.js"></script>
<style type="text/css" id="redact">
		#tab_id {
			margin: 1% auto;
		}

		#tab_id .edit_row {
			background: #fbfb01;
			font-weight: 700;
			cursor: pointer;
		}

		#edit_form {
			display: none;
			position: relative;
			margin: 1% auto;
			width: 20em;
			background: #f8f9fb;
			text-align: center;
		}
		#cls_f {
			position: absolute;
			top: -4px;
			right: -4px;
			background: #fbfb01;
			border: 2px solid #e00;
			border-radius: .4em;
			padding: 2px;
			font-size: 14px;
			font-weight: 700;
			cursor: pointer;
		}
	</style>
</head>

<body>

<div class="main">
<form action="/application/models/logout.php" name="logout_form">
	<input type="submit" id="logout" name="Logout" class="btn btn-default open" value="Logout" style="float: left">
</form>
<div id="tasks_list">
<table cellpadding="0" cellspacing="0" border="0" id="tab_id" class="sortable">
	<thead>
	<tr>
		<th class="nosort">Edit</th>
		<th class="nosort asc"><h3>ID</h3></th>
		<th class="head name"><h3>Name</h3></th>
		<th class="head email"><h3>Email</h3></th>
		<th class="head task"><h3>Task</h3></th>
		<th class="head image"><h3>Image</h3></th>
		<th class="head status"><h3>Status</h3></th>

	</tr>
	</thead>
	<tbody>

<?php
$i = 1;
	do{
		printf('<tr>
			<td class="edit_row nosort"><form method="post" action="" name="edit_form" >&#x2710;</form></td>
			<td name="ID" class="nosort">%d</td>
		   <td id="name" class="row_n">%s</td>
		   <td id="email" class="row_em"><a href="#">%s</a></td>
		   <td id="task" class="row_t">%s</td>
			<td id="image" class="row_img">%s</td>
			<td id="status" class="row_s">%s</td>
		</tr>',$i, $row['user_name'], $row['email'], $row['task'], $row['image'], $row['Status']);
		$i++;
	}while($row = mysqli_fetch_array($result));
	mysqli_close($db);
?>
	</tbody>

</table>
<div class="pagination-container">
	<nav>
		<ul class="pagination"></ul>
	</nav>
</div>

<form action="admin.php" method="post" id="edit_form">
			Name: <input type="text" name="e_name" id="e_name" /><br/>
			Email: <input type="email" name="e_email" id="e_email" /><br/>
			Task: <input type="text" name="e_task" id="e_task" /><br/>
			Image: <input type="image" name="e_image" id="e_image" /><br/>
			Status: <input type="text" name="e_status" id="e_status" /><br/>
			<input type="submit" value="Send" name="submit_edit" />
			<span id="cls_f">X</span>
		</form>
</div>
<script type="text/javascript">
	var edit_row = document.querySelectorAll('#tab_id .edit_row');
	for(var i=0; i<edit_row.length; i++) {
		edit_row[i].addEventListener('click', function(e){
			// get parent row, add data from its cells in form fields
			var tr_parent = this.parentNode;
			document.getElementById('e_name').value = tr_parent.querySelector('.row_n').innerHTML;
			document.getElementById('e_email').value = tr_parent.querySelector('.row_em').innerHTML;
			document.getElementById('e_task').value = tr_parent.querySelector('.row_t').innerHTML;
			//document.getElementById('e_img').value =  tr_parent.querySelector('.row_img').innerHTML;
			document.getElementById('e_status').value = tr_parent.querySelector('.row_s').innerHTML;

			// display the form, and focus on a form field
			document.getElementById('edit_form').style.display = 'block';
			document.getElementById('e_name').focus();
		}, false);
	}

	// to hide #edit_form when click on #cls_f button
	document.getElementById('cls_f').addEventListener('click', function(){ this.parentNode.style.display = 'none';}, false);
</script>
<div class="container">
	<h4>Select Number of Rows</h4>
	<div id="perpage" class="form-group">
		<select id="maxRows">
			<option value="5000" selected="selected">Show All</option>
			<option value="5">5</option>
			<option value="10">10</option>
			<option value="20">20</option>
			<option value="50">50</option>
			<option value="100">100</option>
		</select>
	</div>
</div>
<!--pagination-->
<script type="text/javascript" src="/application/web/js/bootstrap.min.js"></script>
<script>
	var table = '#tab_id';
$('#maxRows').on('change', function(){
		$('.pagination').html('')
	var trnum = 0
	var maxRows = parselnt($(this).val())
	var totalRows = $(table*' tbody tr').length
	$(table+ 'tr:gt(0)').each(function(){
	trnum++
	if(trnum > maxRows) {
		$(this).hide()
	}
		if(trnum <= maxRows){
			$(this).show()
		}
	})
		if(totalRows > maxRows){
	var pagenum = Math.ceil(totalRows/maxRows)
	for(var i=1;i<=pagenum;){
		$('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ + '<span class="sr-only">(current)</span></span>\</li>').show()
	}
}
$('.pagination li:first-child').addClass('active')
$('.pagination li').on('click',function(){
	var pageNum = $(this).attr('data-page')
	var trIndex = 0;
	$('.pagination li').removeClass('active')
	$(this).addClass('active')
	$(table+ 'tr:gt(0)').each(function(){
	trIndex++
	if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
	$(this).hide()
	}else{
		$(this).show()
	}
	})
	})
})
$(function(){
		$(table 'tr:eq(0)').prepend('<th>ID</th>')
		  var id = 0;
	$('table tr:gt(0)').each(function(){
	id++
	$(this).prepend('<td>'+id+'</td>')
	})
})
</script>


<!--<div id="controls">

	<div id="navigation">
		<img src="/application/web/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
		<img src="/application/web/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
		<img src="/application/web/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
		<img src="/application/web/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
	</div>
	<div id="text">Displaying Page <span id="currentpage"></span> of <span id="pagelimit"></span></div>
</div>-->
<script type="text/javascript" src="/application/web/js/script.js"></script>
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
<form action="/application/views/created.php" name="created" class="" >
<input type="button" value="Create task" class="btn-success show-btn" style="float: right;" onclick="javascript:window.location='https://mvc-testwork.000webhostapp.com/application/views/created.php'">
</form>
</div>
</body>
</html>