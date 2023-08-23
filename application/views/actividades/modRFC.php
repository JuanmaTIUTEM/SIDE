<div class="modal fade" id="newAssign">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Asignar RFC</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="d-flex justify-content-center">
          <div class="p-2" style="width: 60%;">
            <label>Grupo:</label>
            <select class="form-control" id="selGrupo" onchange="fillStudents(this.value);"> <!-- se podría cambiar por un input para que aparezca el #Ctrl del alumno más rápido -->
              <option>Seleccionar un Grupo</option>
            </select>
           
          </div>
          <div class="p-2" style="width: 60%;">
            <label>Alumno:</label>
            <select class="form-control" id="selAlumno" > <!-- se podría cambiar por un input para que aparezca el #Ctrl del alumno más rápido -->
              <option>Seleccionar un Alumno</option>
            </select>
           
          </div>
          </div>
          <div class="d-flex justify-content-center">
          <div class="p-2" style="width:50%">
            <div class="input-group mb-3">
              <span class="input-group-text">RFC</span>
              <input type="text" class="form-control" placeholder="RFC" name="rfcAssign" id="rfcAssign">
            </div>

          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success" onclick="assignNew();">Asignar</button>
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" name="closeNewAssign">Cancelar</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  let selGrupo = document.getElementById('selGrupo');
  let selAlumno = document.getElementById('selAlumno');
  let rfcAssign = document.getElementById('rfcAssign');
  //fillStudents(selAlumno,grupo);
       fillGroups(selGrupo);

  function fillStudents(grupo){
    if(grupo != '0'){
      let item = '<option value ="0">Seleccione un Alumno</option>';
      $.ajax({
          url: '<?php echo site_url('fillStudents'); ?>',
          method: 'GET',
          dataType: 'json',
          data :{grupo},
          success: function(response) {
             if(response){
                let students = response;
                for (var student of students) {
              item += '<option value ="' + student.user_id + '">' + student.cveUser + ':' + student.name + ' ' + student.lastName + '</option>';
                }
              }else{
                item = '<option value ="0">No existen Alumnos de este grupo</option>';
              }
              
              selAlumno.innerHTML = item;
          }
      });
    }else{
      selAlumno.innerHTML = "No existen Grupos Registrados";
    }
    
  }

  function fillGroups(object){
    let item = '<option value ="0">Seleccione un Grupo</option>';
    $.ajax({
        url: '<?php echo site_url('fillGroups'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            let groups = response;
            for (var group of groups) {
          item += '<option value ="' + group.Clave_Grupo + '" title = "' + group.Carrera + '">' + group.Clave_Grupo +'</option>';
            }
            object.innerHTML = item;
        }
    });
  }

  function assignNew(){
    let obj = {};
    obj.student_id = selAlumno.value;
    obj.rfc = rfcAssign.value;
    console.log(obj);
    $.ajax({
        url: '<?php echo site_url('newAssign'); ?>',
        method: 'POST',
        dataType: 'json',
        data : obj,
        success: function(response) {
            if(response){
              location.reload()
            }else{
              alert("¡NO se generó la asignación!...");
            }
        }
    });
  }
</script>