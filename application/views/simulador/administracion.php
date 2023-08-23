<?php 
	date_default_timezone_set('America/Mexico_City');
	$fechaActual = date('Y-m-d');
	$nuevaFecha = date('d-m-Y', strtotime($fechaActual . ' -1 day'));

 ?>
<style type="text/css">
	.text-total{
		color: #951752;
		font-size: 25px;
	}
</style>
<section class="container">
	<div class="row pt-2">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<h3>Administración de la declaración </h3>
			<hr>

		</div>
		<div class="col-lg-1"></div>

	</div>
	<br>
	<div class="row container-lg pt-2 shadow bg-white rounded ">
		<div class="col-lg-1"></div>
		<div class="col-lg-10 p-2 ">
			<h5>Descripción de los pasos para el llenado de la declaración</h5>

			<ol>
				<li>Ingresa cada una de las secciones y captura la información soliciada corresponsdiente al periodo que estas declarando.</li>
				<li>
					Para revisar tu declaración, da clic en el botón "Vista Previa".
				</li>
				<li>
					Para enviar tu declaración, da clic en el botón "Enviar declaración".
				</li>
				<li>
					Después del envío se genera el acuse de recibo de tu declaración.
				</li>
			</ol>

		</div>

		<div class="col-lg-1"></div>
		
	</div>	
	<br>
	<div class="d-flex flex-wrap justify-content-center">
		
			<div class="p-2 text-center">
				<div id="iSR_1">
					<button type="submit" class="btn btn-white" onclick="fnisr1();" name="isr" value="ISR simplificado de confianza Personas físicas"><i class="material-icons enable" style="font-size:5vw;" id="txtISR_1" name="txtISR_1">check_circle</i></button><p><strong>ISR simplificado de confianza <br> Personas físicas</strong></p>
				</div>
					
			</div>
			<div class="p-2 text-center">
				<div id="iSR_2">
					<button type="button" class="btn btn-white" onclick="fnisr2();"><i class="material-icons enable" style="font-size:5vw;" id="txtISR_2" name="txtISR_2">check_circle</i><p><strong>ISR Retenciones por salarios</strong></p>
				</div>
			</div>
			<div class="p-2 text-center">
				<div id="iSR_3">
					<button type="button" class="btn btn-white" onclick="fnisr3();"><i class="material-icons enable" style="font-size:5vw;" id="txtISR_3" name="txtISR_3">check_circle</i></button><p><strong>ISR Retenciones por <br>  asimilados a salarios</strong></p>
				</div>
			</div>
			<div class="p-2 text-center">
				<div id="iVA_1">
					<button type="button" class="btn btn-white" onclick="fniva1();"><i class="material-icons enable" style="font-size:5vw;" id="txtIVA_1" name="txtIVA_1">check_circle</i></button><p><strong>IVA retenciones</strong></p>
				</div>
			</div>
			<div class="p-2  text-center">
				<div id="iVA_2">
					<button type="submit" class="btn btn-white" onclick="fniva2();"><i class="material-icons enable" style="font-size:5vw; " id="txtIVA_2" name="txtIVA_2">check_circle</i></button><p><strong>IVA simplificado de confianza</strong></p>
				</div>
			</div>
		
		
		
		
	</div>
	<br>
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6 border-red p-4 rounded bg-light">
			<div class="text-center">
				<h4>Total a pagar:</h4>
				<label class="text-total" id="totalPago">
					<?php 
						if(isset($totalisr1)){
							print_r($totalisr1[0]['txtCantidadPagar']);
						}
					 ?>
				</label>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4 clearfix">
			<form action="<?php echo site_url('complete');?>" method = "GET">
				<input type="hidden" name="eIdDeclaracion" value="<?php echo $_GET['eIdDeclaracion']; ?>">
				<input type="hidden" name="txtRfc" value="<?php echo $_GET['txtRfc']; ?>">
				<button type="submit" class="float-start btn btn-outline-secondary btn-sm">VISTA PREVIA</button>
			</form>
			
			<button type="button" onclick="" class="float-end btn btn-outline-secondary btn-sm">ENVIAR DECLARACIÓN</button>
		</div>
		<div class="col-lg-4"></div>
		

	</div>
	<br>
