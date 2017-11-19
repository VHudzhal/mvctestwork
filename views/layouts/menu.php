<html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tasks List Table</title>

</head>
<body>
<script type="text/javascript">
    $.fn.popup = function() { 	//функция для открытия всплывающего окна:
        this.css('position', 'absolute').fadeIn();	//задаем абсолютное позиционирование и эффект открытия
        //махинации с положением сверху:учитывается высота самого блока, экрана и позиции на странице:
        this.css('top', ($(window).height() - this.height()) / 2 + $(window).scrollTop() + 'px');
        //слева задается отступ, учитывается ширина самого блока и половина ширины экрана
        this.css('left', ($(window).width() - this.width()) / 2  + 'px');
        //открываем тень с эффектом:
        $('.backpopup').fadeIn();
    }
    $(document).ready(function(){	//при загрузке страницы:
        $('.open').click(function(){	//событие клик на нашу ссылку
            $('.popup-window').popup();	//запускаем функцию на наш блок с формой
        });
        $('.backpopup,.close').click(function(){ //событие клик на тень и крестик - закрываем окно и тень:
            $('.popup-window').fadeOut();
            $('.backpopup').fadeOut();
        });
    });
</script>
<style type="text/css">
    .popup-window{	//форма для заполнения
    display button: none;
        box-shadow: 0px 0px 4px 0px rgb(70, 70, 70);
        -webkit-box-shadow: 0px 0px 4px 0px rgb(70, 70, 70);
        -moz-box-shadow: 0px 0px 4px 0px rgb(70, 70, 70);
        padding: 20px;
        background: white;
        z-index: 500;
        -webkit-border-radius: 5px!important;
        -moz-border-radius: 5px!important;
        border-radius: 5px!important;
    }
    .open{ 	//кнопка-ссылка
    text-decoration: underline;
        cursor: pointer;
    }
    .backpopup{		//тень
    display button:none;
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgb(105, 105, 105);
        opacity: 0.7;
        top: 0;
        left: 0;
        z-index: 400;
        cursor: pointer;
    }
    .close{		//кнопка закрытия окна
    float: right;
        cursor: pointer;
        right: 5px;
        top: 0px;
        position: absolute;
        padding: 4px;
    }
</style>
<div class="backpopup"></div>
<div class="popup-window" id="popup-window">	//форма для заполнения
    <p class="close">x</p>
    <table>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input type="text"/>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="password"/>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit"/>
            </td>
        </tr>

    </table>
</div>
<form action="">
    <input type="button" id="login-ajax" name="login" class="btn btn-default" value="Login" style="float: left"
           onclick="document.getElementById('envelope').style.display='table';document.getElementById('fade').style.display='block'">
</form>
</body>
</html>