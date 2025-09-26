

$(document).ready(function () {
    $('#event_dialog_exit').click(function () {
        colse_modals_event();
    });
});
//
function modal_insert_event(){
    $('#name_event_modal').val('');	
    $('#email_event_modal').val('');	

    $('#password_event_modal').val('');	
    $('#password_event_modal_label').val('Contraseña');
    $('#password_event_modal').prop('required', true);
    
    $('#password_repeat_event_modal').val('');	
    $('#password_repeat_event_modal').prop('required', true);
    $('#password_repeat_event_modal_label').val('Repite la contraseña');

    $('#type_event_modal').val('0');
    $('#event_dialog').show();	
    $('#save_event_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_event_modal').val();	
        var password_repeat = $('#password_repeat_event_modal').val();	
        if(password == password_repeat){
            var name = $('#name_event_modal').val();	
            var email = $('#email_event_modal').val();	
            var type = $('#type_event_modal').val();
            colse_modals_event();
            insert_event(name,email,type,password,password_repeat);
        }else{
            alert("Las contraseñas no coinciden")
        }
    });
}
function modal_edit_event(id,eventname,email,type,created_at){
    $('#name_event_modal').val(eventname);	
    $('#email_event_modal').val(email);	

    //$('#password_event_modal').val(password);
    //$('#password_event_modal_label').val('Contraseña anterior');
    $('#password_event_modal').prop('required', false);

    //$('#password_repeat_event_modal').val(password);	
    $('#password_repeat_event_modal').prop('required', false);
    //$('#password_repeat_event_modal_label').val('Nueva Contraseña');

    $('#type_event_modal').val(type);
    $('#event_dialog').show();
    $('#save_event_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_event_modal').val();	
        var password_repeat = $('#password_repeat_event_modal').val();
        if(password == password_repeat){
            var eventname = $('#name_event_modal').val();	
            var email_ = $('#email_event_modal').val();	
            var type_ = $('#type_event_modal').val();
            colse_modals_event();
            edit_event(id,eventname,email_,type_,created_at,password)
        }else{
            alert("Las contraseñas no coinciden")
        }

    });
}
//events
function get_events() {
    $.ajax({
        url: "../modules/module_events/get_events.php",
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
            alert("Error en ajax/get_events.php");
            $('#loading').show();	
        }
    });
}
function insert_event(eventname,email,type,password,password_repeat){
    $.ajax({
        url: "../modules/module_events/insert_event.php",
        type: "post",
        data: { "email": email, "password": password, "name": eventname, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                get_events();
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/insert_event.php");
            $('#loading').hide();
        }
    });
}
function edit_event(id,eventname,email,type,created_at,password){
    $.ajax({
        url: "../modules/module_events/update_event.php",
        type: "post",
        data: { "id":id, "name": eventname, "email": email, "password": password, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                //$(btnh.concat(clave)).attr("onclick", "javascript:habilita_edicion(" + clave + ")");
                get_events();
                $('#loading').hide();
                $('#campo_clave').show();
                $('#campo_pregunta').show();
                $('#btn_agrega').show();
            } else {
                $('#loading').hide();
                get_events();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/update_event.php");
            $('#loading').hide();
        }
    });
}
function delete_event(id){
    if (confirm("Do you want to continue?")) {
        $.ajax({
            url: "../modules/module_events/delete_event.php",
            type: "post",
            data: { 'id': id },
            dataType: 'json',
            beforeSend: function(){
                $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    get_events();
                }
                else {
                    alert(data.status);
                }
                $('#loading').hide();
            },
            error: function () {
                alert("Error en ajax/delete_event.php");
            }
        });
    } else {
        console.log("event canceled");
    }
    
}
function toggle_menu_event(id){
    $(id).toggle();
}
function colse_modals_event(){
    $('#user_dialog').hide();	
    $('#course_dialog').hide();
    $('#test_dialog').hide();
    $('#event_dialog').hide();
    $('#lesson_dialog').hide();
}