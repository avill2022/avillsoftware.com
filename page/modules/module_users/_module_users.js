$(document).ready(function () {
    $('#user_dialog_exit').click(function () {
        colse_modals_user();
    });   
});
//
function modal_insert_user(){
    $('#name_user_modal').val('');	
    $('#email_user_modal').val('');	

    $('#password_user_modal').val('');	
    $('#password_user_modal_label').val('Contraseña');
    $('#password_user_modal').prop('required', true);
    
    $('#password_repeat_user_modal').val('');	
    $('#password_repeat_user_modal').prop('required', true);
    $('#password_repeat_user_modal_label').val('Repite la contraseña');

    $('#type_user_modal').val('0');
    $('#user_dialog').show();	
    $('#save_user_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_user_modal').val();	
        var password_repeat = $('#password_repeat_user_modal').val();	
        if(password == password_repeat){
            var name = $('#name_user_modal').val();	
            var email = $('#email_user_modal').val();	
            var type = $('#type_user_modal').val();
            colse_modals_user();
            insert_user(name,email,type,password,password_repeat);
        }else{
            alert("Las contraseñas no coinciden")
        }
    });
}
function modal_edit_user(id,username,email,type,created_at){
    $('#name_user_modal').val(username);	
    $('#email_user_modal').val(email);	

    //$('#password_user_modal').val(password);
    //$('#password_user_modal_label').val('Contraseña anterior');
    $('#password_user_modal').prop('required', false);

    //$('#password_repeat_user_modal').val(password);	
    $('#password_repeat_user_modal').prop('required', false);
    //$('#password_repeat_user_modal_label').val('Nueva Contraseña');

    $('#type_user_modal').val(type);
    $('#user_dialog').show();
    $('#save_user_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_user_modal').val();	
        var password_repeat = $('#password_repeat_user_modal').val();
        if(password == password_repeat){
            var username = $('#name_user_modal').val();	
            var email_ = $('#email_user_modal').val();	
            var type_ = $('#type_user_modal').val();
            colse_modals_user();
            edit_user(id,username,email_,type_,created_at,password)
        }else{
            alert("Las contraseñas no coinciden")
        }

    });
}
//users
function get_users() {
    $.ajax({
        url: "../modules/module_users/get_users.php",
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
            alert("Error en ajax/get_users.php");
            $('#loading').show();	
        }
    });
}
function insert_user(username,email,type,password,password_repeat){
    $.ajax({
        url: "../modules/module_users/insert_user.php",
        type: "post",
        data: { "email": email, "password": password, "name": username, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                get_users();
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/insert_user.php");
            $('#loading').hide();
        }
    });
}
function edit_user(id,username,email,type,created_at,password){
    $.ajax({
        url: "../modules/module_users/update_user.php",
        type: "post",
        data: { "id":id, "name": username, "email": email, "password": password, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                //$(btnh.concat(clave)).attr("onclick", "javascript:habilita_edicion(" + clave + ")");
                get_users();
                $('#loading').hide();
                $('#campo_clave').show();
                $('#campo_pregunta').show();
                $('#btn_agrega').show();
            } else {
                $('#loading').hide();
                get_users();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/update_user.php");
            $('#loading').hide();
        }
    });
}
function delete_user(id){
    if (confirm("Do you want to continue?")) {
        $.ajax({
            url: "../modules/module_users/delete_user.php",
            type: "post",
            data: { 'id': id },
            dataType: 'json',
            beforeSend: function(){
                $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    get_users();
                }
                else {
                    alert(data.status);
                }
                $('#loading').hide();
            },
            error: function () {
                alert("Error en ajax/delete_user.php");
            }
        });
    } else {
        console.log("User canceled");
    }
    
}
function toggle_menu_user(id){
    $(id).toggle();
}
function colse_modals_user(){
    $('#user_dialog').hide();	
    $('#course_dialog').hide();
    $('#test_dialog').hide();
    $('#event_dialog').hide();
    $('#lesson_dialog').hide();
}

/*export const module_users = {
    delete_user(clave) {
        bootbox.confirm('<h4 style="color:#F00"><b>Atenci&oacute;n!</b></h4><br><h5>Esta seguro de querer borrar la pregunta?</h5>',
            function (result) {
                if (result == true) {
                    $.ajax({
                        url: "../module_users/delete_user.php",
                        type: "post",
                        data: { 'campo_clave': clave },
                        dataType: 'json',
                        beforeSend: function(){
                            $('#loading').show();	
                        },
                        success: function (data) {
                            if (data.status == "OK") {
                                module_users.get_users();
                            }
                            else {
                                alert(data.status);
                            }
                            $('#loading').hide();
                        },
                        error: function () {
                            alert("Error en ajax/delete_user.php");
                        }
                    });

                }
            });
    },
    get_users() {
        $.ajax({
            url: "../modules/module_users/get_users.php",
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
                alert("Error en ajax/get_users.php");
                $('#loading').show();	
            }
        });
    },
    insert_user(email,password,name,type) {
        $.ajax({
            url: "../modules/module_users/insert_user.php",
            type: "post",
            data: { "email": email, "password": password, "name": name, "type":type },
            dataType: 'json',
            beforeSend: function(){
                $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    module_users.get_users();
                    $('#loading').hide();
                } else {
                    $('#loading').hide();
                    alert(data.status);
                }
            },
            error: function () {
                alert("Error en ajax/insert_user.php");
                $('#loading').hide();
            }
        });
    },
    update_user(clave) {
        var btnh = '#btnh';
        var campo_pregunta = '#campo_pregunta';
        var campo_clave = '#campo_clave';

        var campo_clave = $(campo_clave.concat(clave)).val();
        var campo_pregunta = $(campo_pregunta.concat(clave)).val();

        $.ajax({
            url: "../modules/module_users/modificar_pregunta.php",
            type: "post",
            data: { "clave": clave, "campo_clave": campo_clave, "campo_pregunta": campo_pregunta },
            dataType: 'json',
            beforeSend: function(){
                    $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    $(btnh.concat(clave)).attr("onclick", "javascript:habilita_edicion(" + clave + ")");
                    module_users.get_users();
                    $('#loading').hide();
                    $('#campo_clave').show();
                    $('#campo_pregunta').show();
                    $('#btn_agrega').show();
                } else {
                    $('#loading').hide();
                    module_users.get_users();
                    alert(data.status);
                }
            },
            error: function () {
                alert("Error en ajax/modificar_pregunta.php");
                $('#loading').hide();
            }
        });
    },
    habilita_edicion(clave) {
        var btne = '#btne';
        var btnh = '#btnh';
        var diva = '#diva';
        var divg = '#divg';
        var campo_pregunta = '#campo_pregunta';
        var campo_clave = '#campo_clave';
        $('#campo_clave').hide();
        $('#campo_pregunta').hide();
        $('#btn_agrega').hide();
        $(diva.concat(clave)).hide();
        $(divg.concat(clave)).show();
        $(campo_pregunta.concat(clave)).prop('disabled', false);
        $(campo_clave.concat(clave)).prop('disabled', false);
    }
};*/