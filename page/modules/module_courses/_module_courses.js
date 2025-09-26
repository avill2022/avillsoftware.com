

$(document).ready(function () {
    $('#course_dialog_exit').click(function () {
        close_modals_course();
    });
});
//
function modal_insert_course(){
    $('#title_course').val('');	
    $('#instructor').val('');	
    $('#description').val('');	

    $('#course_dialog').show();	
    $('#save_course_form').off('submit').on('submit', function (e) {
       e.preventDefault();

        var title = $('#title_course').val();	
        var instructor = $('#instructor').val();	
        var description = $('#description').val();
        close_modals_course();
        //alert(title + " " + instructor + " " + description);
        insert_course(title,instructor,description);
    });
}
function modal_edit_course(id,title,instructor,description){
    $('#title_course').val(title);	
    $('#instructor').val(instructor);	
    $('#description').val(description);

    $('#course_dialog').show();
    $('#save_course_form').off('submit').on('submit', function (e) {
       e.preventDefault();

        var title = $('#title_course').val();	
        var instructor = $('#instructor').val();	
        var description = $('#description').val();
        close_modals_course();
        edit_course(id,title,instructor,description)
    });
}
//courses
function get_courses() {
    $.ajax({
        url: "../modules/module_courses/get_courses.php",
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
            alert("Error en ajax/get_courses.php");
            $('#loading').hide();	
        }
    });
}
function insert_course(title,instructor,description){
    $.ajax({
        url: "../modules/module_courses/insert_course.php",
        type: "post",
        data: { "title": title, "instructor": instructor, "description": description, "type":0},
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                get_courses();
                $('#loading').hide();
            } else {
                $('#loading').hide();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/insert_course.php");
            $('#loading').hide();
        }
    });
}
function edit_course(id,title,instructor,description){
    $.ajax({
        url: "../modules/module_courses/update_course.php",
        type: "post",
        data: { "id":id, "title": title, "instructor": instructor, "description": description },
        dataType: 'json',
        beforeSend: function(){
            $('#loading').show();	
        },
        success: function (data) {
            if (data.status == "OK") {
                //$(btnh.concat(clave)).attr("onclick", "javascript:habilita_edicion(" + clave + ")");
                get_courses();
                $('#loading').hide();
            } else {
                $('#loading').hide();
                get_courses();
                alert(data.status);
            }
        },
        error: function () {
            alert("Error en ajax/update_course.php");
            $('#loading').hide();
        }
    });
}
function delete_course(id){
    if (confirm("Do you want to continue?")) {
        $.ajax({
            url: "../modules/module_courses/delete_course.php",
            type: "post",
            data: { 'id': id },
            dataType: 'json',
            beforeSend: function(){
                $('#loading').show();	
            },
            success: function (data) {
                if (data.status == "OK") {
                    get_courses();
                }
                else {
                    alert(data.status);
                }
                $('#loading').hide();
            },
            error: function () {
                alert("Error en ajax/delete_course.php");
            }
        });
    } else {
        console.log("course canceled");
    }
    
}
function toggle_menu_course(id){
    $(id).toggle();
}
function close_modals_course(){	
    $('#course_dialog').hide();
}