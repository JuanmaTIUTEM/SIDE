<div class="table-responsive container">
  <h1>Tabla de Grupos</h1>
  <table class="table table-hover" id="tblAllGroups">
    <thead>
      <tr>
        <th >Id</th>
        <th >Grado</th>
        <th >Grupo</th>
        <th >Clave de Grupo</th>
        <th >Carrera</th>
        <th >Cuatrimestre</th>
        <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($results as $row):  ?>
        <tr>
          <td><?php echo $row['Id']; ?></td>
          <td><?php echo $row['Grado']; ?></td>
          <td><?php echo $row['Grupo']; ?></td>
          <td><?php echo $row['Clave_Grupo']; ?></td>
          <td><?php echo $row['Carrera']; ?></td>
          <td><?php echo $row['Cuatrimestre']; ?></td>
          <td>
            <div class="d-flex flex-wrap justify-content-center">
              <div><button class="btn btn-outline-dark" onclick="modVer(<?php echo $row['Id']; ?>);">Ver</button></div>
              <div>
              <?php if($row['Activo'] == 0){?>
                <button class="btn btn-outline-warning" onclick="changeStatusG(<?php echo $row['Id']; ?>);">Activar</button>
              <?php }else{?>
                <button class="btn btn-outline-primary"onclick="changeStatusG(<?php echo $row['Id']; ?>);">Desactivar</button>
              <?php } ?>
              </div>  
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  function changeStatusG(id){
    $.ajax({
        url: '<?php echo site_url('changeGroupStatus'); ?>',
        method: 'GET',
        dataType: 'json',
        data: {idGroup: id},
        success: function(response) {
          if(response){
              confirm("Datos actualizados...");
              location.reload();
          }
          else{
              alert("Error en la actualización de los datos");
          }
        }
    });
  }
</script>

<script type="text/javascript">
  $(document).ready( function () {
    new DataTable('#tblAllGroups',{
        language:{
          processing : "En curso...",
          search : "Buscar:",
          lengthMenu: "Agrupar de _MENU_ items",
          info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
          infoEmpty: "NO existen datos...",
          infoFiltered : "(filtrando de _MAX_ elementos en total)",
          infoPostFix: "",
          //loadingRecords "Cargando...",
          zeroRecords: "No se encontraron datos con tu búsqueda.",
          emptyTable : "NO hay datos disponibles en la tabla.",
          paginate:{
            first: "Primero",
            previous : "Anterior",
            next: "Siguiente",
            last: "Último"
          },
          
        }
      });

  } );

</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- jQuery library-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>