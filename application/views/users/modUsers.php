<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUsuarioLabel">Detalles del Usuario <strong id="userName"></strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar" onclick="mdclose()"></button>
      </div>
      <div class="modal-body">
        <form>
        	<input type="hidden" name="user_id" id="user_id">
        	<input type="hidden" name="person_id" id="person_id">
        	<input type="hidden" name="career_id" id="career_id">
        	<input type="hidden" name="group_id" id="group_id">
         
          <div class="mb-3">
            <label for="userType" class="form-label">Tipo de Usuario</label>
            <select class="form-control" id="userTypeId" disabled>

            </select>
          </div>
          <div class="mb-3">
            <label for="careerName" class="form-label">Nombre de Carrera</label>
            <input type="text" class="form-control" id="careerName" disabled>
          </div>
          <div class="mb-3">
            <label for="cveUser" class="form-label">Clave de Usuario</label>
            <input type="text" class="form-control" id="cveUser" disabled>
          </div>
          <div class="mb-3">
            <label for="departament" class="form-label">Departamento</label>
            <input type="text" class="form-control" id="departament" disabled>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" disabled>
          </div>
          <div class="mb-3">
            <label for="personLName" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="personLName" disabled>
          </div>
          <div class="mb-3">
            <label for="personName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="personName" disabled>
          </div>
        </form>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="mdclose()">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnEditar" onclick="habilitarEdicion()">Editar</button>
        <button type="button" class="btn btn-primary" id="btnGuardar" onclick="guardarCambios()" style="display: none;">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	let userIdSession = <?php echo $_SESSION['user_id']; ?>;
	let user_id = document.getElementById('user_id');
	let person_id = document.getElementById('person_id');
	let career_id = document.getElementById('career_id');
	let group_id = document.getElementById('group_id');
	//let userActive = document.getElementById('userActive');
	let userTypeId = document.getElementById('userTypeId');
	let careerName = document.getElementById('careerName');
	let cveUser = document.getElementById('cveUser');
	let departament = document.getElementById('departament');
	let email = document.getElementById('email');
	let personLName = document.getElementById('personLName');
	let personName = document.getElementById('personName');
	cargarTiposUsuario();

	// Función para habilitar la edición de los inputs
	function mdclose(){
		user_id.disabled = true;
		person_id.disabled = true;
		career_id.disabled = true;
		group_id.disabled = true;
		//userActive.disabled = true;
		userTypeId.disabled = true;
		careerName.disabled = true;
		cveUser.disabled = true;
		departament.disabled = true;
		email.disabled = true;
		personLName.disabled = true;
		personName.disabled = true;
		
		document.getElementById("btnEditar").style.display = "inline";
		document.getElementById("btnGuardar").style.display = "none";
	}
	function habilitarEdicion() {
	  user_id.disabled = false;
	  person_id.disabled = false;
	  career_id.disabled = false;
	  group_id.disabled = false;
	  //userActive.disabled = false;
	  if(user_id.value != userIdSession ) userTypeId.disabled = false;
	  careerName.disabled = false;
	  cveUser.disabled = false;
	  departament.disabled = false;
	  email.disabled = false;
	  personLName.disabled = false;
	  personName.disabled = false;
	  
	  document.getElementById("btnEditar").style.display = "none";
	  document.getElementById("btnGuardar").style.display = "inline";
	}

	// Función para guardar los cambios realizados
	function guardarCambios() {
	  // Obtener los valores modificados
	  var nombre = document.getElementById("nombre").value;
	  var apellido = document.getElementById("apellido").value;
	  var correo = document.getElementById("correo").value;
	  
	  // Realizar la petición de actualización mediante AJAX o enviar el formulario a un controlador de CodeIgniter para guardar los cambios en la base de datos
	  
	  // Una vez guardados los cambios, deshabilitar los inputs nuevamente
	  	user_id.disabled = true;
		person_id.disabled = true;
		career_id.disabled = true;
		group_id.disabled = true;
		//userActive.disabled = true;
		userTypeId.disabled = true;
		careerName.disabled = true;
		cveUser.disabled = true;
		departament.disabled = true;
		email.disabled = true;
		personLName.disabled = true;
		personName.disabled = true;
		
	  document.getElementById("btnEditar").style.display = "inline";
	  document.getElementById("btnGuardar").style.display = "none";
	}

	// Función para cargar los datos del usuario en el modal
	function cargarDatosUsuario(id) {
		cargarTiposUsuario();
		$.ajax({
		    url: '<?php echo site_url('findUser'); ?>',
		    method: 'GET',
		    data: { user_id : id},
		    dataType: 'json',
		    success: function(response) {
		    	let user = response;
		    	mdclose();
		    	user_id.value = user.user_id;
		    	person_id.value = user.persona_id;
		    	career_id.value = user.career_id;
		    	group_id.value = user.gropu_id;
		    	//userActive.value = user.UserActive;
		    	userTypeId.value = user.userTypeId;
		    	careerName.value = user.careerName;
		    	cveUser.value = user.cveUser;
		    	departament.value = user.departament;
		    	email.value = user.email;
		    	personLName.value = user.personLName;
		    	personName.value = user.personName;
		    	
		    }
		});
	
	}

	function cargarTiposUsuario(id) {
		let selType = document.getElementById('userTypeId');
		let item = '<option value ="0">Seleccione una opción válida</option>';
		$.ajax({
		    url: '<?php echo site_url('userTypes'); ?>',
		    method: 'GET',
		    data: { user_id : id},
		    dataType: 'json',
		    success: function(response) {
		        let types = response;
		        for (var type of types) {
					item += '<option value ="' + type.id + '" title ="'+type.tDesc+'">' + type.uType + '</option>';
		        }
		        selType.innerHTML = item;
		    }
		});
	
	}
	
</script>