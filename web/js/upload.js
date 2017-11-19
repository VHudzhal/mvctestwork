$(document).ready(function(){
    var button = $("#butUpload"), interval, file;
    new AjaxUpload(button, {
        action: "created.php?upload=1",
        //data: {file: "file"},
        name: "userfile",
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
                // extension is not allowed
                alert('Ошибка! Разрешены только картинки');
                // cancel upload
                return false;
            }
            button.text("Загрузка");
            this.disable();
            
            interval = setInterval(function(){
                var text = button.text();
                if(text.length < 11){
                    button.text(text + ".");
                }else{
                    button.text("Загрузка");
                }
            }, 300);
        },
        onComplete: function(file, response){
            button.text("Загрузить еще");
            window.clearInterval(interval);
            this.enable();
            
            response = JSON.parse(response);
            $("#filesUpload").append(response.answer + " - " + response.file + "<br />");
        }
    }); 
});