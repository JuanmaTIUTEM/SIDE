<style>
  .blocked-td {
    pointer-events: none; /* Bloquea la interacción del usuario con el td */
    background-color: gray !important; /* Cambia el color de fondo para indicar que está bloqueado */
    color : white !important;
  }
</style>

<h3>Listado de Usuarios <hr></h3>
<div class="table-responsive container">
    <table class="table table-striped" id="tblAllUsers">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Tipo Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allusers as $user): 
                ?>
                <tr class="text-center">
                    <td ><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['personName']." ".$user['personLName']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['UserType']; ?></td>
                    <td>
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modalUsuario" onclick="cargarDatosUsuario(<?php echo $user['user_id']; ?>);"> Ver Datos</button>
                        <?php 
                        if($user['user_id'] != $_SESSION['user_id']){

                            if($user['UserActive'] == 1){

                        ?>

                        <button class="btn btn-outline-primary btn-sm" onclick="changeStatus(<?php echo $user['user_id']; ?>)">Activo</button>
                    <?php
                        }else{

                    ?>
                            <button class="btn btn-outline-warning btn-sm" onclick="changeStatus(<?php echo $user['user_id'];?>)" >Inactivo</button>

                    <?php }} ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php echo $this->pagination->create_links(); ?>
</div>

<script type="text/javascript">
    
    function changeStatus(id){
        let user = {};        
        user.id = id;
        $.ajax({
            url: '<?php echo site_url('changeUserStatus'); ?>',
            method: 'GET',
            dataType: 'json',
            data: user,
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
        new DataTable('#tblAllUsers',{
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