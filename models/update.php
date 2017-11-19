<?php
$db_host = "localhost";
$db_user = "id2563280_vladymyrlem"; // Логин БД
$db_password = "vg13ddt92"; // Пароль БД
$db_table = "id2563280_mvctestwork"; // Имя Таблицы БД
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['task']) && isset($_POST['image']) && isset($_POST['status'])){
// Переменные с формы
$name = $_POST['name'];
$email = $_POST['email'];
$task = $_POST['task'];
$image = $_POST['image'];
$status = $_POST['status'];
$db = mysqli_connect($db_host, $db_user, $db_password) or die ('Не могу соединиться');
mysqli_select_db("mydb", $db);
mysqli_query("SET NAMES 'utf8'", $db);
	$result = mysqli_query ("INSERT INTO `id2563280_mvctestwork`.tasks_list (user_name, email, task, image, status) VALUES ('$name','$email','$task','$image','$status')");

echo "
<form action="update.php" method="post" id="edit_form">
            Name: <input type="text" name="e_name" id="e_name" /><br/>
            Email: <input type="email" name="e_email" id="e_email" /><br/>
            Task: <input type="text" name="e_task" id="e_task" /><br/>
            Image: <input type="image" name="e_image" id="e_image" /><br/>
            Status: <input type="text" name="e_status" id="e_status" /><br/>
            <input type="submit" value="Send" name="submit_edit" />
            <span id="cls_f">X</span>
        </form>
";
 ?>
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