

$(document).ready(function () {
    $('#test_dialog_exit').click(function () {
        colse_modals_test();
    });   
    $('#insert_questions').click(function () {
        $('#questions_modal_test').append(createQuestion());
    });   
});

function createQuestion(){
    return '<div class="rounded-xl border border-white/20 backdrop-blur-xl text-white shadow-xl bg-white/5 p-4"><div class="flex justify-between items-center mb-4"><h4 class="font-semibold">Pregunta 1</h4><button    class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-destructive text-destructive-foreground hover:bg-destructive/90 h-10 w-10">    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"class="h-4 w-4"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg></button></div><div class="space-y-2"><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white">Tipo de Pregunta</label><button type="button" role="combobox" aria-controls="radix-:r8:" aria-expanded="false"    aria-autocomplete="none" dir="ltr" data-state="closed"    class="flex h-12 w-full items-center justify-between rounded-lg border border-white/20 bg-white/10 px-4 py-3 text-sm placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 disabled:cursor-not-allowed disabled:opacity-50 [&amp;&gt;span]:line-clamp-1">    <span style="pointer-events: none;">Opción Múltiple</span>    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"class="h-4 w-4 opacity-50" aria-hidden="true"><path d="m6 9 6 6 6-6"></path></svg></button><label class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white">Pregunta</label><textarea    class="flex min-h-[80px] w-full rounded-lg border border-white/20 bg-white/10 px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200"></textarea><label    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white">Opciones</label><input    class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200"    placeholder="Opción 1" value=""><input    class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200"    placeholder="Opción 2" value=""><label    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-white">Respuesta    Correcta (texto exacto de la opción)</label><input    class="flex h-12 w-full rounded-lg border border-white/20 bg-white/10 backdrop-blur-sm px-4 py-3 text-sm text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent disabled:cursor-not-allowed disabled:opacity-50 transition-all duration-200"    value=""></div></div>';
}
//
function modal_insert_test(){
    $('#name_test_modal').val('');	
    $('#email_test_modal').val('');	

    $('#password_test_modal').val('');	
    $('#password_test_modal_label').val('Contraseña');
    $('#password_test_modal').prop('required', true);
    
    $('#password_repeat_test_modal').val('');	
    $('#password_repeat_test_modal').prop('required', true);
    $('#password_repeat_test_modal_label').val('Repite la contraseña');

    $('#type_test_modal').val('0');
    $('#test_dialog').show();	
    $('#save_test_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_test_modal').val();	
        var password_repeat = $('#password_repeat_test_modal').val();	
        if(password == password_repeat){
            var name = $('#name_test_modal').val();	
            var email = $('#email_test_modal').val();	
            var type = $('#type_test_modal').val();
            colse_modals_test();
            insert_test(name,email,type,password,password_repeat);
        }else{
            alert("Las contraseñas no coinciden")
        }
    });
}
function modal_edit_test(id,testname,email,type,created_at){
    $('#name_test_modal').val(testname);	
    $('#email_test_modal').val(email);	

    //$('#password_test_modal').val(password);
    //$('#password_test_modal_label').val('Contraseña anterior');
    $('#password_test_modal').prop('required', false);

    //$('#password_repeat_test_modal').val(password);	
    $('#password_repeat_test_modal').prop('required', false);
    //$('#password_repeat_test_modal_label').val('Nueva Contraseña');

    $('#type_test_modal').val(type);
    $('#test_dialog').show();
    $('#save_test_form').off('submit').on('submit', function (e) {
       e.preventDefault();
        var password = $('#password_test_modal').val();	
        var password_repeat = $('#password_repeat_test_modal').val();
        if(password == password_repeat){
            var testname = $('#name_test_modal').val();	
            var email_ = $('#email_test_modal').val();	
            var type_ = $('#type_test_modal').val();
            colse_modals_test();
            edit_test(id,testname,email_,type_,created_at,password)
        }else{
            alert("Las contraseñas no coinciden")
        }

    });
}
//tests
function get_tests() {
    $.ajax({
        url: "../modules/module_tests/get_tests.php",
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
            alert("Error en ajax/get_tests.php");
            $('#loading').show();	
        }
    });
}
function insert_test(testname,email,type,password,password_repeat){
    $.ajax({
        url: "../modules/module_tests/insert_test.php",
        type: "post",
        data: { "email": email, "password": password, "name": testname, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                get_tests();
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/insert_test.php");
            $('#loading').hide();
        }
    });
}
function edit_test(id,testname,email,type,created_at,password){
    $.ajax({
        url: "../modules/module_tests/update_test.php",
        type: "post",
        data: { "id":id, "name": testname, "email": email, "password": password, "type":type },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                //$(btnh.concat(clave)).attr("onclick", "javascript:habilita_edicion(" + clave + ")");
                get_tests();
                $('#loading').hide();
                $('#campo_clave').show();
                $('#campo_pregunta').show();
                $('#btn_agrega').show();
            } else {
                $('#loading').hide();
                get_tests();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/update_test.php");
            $('#loading').hide();
        }
    });
}
function delete_test(id){
    if (confirm("Do you want to continue?")) {
        $.ajax({
            url: "../modules/module_tests/delete_test.php",
            type: "post",
            data: { 'id': id },
            dataType: 'json',
            beforeSend: function(){
                $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    get_tests();
                }
                else {
                    alert(data.status);
                }
                $('#loading').hide();
            },
            error: function () {
                alert("Error en ajax/delete_test.php");
            }
        });
    } else {
        console.log("test canceled");
    }
    
}
function toggle_menu_test(id){
    $(id).toggle();
}
function colse_modals_test(){
    $('#user_dialog').hide();	
    $('#course_dialog').hide();
    $('#test_dialog').hide();
    $('#event_dialog').hide();
    $('#lesson_dialog').hide();
}