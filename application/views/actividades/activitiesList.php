
<style type="text/css">
	
</style>
<div class="tab-pane container active" id="all">
	<h3>Listado completo</h3>

	<div class="container border border-2 rounded shadow-sm p-4 mb-4 bg-white ">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="tblAllActivities">
				<thead >
					<tr>
						<th class="text-center">Num</th>
						<th class="text-center">#Ctrl</th>
						<th class="text-center">Alumno</th>
						<th class="text-center">Grupo</th>
						<th class="text-center">RFC</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($allActivities){
							$i = 1;
							foreach ($allActivities as $activity) {
					?>	
					<tr>
						<td class="text-center"><?php echo $i; ?></td>
						<td class="text-center"><?php echo $activity['cveUser']; ?></td>
						<td class="text-center"><?php echo $activity['name']." ".$activity['lastName']; ?></td>
						<td class="text-center"><?php echo $activity['groupCve']; ?></td>
						<td class="text-center"><?php echo $activity['txtRfc']; ?></td>
						<td>
							<form action="<?php echo site_url('complete');?>" method="GET">
								<input type="hidden" name="eIdDeclaracion" value="<?php echo $activity['eIdStatement']; ?>">
								<input type="hidden" name="txtRfc" value="<?php echo $activity['txtRfc']; ?>">
								<button type="submit" class="float-start btn btn-outline-secondary btn-sm">VISTA PREVIA</button>
							</form>
							
									
						</td>
					</tr>

					<?php
						$i++; 	
						}
					}

					 ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready( function () {
		new DataTable('#tblAllActivities',{
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