<?php
	$db = mysqli_connect('localhost', 'id2563280_vladymyrlem', 'vg13ddt92', 'id2563280_mvctestwork');
// 	mysqli_select_db($db,'id2563280_mvctestwork');
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$task = $_POST['task'];
		$image = $_POST['image'];
		$status = $_POST['Status'];
	}
	$result = mysqli_query($db,"INSERT INTO `id2563280_mvctestwork`.tasks_list(`user_name`, `email`, `task`, `image`, `Status`) VALUES ('$name','$email','$task','$image','$status')");
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Creating Tasks</title>
    <link rel="stylesheet" href="../web/css/style.css"/>
    <link rel="stylesheet" href="../web/css/bootstrap.min.css">
    <link rel="stylesheet" href="../web/css/bootstrap.css">
    <link rel="stylesheet" href="../web/css/modal-contact-form.css">
    <link rel="stylesheet" href="../web/css/modalwin_style.css">
    <script type="text/javascript" src="../web/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../web/js/jquery.form.min.js"></script>
    <style type="text/css" id="redact">
        #created_tab {
            margin: 1% auto;
        }

        #created_tab .edit_row {
            background: #fbfb01;
            font-weight: 700;
            cursor: pointer;
        }

        #edit_row {
            display: none;
            position: relative;
            margin: 1% auto;
            width: 20em;
            background: #f8f9fb;
            text-align: center;
        }

    </style>

    <style type="text/css">

        #wrap{
            display: none;
            opacity: 0.8;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            padding: 16px;
            background-color: rgba(1, 1, 1, 0.725);
            z-index: 100;
            overflow: auto;
        }

        #envelope{
            width: 500px;
            height: 400px;
            margin: 50px auto;
            display: none;
            background: #fff;
            z-index: 200;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            padding: 16px;
        }

        .close-btn{
            margin-left: 364px;
            margin-top: 4px;
            cursor: pointer;
        }

    </style>

</head>
<body>

<div id="tasks" style="margin-top: 25%" class="btn-group">
    <form action="/index.php" method="post" id="tab_form">
        <table style="" id="created_tab">
            <tr class="" style="padding-right: 10px;padding-top: 25px;">
                <td style="">
                    <label for="name" style="">Name</label>
                </td>
                <td style="">
                    <label for="email" style="">Email</label>
                </td>
            </tr>
            <tr class="" style="padding-top: 25px">
                <td style="padding-right: 25px">                    

                    <input type="text" name="name" id="name" class="name row_n">
                </td>
                <td>
                    <input type="text" name="email" id="email" class="email row_em">
                </td>
            </tr>
            <tr>
                <td colspan="2"><label for="task" class=""
                                       style="position: static; padding-top: 25px">Task</label></td>
            </tr>
            <tr style="">
                <td colspan="2" style="padding-top: 10px">
                    <textarea name="task" style="width: 100%" class="row_t" id="task" cols="30" rows="10">
                        
                    </textarea>
                </td>
            </tr>
            <tr>
                <form action="" method="post" name="status" id="status">
                    <td id="solved" class="row_s"><p><input title="solved" class="radio radio-inline" type="radio" name="status"
                                              checked value="Solved">Solved</p></td>
                    <td id="notsolved" class="row_s"><p><input title="notsolved" class="radio radio-inline" type="radio" name="status"
                                                 value="Not Solved">Not Solved</p></td>
                </form>
				<?php
				$solved     = 'unchecked';
				$not_solved = 'unchecked';

				if ( isset( $_POST['Create'] ) ) {
					$select = $_POST['status'];
					if ( $select == 'Not Solved' ) {
						$solved = 'checked';
					} else if ( $select = 'Solved' ) {
						$not_solved = 'checked';
					}
				}
				?>

            </tr>
            <tr style="padding-top: ">
                <td>
                    <!--<form action="../../models/upload.php" method="post" enctype="multipart/form-data" id="form" name="upload">-->
 <input type="file" onchange="previewFile()"><br>
             <img src="" height="200" alt="Image preview...">

                        <!--<input type="file" name="uploaded_image" id="uploaded_image" >-->
                    <!--</form>-->
        <!--<div id="load">-->
        <!--</div>-->
                </td>

                <td style="padding-top: 16px">
                    <div style="float: left; margin-left: auto">
                    <input type="button" class="show-btn" onclick="show('block');document.nameform.target='_blank'; nameform.submit();"  value="Preview" name="Prev">

                    <input type="submit" style="float: left" class="show-btn" name="Create" onclick="location.href='application/index.php'.mode('tasks')" value="Create">
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    function show(state){

        document.getElementById('envelope').style.display = state;
        document.getElementById('wrap').style.display = state;
    }
</script>
<!--задний затемненный фон-->
<div onclick="show('none')" id="wrap" style="display: none;"></div>
<!--//всплывающая форма-->
<div id="envelope" class="black-overlay" style="display: none;">

<form method="POST" action="" id="edit_form">
        <label for="your-name">Name</label>
        <input type="text" id="your-name" name="prev-name" formmethod="post" value="" class="your-name" required/>
        <input type="text" id="your-email" name="prev-email" value="<?php echo $_POST['email']; ?>" class="email-address" required/>
        <textarea class="your-task" name="prev-tesk" placeholder="* Ваше задание">
<?php echo $_POST['task']; ?>
        </textarea>
        <input type="submit" name="send" value="Сохранить" class="send-task" onclick="location.href='application/index.php'.mode('tasks')">
</form>
</div>
<div id="fade" class="black-overlay" ></div>
</body>
<script type="text/javascript" src="../web/js/main.js"></script>

<script type="text/javascript">
    function addRow(id){
        var tbody = document.getElementById(id).getElementsByTagName("TBODY")[0];
        var row = document.createElement("TR");
        function addRow(id){
            var td1 = document.createElement("TD");
            td1.appendChild(document.createTextNode("column 1"));
            var td2 = document.createElement("TD");
            td2.appendChild (document.createTextNode("column 2"));
            row.appendChild(td1);
            row.appendChild(td2);
            tbody.appendChild(row);
        }}
    </script>
    <script>
    function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
</script>
</html>