$.ajaxSetup({ cache: false});

$(document).ready(function() {
    /* 
	* Obtener referencia de los elementos por la clase llamada nav-link y agregar el
	* evento onclick 
	*/
    $('.nav-link').on('click', function() {
        
        /*
		* A todos los elementos que tienen la clase nav-link
		* quitarle la clase llamada active
		*/

        $('.nav-link').removeClass('active');
		// Finalmente al elemento que le dan clic agregarle la clase active
        $(this).addClass('active');
        
    });
});

function registroUsuarios(){
	let name = $("#nombre");
	let email = $("#email");
	let password = $("#pwd");
	 // Recopilar datos de un formulario para enviarlos a un servidor.
	let formData = new FormData();
	
	formData.append("nombre", name.val());
	formData.append("email", email.val());
	formData.append("pwd", password.val());
	$.ajax({url: "usuarios.php",
		data: formData,
		processData: false,
		contentType: false,
		type: "POST",
		cache: false,		
		success: function(result){			
			$('#main').html(result);		    
		},
		error: function (xhr, status) {

		}
	       });

}

function login(){
	
	let email = $("#email");
	let password = $("#pwd");
	 // Recopilar datos de un formulario para enviarlos a un servidor.
	let formData = new FormData();
	
	
	formData.append("email", email.val());
	formData.append("pwd", password.val());
	$.ajax({url: "login.php",
		data: formData,
		processData: false,
		contentType: false,
		type: "POST",
		cache: false,		
		success: function(result){
			
			$('#main').html(result);
		    //alert("El registro de ha completado correctamente!");
		},
		error: function (xhr, status) {

		}
	       });

}

function guardarAutor(){
  let nombre = $("#nombre").val();

  let formData = new FormData();
  formData.append("nombre", nombre);

  $.ajax({
    url: "autor.php",
    data: formData,
    processData: false,
    contentType: false,
    type: "POST",
    success: function(res){
      alert(res);
    }
  });
}

function guardarLibro(){
  let formData = new FormData();
  formData.append("titulo", $("#titulo").val());
  formData.append("autor_id", $("#autor_id").val());

  $.ajax({
    url: "libro.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(res){
      alert(res);
    }
  });
}

function guardarPrestamo(){
  let formData = new FormData();
  formData.append("id_usuario", $("#id_usuario").val());
  formData.append("id_libro", $("#id_libro").val());

  $.ajax({
    url: "prestamo.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function(res){
      alert(res);
    }
  });
}

function cargar(pagina){
  $("#article").load(pagina, function(response, status, xhr) {

    $("#article script").each(function() {
      eval(this.innerText);
    });

  });
}


/*
function cargar(pagina){
  $("#article").load(pagina);
}
*/