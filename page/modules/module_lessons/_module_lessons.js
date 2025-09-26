

$(document).ready(function () {
    $('#lesson_dialog_exit').click(function () {
        colse_modals_lesson();
    });   
});
//
function modal_insert_lesson(){
    $('#name_lesson_modal').val('');	
    $('#email_lesson_modal').val('');	

    $('#password_lesson_modal').val('');	
    $('#password_lesson_modal_label').val('Contraseña');
    $('#password_lesson_modal').prop('required', true);
    
    $('#password_repeat_lesson_modal').val('');	
    $('#password_repeat_lesson_modal').prop('required', true);
    $('#password_repeat_lesson_modal_label').val('Repite la contraseña');

    $('#type_lesson_modal').val('0');
    $('#lesson_dialog').show();	
    $('#save_lesson_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_lesson_modal').val();	
        var password_repeat = $('#password_repeat_lesson_modal').val();	
        if(password == password_repeat){
            var name = $('#name_lesson_modal').val();	
            var email = $('#email_lesson_modal').val();	
            var type = $('#type_lesson_modal').val();
            colse_modals_lesson();
            insert_lesson(name,email,type,password,password_repeat);
        }else{
            alert("Las contraseñas no coinciden")
        }
    });
}
function modal_edit_lesson(id,lessonname,email,type,created_at){
    $('#name_lesson_modal').val(lessonname);	
    $('#email_lesson_modal').val(email);	

    //$('#password_lesson_modal').val(password);
    //$('#password_lesson_modal_label').val('Contraseña anterior');
    $('#password_lesson_modal').prop('required', false);

    //$('#password_repeat_lesson_modal').val(password);	
    $('#password_repeat_lesson_modal').prop('required', false);
    //$('#password_repeat_lesson_modal_label').val('Nueva Contraseña');

    $('#type_lesson_modal').val(type);
    $('#lesson_dialog').show();
    $('#save_lesson_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_lesson_modal').val();	
        var password_repeat = $('#password_repeat_lesson_modal').val();
        if(password == password_repeat){
            var lessonname = $('#name_lesson_modal').val();	
            var email_ = $('#email_lesson_modal').val();	
            var type_ = $('#type_lesson_modal').val();
            colse_modals_lesson();
            edit_lesson(id,lessonname,email_,type_,created_at,password)
        }else{
            alert("Las contraseñas no coinciden")
        }

    });
}
//lessons
function get_lessons() {
    $.ajax({
        url: "../modules/module_lessons/get_lessons.php",
        type: "post",
        data: {},
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                $('#content').html(data.tabla);
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/get_lessons.php");
            $('#loading').show();	
        }
    });
}
function insert_lesson(lessonname,email,type,password,password_repeat){
    $.ajax({
        url: "../modules/module_lessons/insert_lesson.php",
        type: "post",
        data: { "email": email, "password": password, "name": lessonname, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                get_lessons();
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/insert_lesson.php");
            $('#loading').hide();
        }
    });
}
function edit_lesson(id,lessonname,email,type,created_at,password){
    $.ajax({
        url: "../modules/module_lessons/update_lesson.php",
        type: "post",
        data: { "id":id, "name": lessonname, "email": email, "password": password, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                //$(btnh.concat(clave)).attr("onclick", "javascript:habilita_edicion(" + clave + ")");
                get_lessons();
                $('#loading').hide();
                $('#campo_clave').show();
                $('#campo_pregunta').show();
                $('#btn_agrega').show();
            } else {
                $('#loading').hide();
                get_lessons();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/update_lesson.php");
            $('#loading').hide();
        }
    });
}
function delete_lesson(id){
    if (confirm("Do you want to continue?")) {
        $.ajax({
            url: "../modules/module_lessons/delete_lesson.php",
            type: "post",
            data: { 'id': id },
            dataType: 'json',
            beforeSend: function(){
                $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    get_lessons();
                }
                else {
                    alert(data.status);
                }
                $('#loading').hide();
            },
            error: function () {
                alert("Error en ajax/delete_lesson.php");
            }
        });
    } else {
        console.log("lesson canceled");
    }
    
}
function toggle_menu_lesson(id){
    $(id).toggle();
}
function colse_modals_lesson(){
    $('#user_dialog').hide();	
    $('#course_dialog').hide();
    $('#test_dialog').hide();
    $('#event_dialog').hide();
    $('#lesson_dialog').hide();
}