
<div class="modal fade" id="newUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Usuario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body bg-light">
          <div class="d-flex flex-column">
            <div class="d-flex justify-content-center">
              <div>
                <div class="input-group mb-3">
                  <span class="input-group-text">Tipo de usuario:</span>
                    <select class="form-control" id="userType" onchange="activeInputs();"></select>
                </div>
              </div>
            </div>
              <hr>
            <div id="datosUsuario" class=" d-flex flex-column ">
                <div class="p-1 flex-fill">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" placeholder="Nombre(s)" name="txtName" id="txtName" disabled>
                    <input type="text" class="form-control" placeholder="Apellido(s)" name="txtLName" id="txtLName" disabled>
                  </div>
                </div>
                <div class="p-1">
                  <div class="input-group mb-3">
                    <span class="input-group-text">@Email</span>
                    <input type="email" class="form-control" placeholder="Apellido(s)" name="txtEmail" id="txtEmail" disabled>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end">
                  <div class="p-1 ">
                    <div class="input-group mb-3">
                    <span class="input-group-text">Clave Usuario</span>
                    <input type="text" class="form-control" placeholder="#Ctrl/#Trab" name="userCve" id="userCve" disabled>
                  </div>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                  <div class="p-1 flex-fill">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Carrera:</span>
                      <select class="form-control" id="careerid" disabled></select>
                    </div>
                  </div>
                  <div class="p-1 flex-fill">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Grupo:</span>
                        <select class="form-control" id="groupid" disabled></select>
                    </div>
                  </div>
                  <div class="p-1">
                    <div class="input-group mb-3">
                      <span class="input-group-text">Departamento:</span>
                      <input type="text" class="form-control" placeholder="Area/Departamento" name="txtDpto" id="txtDpto" disabled>
                    </div>
                  </div>

                </div>
              </div>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="sendNewUser();" id="btnSaveUsr" disabled>Guardar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="cleanInputs();">Cancelar</button>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">

  let selType = document.getElementById('userType');
  let careerid = document.getElementById('careerid');
  let groupid = document.getElementById('groupid');
  let btnSUsr = document.getElementById('btnSaveUsr');
  let userCve = document.getElementById('userCve');

  let name = document.getElementById('txtName');
  let lName = document.getElementById('txtLName');
  let nemail = document.getElementById('txtEmail');
  let dpto = document.getElementById('txtDpto');

  fillUsersType();
  fillCareers();
  fillGroups();

  function fillUsersType() {
    let item = '<option value ="0">Seleccione una opción válida</option>';
    $.ajax({
        url: '<?php echo site_url('userTypes'); ?>',
        method: 'GET',
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

  function fillCareers() {
    let item = '<option value ="0">Seleccione una opción válida</option>';
    $.ajax({
        url: '<?php echo site_url('careers'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            let careers = response;
            for (var career of careers) {
          item += '<option value ="' + career.career_id + '" title ="'+ career.careerCve+'">' + career.careerName + '</option>';
            }
            careerid.innerHTML = item;

        }
    });
  
  }
  function fillGroups() {
    let item = '<option value ="0">Seleccione una opción válida</option>';
    $.ajax({
        url: '<?php echo site_url('groups'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            let groups = response;
            for (var group of groups) {
              item += '<option value ="' + group.gropu_id + '" title ="'+group.careerName+'">' + group.groupCve + '</option>';
            }
            groupid.innerHTML = item;
        }
    });
  
  }



  function activeInputs(){
    let id = selType.value;
    if(id == 0)  disableInputs();
    else  enableInputs(id);
    
  }

  function enableInputs(id){
    if(id== 2){
      careerid.disabled = false;
      dpto.disabled = false;
      groupid.disabled = true;
    }else if(id == 3){
      dpto.disabled = true;
      groupid.disabled = true;
      careerid.disabled = false;
    }
    else if(id == 4){
      groupid.disabled = false;
      careerid.disabled = true;
      dpto.disabled = true;
    }
    else{
      dpto.disabled = false;
      groupid.disabled = true;
      careerid.disabled = true;
  }
    name.disabled = false;
    lName.disabled = false;
    userCve.disabled = false;
    nemail.disabled = false;
    btnSUsr.disabled = false;
  }

  function disableInputs(){
    careerid.disabled = true;
    groupid.disabled = true;
    name.disabled = true;
    lName.disabled = true;
    nemail.disabled = true;
    dpto.disabled = true;
    userCve.disabled = true;
    btnSUsr.disabled = true;

  }

  function cleanInputs(){
    careerid.value = 0;
    groupid.value = 0;
    name.value = "";
    lName.value = "";
    nemail.value = "";
    dpto.value = "";
    userCve.value = "";

    disableInputs();

  }

  function sendNewUser(){
    let data = {};
    let id = selType.value;
    if(careerid.value == 0 ){
      data.career_id = null;
    }else{
      data.career_id = careerid.value;
    }
    if(dpto.value == 0 ){
      data.departamento = null;
    }else{
      data.departamento = dpto.value;
    }
    if(groupid.value == 0 ){
      data.group_id = null;
    }else{
      data.group_id = groupid.value;
    }
    data.userCve = userCve.value;
    data.userType_id = selType.value;
    data.personNamee = name.value;
    data.personLName = lName.value;
    data.personEmail = nemail.value;
  $.ajax({
      url: '<?php echo site_url('createUser'); ?>', 
      method: 'POST',
      data: data,
      dataType: 'json',
      success: function(response) {
        if(response){
            confirm("Nuevo usuario creado correctamente...");
            location.reload();
        }
        else{
            alert("Error en la creación del usuario");
        }
      }
  });

  }
  
</script>