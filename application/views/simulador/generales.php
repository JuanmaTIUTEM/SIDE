<?php date_default_timezone_set('America/Mexico_City'); ?>
	<section class="container" id="configuracion">
		<div class="row">
			<div class="d-flex flex-container justify-content-center align-items-center align-content-center p-1" id="imgInicio">
				<div class="p-2">
					<img id="inicio" src="<?php echo base_url(); ?>assets/images/Inicio.jpg" title="imgInicio">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 p-2 text-start">
					<h4>Configuración de la declaración <hr></h4> 
			</div>
		</div>
	<!--<form id="frmDeclara1" action="<?php echo site_url('declara_1'); ?>" method="POST">-->
		<div class="row">
			<div class="col-lg-5">
				<label for="txtEjercicio" class="form-label">Ejercicio:</label>
			    <select class="form-select" id="txtEjercicio" name="txtEjercicioList">
			      <option value =	"0">Sin selección</option>
			      <option value =	"2020">2020</option>
			      <option value =	"2021">2021</option>
			      <option value =	"2022">2022</option>
			      <option value =	"2023">2023</option>
			    </select>
			</div>
		</div>
			
		<div class="row">
			<div class="col-lg-5">
				<label for="txtPeriodicidad" class="form-label">Periodicidad: </label>
			    <select class="form-select" name="txtPeriodicidad" id="txtPeriodicidad" onchange="changeSelect(this.value)">
				  	<option value =	"0">Sin selección</option>
				  	<option value =	"1">1-Mensual</option>
				  	<option value =	"3">3-Trimestral</option>
				  	<option value =	"5">5-Semestral (A)</option>
				  	<option value =	"2">2-Bimestral</option>
				  	<option value =	"9">9-Sin Periodo</option>

				  </select>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-5" id="divElement4">
				<label for="txtPeriodo" class="form-label">Periodo: </label>
				<select class="form-select" name="txtPeriodo" id="txtPeriodo" >
					
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-5">
				<label for="txtTipoDeclaracion" class="form-label">Tipo de declaración: </label>
				  <select class="form-select" name="txtTipoDeclaracion" id="txtTipoDeclaracion">
				  	<option value =	"0">Sin selección</option>
				  	<option value =	"Normal">Normal</option>
				  	<option value =	"Normal con Corrección Fiscal">Normal con Corrección Fiscal</option>
				  </select>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-5" id="divElement5">
				<label for="txtFeCausacion" class="form-label">Fecha de Causación: </label>
				
				<input type="date" name="txtFeCausacion" id="txtFeCausacion" class="form-control">
			</div>
		</div>
	</section>
		<section id="obligaciones" class="container">
			<hr>
			<div class="row mt-2">
				<div class="col-lg-12">
					<h4>Obligaciones a declarar <hr></h4>
				</div>
			</div>
			<div class="d-flex justify-content-around mb-5">
				<div class="p-2 text-center">
					<button type="button" class="btn btn-white" onclick="changeStatus(txtISR_1);"><i class="material-icons disable" style="font-size:5vw;" id="txtISR_1" name="txtISR_1">check_circle</i></button><p><strong>ISR simplificado de confianza. Personas físicas.</strong></p>
				</div>
				<div class="p-2 text-center">
					<button type="button" class="btn btn-white" onclick="changeStatus(txtIVA_2);"><i class="material-icons disable" style="font-size:5vw; " id="txtIVA_2" name="txtIVA_2">check_circle</i></button><p><strong>IVA simplificado de confianza.</strong></p>
				</div>
				
			</div>
			<br>
			<!-- Botones desactivados-->
			<div class="row" id="btnDesact">
				<div class="col-lg-2 text-center" id="divISR_2">
					<button type="button" class="btn btn-white" onclick="changeStatus(txtISR_2);"><i class="material-icons disable" style="font-size:5vw;" id="txtISR_2" name="txtISR_2">check_circle</i><p><strong>ISR Retenciones por salarios</strong></p>
				</div>
				<div class="col-lg-2 text-center" id="divISR_3">
					<button type="button" class="btn btn-white" onclick="changeStatus(txtISR_3);"><i class="material-icons disable" style="font-size:5vw;" id="txtISR_3" name="txtISR_3">check_circle</i></button><p><strong>ISR Retenciones por asimilados a salarios</strong></p>	
				</div>
				<div class="col-lg-2 text-center" id="divIVA_1">
					<button type="button" class="btn btn-white" onclick="changeStatus(txtIVA_1);"><i class="material-icons disable" style="font-size:5vw;" id="txtIVA_1" name="txtIVA_1">check_circle</i></button><p><strong>IVA retenciones</strong></p>
				</div>
				
			</div>
	<!--</form>-->
			<div class="row">
				<div class="col-lg-12 text-center p-2" >
					<button class="btn btn-lg bg-red text-white" id="Sig" type="button" onclick="dec1();">SIGUIENTE</button>
						
				</div>
			</div>
		</section>
	


	<script type="text/javascript">
	  let imgInicio = document.getElementById("inicio");
	  //let btnInicio = document.getElementById("btnInicio");
	  const periodo = document.getElementById("txtPeriodo");
	  const dperiodo = document.getElementById("divElement4");
	  const dperiodo2 = document.getElementById("divElement5");
	  changeSelect(0);	
	  window.onload = function() {
	  	document.getElementById('btnDesact').style.display = 'none';
	  }
	  


	  imgInicio.style.display = 'none';

	  function configDeclaracion(){
	    imgInicio.style.display = 'none';
	    

	  }
	  function changeSelect(id){
	  	let item = '';
	  	if(id == 0) {
	  			dperiodo.style.display = 'none';
	  			dperiodo2.style.display = 'none';

	  	}else if(id == 1){
	  			dperiodo.style.display = 'block';
	  			dperiodo2.style.display = 'none';
				periodo.innerHTML = '';
	  		 	
	  	    item += '<option value =	"0">Sin selección</option>';
					item += '<option value =	"Enero">Enero</option>';
					item += '<option value =	"Febrero">Febrero</option>';
					item += '<option value =	"Marzo">Marzo</option>';
					item += '<option value =	"Abril">Abril</option>';
					item += '<option value =	"Mayo">Mayo</option>';
					item += '<option value =	"Junio">Junio</option>';
					item += '<option value =	"Julio">Julio</option>';
					item += '<option value =	"Agosto">Agosto</option>';
					item += '<option value =	"Septiembre">Septiembre</option>';
					item += '<option value =	"Octubre">Octubre</option>';
					item += '<option value =	"Noviembre">Noviembre</option>';
					item += '<option value =	"Diciembre">Diciembre</option>';
					periodo.innerHTML += item;

	  	} else if(id == 2){
	  			dperiodo.style.display = 'block';
	  			dperiodo2.style.display = 'none';
				periodo.innerHTML = '';
	  		 	
	  	    item += '<option value =	"0">Sin selección</option>';
					item += '<option value =	"Enero-Febrero">Enero-Febrero</option>';
					item += '<option value =	"Marzo-Abril">Marzo-Abril</option>';
					item += '<option value =	"Mayo-Junio">Mayo-Junio</option>';
					item += '<option value =	"Julio-Agosto">Julio-Agosto</option>';
					item += '<option value =	"Septiembre-Octubre">Septiembre-Octubre</option>';
					item += '<option value =	"Noviembre-Diciembre">Noviembre-Diciembre</option>';
					periodo.innerHTML += item;

	  	} else if(id == 3){
	  			dperiodo.style.display = 'block';
	  			dperiodo2.style.display = 'none';
				periodo.innerHTML = '';
	  		 	
	  	    item += '<option value =	"0">Sin selección</option>';
					item += '<option value =	"Enero-Marzo">Enero-Marzo</option>';
					item += '<option value =	"Abril-Junio">Abril-Junio</option>';
					item += '<option value =	"Julio-Septiembre">Julio-Septiembre</option>';
					item += '<option value =	"Octubre-Diciembre">Octubre-Diciembre</option>';
					periodo.innerHTML += item;

	  	} else if(id == 5){
	  			dperiodo.style.display = 'block';
	  			dperiodo2.style.display = 'none';
				periodo.innerHTML = '';

	  			item += '<option value =	"0">Sin selección</option>';
					item += '<option value =	"Enero-Junio">Enero-Junio</option>';
					item += '<option value =	"Julio-Diciembre">Julio-Diciembre</option>';
					periodo.innerHTML += item;

	  	} else if(id == 9){
	  			dperiodo.style.display = 'none';
	  			dperiodo2.style.display = 'block';
	  	}
	  }

	  function changeStatus(data){
	  	if(data.classList.contains('enable')){
	  		data.classList.remove('enable');
	  		data.classList.add('disable');
	  	}else if(data.classList.contains('disable')){
	  		data.classList.remove('disable');
	  		data.classList.add('enable');
	  	}
	  }

	  let frmDeclara1 = document.getElementById('frmDeclara1');
	  let txtISR_1 	= document.getElementById('txtISR_1');
	  let txtISR_2 	= document.getElementById('txtISR_2');
	  let txtISR_3 	= document.getElementById('txtISR_3');
	  let txtIVA_1 	= document.getElementById('txtIVA_1');
	  let txtIVA_2 	= document.getElementById('txtIVA_2');
	  let txtEjercicio 	= document.getElementById('txtEjercicio');
	  let txtPeriodicidad = document.getElementById('txtPeriodicidad');
	  let txtFeCausacion = document.getElementById('txtFeCausacion');
	  let txtTipoDeclaracion = document.getElementById('txtTipoDeclaracion');

	  function dec1(){
	  	let env = false;
	  	let opt = {};
	  	let obj = {};
	  	let cont = 0;
	  	if(txtISR_1.classList.contains('enable')){
	  		opt.iSR_1= 1;
	  		obj.iSR_1= 1;
	  		cont ++;
	  	}else{
	  		obj.iSR_1= 0;
	  	}
	  	if(txtISR_2.classList.contains('enable')){
	  		opt.iSR_2= 1;
	  		obj.iSR_2= 1;
	  		cont++;
	  	}else{
	  		obj.iSR_2= 0;

	  	}
	  	if(txtISR_3.classList.contains('enable')){
	  		opt.iSR_3= 1;
	  		obj.iSR_3= 1;
	  		cont++;
	  	}else{
	  		obj.iSR_3= 0;

	  	}
	  	if(txtIVA_1.classList.contains('enable')){
	  		opt.iVA_1= 1;
	  		obj.iVA_1= 1;
	  		cont++;
	  	}else{
	  		obj.iVA_1= 0;

	  	}
	  	if(txtIVA_2.classList.contains('enable')){
	  		opt.iVA_2= 1;
	  		obj.iVA_2= 1;
	  		cont++;
	  	}else{
	  		obj.iVA_2= 0;

	  	}
	  	if(txtEjercicio.value != '0'){
	  		obj.ejercicio= txtEjercicio.value;
	  		env = true;
	  	}else{
	  		env = false;
	  	}
	  	if(txtPeriodicidad.value != '0'){
	  		switch(txtPeriodicidad.value){
	  			case '1':
	  				obj.periodicidad= '1-Mensual';
	  				break;
	  			case '2':
	  				obj.periodicidad= '2-Bimestral';
	  				break;
	  			case '3':
	  				obj.periodicidad= '3-Trimestral';
	  				break;
	  			case '5':
	  				obj.periodicidad= '5-Semestral (A)';
	  				break;
	  			default:
	  				obj.periodicidad= '9-Sin periodo';
	  				break;
	  		}
	  		//obj.periodicidad= txtPeriodicidad.value;
	  		env = true;
	  	}else{
	  		env = false;
	  	}
	  	if(txtTipoDeclaracion.value != '0'){
	  		obj.tipoDeclaracion= txtTipoDeclaracion.value;
	  		env = true;
	  	}else{
	  		env = false;
	  	}
	  	if(dperiodo.style.display == 'block')
	  	{
	  		if(periodo.value != '0' && periodo.value != ''){
	  		  		obj.periodo= periodo.value;
	  		env = true;
	  		}else{
	  			env = false;
	  		}
	  	}
	  	if(dperiodo2.style.display == 'block')
	  	{
		  	if( txtFeCausacion.value != ''){
		  		obj.feCausacion= txtFeCausacion.value;
	  		env = true;
		  	}else{
		  		env = false;
		  	}
	  	}
	  	
	  	if (cont > 0) {
	  		env = true;
	  	}else{
	  		alert("Favor de elegir al menos una obligación a declarar...");
	  		env = false;
	  	}
	  	let StxtRfc="<?php echo $_POST['txtRfc'] ?>";
	  	obj.txtRFC = StxtRfc;

	  	if (env){
	  		let txtRfc = '<?php echo $_POST['txtRfc']; ?>';
	  		axios.post("<?php echo site_url('declara_1'); ?>" ,obj).then(
				function(res){
		          if (res.status == 200) {
		          	let id = res.data;
		          	console.log(id);
		          	alert("Datos agregados con éxito...");
		            window.location.href = '<?php echo site_url('administracion') ?>' +'?eIdDeclaracion='+ id.lastId  +"&txtRfc=<?php echo $_POST['txtRfc'] ?>";
		          }
		      	}).catch(function(err){
		          alert(err);
		          console.log(err);
		      	});
	  		
		}else{
	  		alert("Favor de completar los datos");
	  	}	
	  	
	  }
	  
	</script>