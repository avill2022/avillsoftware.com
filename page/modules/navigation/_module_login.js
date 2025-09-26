export const module_login = {
    login(email,password) {
          $.ajax({
            url: 'login.php',
            type: 'POST',
            data: { email: email, password: password },
            dataType: 'json',
            beforeSend: function(){
                    $('#loading').show();	
            },
            success: function (response) {
            if (response.status === 'OK') {
                window.location.href = 'main.php';
            } else {
                alert('Login failed: ' + response.message);
            }
            $('#loading').hide();	
            },
            error: function () {
            alert("Error en login.php");
            $('#loading').hide();
            }
        });
        //alert("Error en ajax/delesdfdste_user.php");
    },
    logout() {
        $.ajax({
            url: "logout.php",
            type: "post",
            data: {},
            dataType: 'json',
            beforeSend: function(){
			    $('#loading').show();	
	        },
            success: function (data) {
                if (data.status == "OK") {

                }
                else {
                    alert(data.status);
                }
                $('#loading').hide();
            },
            error: function () {
                alert("Error en ajax/logout.php");
                $('#loading').hide();
            }
        });
    }
};