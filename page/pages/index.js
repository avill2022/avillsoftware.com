$(document).ready(function () {
  //module_users.obtener_preguntas();
  //module_users.insert_user(email,password,"Beethoven",1)
  $('#loading').hide();	
    $('#comenzar_proyecto').on('click', function() {
      // Aquí va tu lógica
      $('#radix').show();
      clear_dialog()
  });
  $('#consulta_gratis').on('click', function() {
      // Aquí va tu lógica
      $('#radix').show();
      clear_dialog()
  });
  $('#consulta_gratuita_ahora').on('click', function() {
      // Aquí va tu lógica
      $('#radix').show();
      clear_dialog()
  });
  //modal, new proyect
  $('#dialog_button').on('click', function() {
      // Aquí va tu lógica
      $('#radix').hide();
  });
  $('#enviar_mensaje').on('submit', function (e) {
      e.preventDefault();
      const name = $('#name').val();
      const email = $('#email').val();
      const company = $('#company').val();
      const projectDescription = $('#projectDescription').val();
      enviar_mensaje(name,email,company,projectDescription)
      $('#radix').hide();
  });
  $('#enviar_mensaje_form').on('submit', function (e) {
      e.preventDefault();
      const name = $('#name1').val();
      const email = $('#email1').val();
      const company = $('#company1').val();
      const projectDescription = $('#projectDescription1').val();
      enviar_mensaje(name,email,company,projectDescription)
      $('#radix').hide();
  });

  //our services
  /*$('software_developed').on('click', function() {

  });*/
   $('#software_developed2').click(function () {
      loadpage("software-develop")
    });
     $('#technical_advice2').click(function () {
      loadpage("technical_advice")
    });
    $('#talent_recruitment2').click(function () {
      loadpage("talent_recruitment")
    });
    $('#ai_training2').click(function () {
      loadpage("ai_training")
    });

       $('#software_developed1').click(function () {
      loadpage("software-develop")
    });
     $('#technical_advice1').click(function () {
      loadpage("technical_advice")
    });
    $('#talent_recruitment1').click(function () {
      loadpage("talent_recruitment")
    });
    $('#ai_training1').click(function () {
      loadpage("ai_training")
    });
});
function loadpage(name){

  $.ajax({
          url: "navigation/"+name+".php",
          type: "post",
          data: { },
          dataType: 'json',
          beforeSend: function(){
              $('#loading').show();	
              $('#content').hide();
          },
          success: function (data) {
              if (data.status == "OK") {
                  
                  $('#content1').html(data.tabla);
                  $('#loading').hide();
                  $('#get_back').click(function () {
                    //loadpage("software-develop")
                    $('#content').show();
                    $('#content1').html("<div></div>");
                  });
                  
              } else {
                  $('#loading').hide();
                   //$('#service_names').show();
                  alert(data.status);
              }
          },
          error: function () {
              alert("Error en ajax/"+name+".php");
              $('#loading').show();
          }
      });
}

function clear_dialog(){
  $('#name').val("");
  $('#email').val("");
  $('#company').val("");
  $('#projectDescription').val("");
  $('#name1').val("");
  $('#email1').val("");
  $('#company1').val("");
  $('#projectDescription1').val("");
}
function enviar_mensaje(name,email,company,projectDescription) {
  $.ajax({
    url: 'ajax/send_message.php',
    type: 'POST',
    data: { name:name,email:email,company:company,projectDescription:projectDescription},
    dataType: 'json',
		beforeSend: function(){
			$('#loading').show();	
	  },
    success: function (response) {
      if (response.status === 'OK') {
        //window.location.href = 'screens/editor.php';
      } else {
        //alert('send_message failed: ' + response.message);
      }
      $('#loading').hide();
      clear_dialog()
    },
    error: function () {
      alert("Error en send_message.php");
      $('#loading').hide();
      clear_dialog()
    }
  });
}