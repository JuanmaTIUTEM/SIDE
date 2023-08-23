<div class="d-flex justify-content-end">
	<div>
		<button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#newAssign">Nueva Asignación</button>
	</div>
</div>
	<div class="table-responsive container">
	  <h3 class="text-center">Listado de RFC's Asignados <hr></h3>
	  <table class="table table-hover" id="rfcAsignados">
	    <thead>
	      <tr>
	        <th ># de Ctrl</th>
	        <th >Nombre del Alumno</th>
	        <th >Grupo</th>
	        <th >RFC Asignado</th>
	        <th >Fecha Asignación</th>
	        <th class="text-center">Acciones</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php if(!$allRFCs){ ?>
	    		<div class="d-flex justify-content-center">
	    			<div class="alert alert-warning alert-dismissible">
	    			  <strong>Sin datos!!!</strong> Favor de Asignar al menos un RFC.
	    			  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	    			</div>
	    		</div>
	    	<?php  }else{ 
	    				foreach ($allRFCs as $rfcUser){
	    			?>
	    		<tr>
	    		<td><?php echo $rfcUser['cveUser'] ?></td>		
	    		<td><?php echo $rfcUser['name']." ".$rfcUser['lastName'] ?></td>		
	    		<td><?php echo $rfcUser['groupCve'] ?></td>		
	    		<td><?php echo $rfcUser['txtRfc'];?></td>		
	    		<td><?php echo $rfcUser['feAssigned']; ?></td>		
	    		<td class="text-center">
	    			<?php if($rfcUser['bActive'] == 0){ ?>
	    			<button class="btn btn-outline-warning" onclick="changeStatusRFC(<?php echo $rfcUser['user_id'] ?>,'<?php echo $rfcUser['txtRfc'] ?>');">Activar</button>
	    			<?php } else {?>
	    			<button class="btn btn-outline-primary" onclick="changeStatusRFC(<?php echo $rfcUser['user_id'] ?>,'<?php echo $rfcUser['txtRfc'] ?>');">Desactivar</button>


	    		</td>		
	    		</tr>

	    		<?php } }
	    	} ?>
	    </tbody>
	   </table>
	  </div>

	  <script type="text/javascript">
	  	function changeStatusRFC(id,rfc){
	  		let obj={};
	  		obj.id = id;
	  		obj.rfc = rfc;
	  		console.log(obj);
	  		$.ajax({
	  		    url: '<?php echo site_url('changeStatusR'); ?>',
	  		    method: 'GET',
	  		    dataType: 'json',
	  		    data : obj,
	  		    success: function(response) {
	  		    	//alert(response);
	  		        if(response){
	  		          confirm("¡Cambios Realizados Correctamente!...");
	  		          location.reload()
	  		        }else{
	  		          alert("¡Cambios NO realizados!...");
	  		        }
	  		    }
	  		});
	  	}
	  </script>
	  <script type="text/javascript">
	  	$(document).ready( function () {
	  		new DataTable('#rfcAsignados',{
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