</section>

<!-- MODAL -->

<div class="modal fade" id="message1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
        	<h5>Para el prellenado de tu declaración, el Servicio de Administración Tributaria cuenta con la siguiente información:</h3>
        	<ul>
        		<li>Pagos provisionales con fecha de corte: <?php echo $nuevaFecha ; ?></li>
        	<li>Facturas emitidas de tipo ingreso, egreso y pago con fecha de corte: <?php echo $nuevaFecha ; ?></li>
        	</ul>

        	<p class="text-justify">Es responsabilidad del contribuyente verificar la información antes mencionada y en caso de encontrar diferencias deberá realizar las correcciones en las facturas o declaraciones correspondientes.</p>
        </div>
      </div>
      <!-- Modal Header -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
     

    </div>
  </div>
</div>

<script type="text/javascript">
	let txtISR_1 	= document.getElementById('txtISR_1');
	let txtISR_2 	= document.getElementById('txtISR_2');
	let txtISR_3 	= document.getElementById('txtISR_3');
	let txtIVA_1 	= document.getElementById('txtIVA_1');
	let txtIVA_2 	= document.getElementById('txtIVA_2');
	
	// Esperar a que la página se cargue completamente
	document.addEventListener('DOMContentLoaded', function() {
	  // Obtener el modal por su ID
	  var myModal = new bootstrap.Modal(document.getElementById('message1'));

	  // Mostrar el modal
	  myModal.show();
	  declaracionData();

	  iSR_1.style.display = 'none';
	  iSR_2.style.display = 'none';
	  iSR_3.style.display = 'none';
	  iVA_1.style.display = 'none';
	  iVA_2.style.display = 'none';

	});

	function fnisr1(){
		let totisr1 = <?php 
			if(isset($totalisr1)){
				echo $totalisr1[0]['txtCantidadPagar'];
			}
			else{
				echo 0;
			}
		?>;
		let eIdDeclaracion = <?php echo $_GET['eIdDeclaracion'];  ?>;
		
		if(iSR_1.style.display == 'block' && totisr1 == 0){
			alert('ISR simplificado de confianza. Personas físicas');
			window.location.href = "<?php echo site_url('isr_1').'?eIdDeclaracion='?>" + eIdDeclaracion ;
		}else{
			alert('Declaración ISR simplificado de confianza. Personas físicas Finalizada!');
		}
		
	}

	function fniva2(){
		/*let totisr1 = <?php 
			if(isset($totaliva2)){
				echo $totaliva2[0]['txtCantidadPagar'];
			}
			else{
				echo 0;
			}
		?>;*/
		let eIdDeclaracion = <?php echo $_GET['eIdDeclaracion'];  ?>;
		
		if(iVA_2.style.display == 'block' ){
			alert('IVA simplificado de confianza');
			window.location.href = "<?php echo site_url('iva_2').'?eIdDeclaracion='?>" + eIdDeclaracion ;
		}else{
			alert('Declaración IVA simplificado de confianza Finalizada!');
		}
		
	}

	function declaracionData(){

		let eIdDeclaracion = <?php 
		if(isset($_GET['eIdDeclaracion'])){
			echo $_GET['eIdDeclaracion'];
		} ?>;
		let obj = {};
		obj.eIdDeclaracion = eIdDeclaracion; 
		axios.post("<?php echo site_url('findTypeDec'); ?>" ,obj).then(
		function(res){
          if (res.status == 200) {
          	let id = res.data;
          	if(id.isr1 == 1){
          		iSR_1.style.display = 'block';
          	}
          	if(id.isr2 == 1){
          		iSR_2.style.display = 'block';
          	}
          	if(id.isr3 == 1){
          		iSR_2.style.display = 'block';
          	}
          	if(id.iva1 == 1){
          		iVA_1.style.display = 'block';
          	}
          	if(id.iva2 == 1){
          		iVA_2.style.display = 'block';
          	}
          }
      	}).catch(function(err){
          alert(err);
          console.log(err);
      	});
	}
</script>
