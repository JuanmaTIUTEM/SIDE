<!-- The Modal -->
<div class="modal fade" id="newGroup">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="titModal"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="cleanInputs()"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="hidden" id="edIdGroup">
        <div class="d-flex justify-content-between">
          <div class="input-group mb-3">
            <span class="input-group-text">Grado:</span>
            <input type="number" class="form-control" min="1" max="11" value="1" id="txtGrado">
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">#de Grupo</span>
            <input type="number" class="form-control" min="1" max="5" value="1" id="txtGrupo">
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="input-group mb-3 flex-fill">
            <span class="input-group-text">Carrera:</span>
            <select class="form-control" id="eIdCareer">
            </select>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Cuatrimestre</span>
            <input type="text" class="form-control" placeholder="Ej. SEP-DIC '23" required id="txtCuatrimestre">
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" id="btnClose" onclick="">Cerrar</button>
        <button type="button" class="btn btn-outline-primary" id="btnEdit" onclick="groupEdit();">Editar</button>
        <button type="button" class="btn btn-outline-success" id="btnSave" onclick="groupSave();">Guardar</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
  let modTit = document.getElementById('titModal');
  let txtGrado = document.getElementById('txtGrado');
  let txtGrupo = document.getElementById('txtGrupo');
  let careerId = document.getElementById('eIdCareer');

  let txtCuatrimestre = document.getElementById('txtCuatrimestre');
  let edIdGroup = document.getElementById('edIdGroup');

  let btnClose = document.getElementById('btnClose');
  let btnEdit = document.getElementById('btnEdit');
  let btnSave = document.getElementById('btnSave');
    

  function groupSave(){
    let obj = {};
    obj.Grado = txtGrado.value;
    obj.Grupo = txtGrupo.value;
    obj.Career = careerId.value;
    obj.Cuatrimestre = txtCuatrimestre.value;
    if(btnSave.value == 'new'){ 
      addGroup(obj);
    }else{
      obj.group_id = edIdGroup.value;
      updateGroup(obj);

    }
  }

  function inputGroupDisabled(){
    txtGrado.disabled = true;
    txtGrupo.disabled = true;
    careerId.disabled = true;
    txtCuatrimestre.disabled = true;
  }
  function inputGroupEnabled(){
    txtGrado.disabled = false;
    txtGrupo.disabled = false;
    careerId.disabled = false;
    txtCuatrimestre.disabled = false;
  }
  function inputGroupClear(){
    txtGrado.value = 1;
    txtGrupo.value = 1;
    careerId.value = 0;
    txtCuatrimestre.value = '';
  }

  function fillCareers(op){
              
    let item = '<option value = "0">Seleccione una opción válida</option>';
    $.ajax({
        url: '<?php echo site_url('getcareers'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            let careers = response;
            for (var career of careers) {
              if(op == 0){
              item += '<option value ="' + career.career_id + '" title ="'+career.careerCve+'">' + career.careerName + '</option>';
              }else{
                if(op == career.career_id){
                  item += '<option value ="' + career.career_id + '" title ="'+career.careerCve+'" selected>' + career.careerName + '</option>';
                }else{
                  item += '<option value ="' + career.career_id + '" title ="'+career.careerCve+'">' + career.careerName + '</option>';
                }

              }
            }
              careerId.innerHTML = item;
        }
    });

  }
  function modVer(id){
    $.ajax({
        url: '<?php echo site_url('findGroup'); ?>',
        method: 'GET',
        dataType: 'json',
        data:{groupId : id},
        success: function(response) {
          fillGroupInputs(response);
        }
    });
  }
  function newGroup(){
    fillCareers(0);
    inputGroupClear();
    inputGroupEnabled();
    btnClose.style.display = 'flex';
    btnClose.innerHTML = 'Cancelar';
    btnEdit.style.display = 'none';
    btnSave.style.display = 'flex';
    btnSave.value = 'new';
    modTit.innerHTML ="Agregar Nuevo Grupo";
    $("#newGroup").modal('show');  
  }

  function fillGroupInputs(data){
    fillCareers(data.career_id);
    edIdGroup.value = data.Clave_Grupo;
    txtGrado.value = data.Grado;
    txtGrupo.value = data.Grupo;
    txtCuatrimestre.value = data.Cuatrimestre;
    btnClose.style.display = 'flex';
    btnClose.innerHTML = 'Cancelar';
    btnEdit.style.display = 'flex';
    btnSave.style.display = 'none';
    modTit.innerHTML ="Grupo " + data.Clave_Grupo;
    inputGroupDisabled();

    $("#newGroup").modal('show');  

  }
  function groupEdit(){
    inputGroupEnabled();
    fillCareers(careerId.value);
    btnClose.style.display = 'flex';
    btnClose.innerHTML = 'Cancelar';
    btnEdit.style.display = 'none';
    btnSave.style.display = 'flex';

  }

  function addGroup(data){
    $.ajax({
        url: '<?php echo site_url('addGroup'); ?>',
        method: 'POST',
        dataType: 'json',
        data:data,
        success: function(response) {
          console.log(response);
          if(response){
              confirm("Nuevo Grupo Creado!");
              location.reload();
          }
          else{
              alert("Error en la creación del grupo");
          }fillGroupInputs(response);
        }
    });
  }
</script>