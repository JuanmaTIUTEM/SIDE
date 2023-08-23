<style type="text/css">
	#inicio{
		width: 30vw;
		height: 30vh;
	}
	#divElement1,#divElement2,#divElement3,#divElement4,#divElement5{
		width: 40vw !important;
	}
	input[type=text],input[type=number],input[type=file],input[type=date], select{
		border: none !important;
		border-bottom: 1px outset darkblue !important;
		width: 100%;
	}
	span{
		background-color: darkred !important;
		color: white !important;
	}


</style>
<section id="ppal">
<div class="d-flex flex-container justify-content-center align-items-center align-content-center p-1" id="imgInicio">
	<div class="p-2">
		<img id="inicio" src="<?php echo base_url(); ?>assets/images/Inicio.jpg" title="imgInicio">
	</div>
</div>
<div class="d-flex flex-container flex-column ml-2 bg-light  rounded align-content-left align-items-left" >
		<div class="p-2" id="divConfig" >
			<h4>Configuración de la declaración </h4> <hr>
		</div>
		<div class="d-flex flex-container flex-column ">
		  <div class="row">
		    <div class="col-sm-6 d-flex flex-column p-2 justify-content-center align-items-center align-content-center">
		    			<div class="input-group mb-3" id="divElement1">
		    			    <div class="input-group-prepend" >
		    			      <span class="input-group-text">Ejercicio: </span>
		    			    </div>
		    			    <select class="form-control" name="txtEjercicio" id="txtEjercicio">
		    			    	<option value =	"0">Sin selección</option>
		    			    	<option value =	"2020">2020</option>
		    			    	<option value =	"2021">2021</option>
		    			    	<option value =	"2022">2022</option>
		    			    	<option value =	"2023">2023</option>

		    			    </select>
		    			</div>
		    				<div class="input-group mb-3" id="divElement2">
		    				  <div class="input-group-prepend">
		    				    <span class="input-group-text">Periodicidad: </span>
		    				  </div>
		    				  <select class="form-control" name="txtPeriodicidad" id="txtPeriodicidad" onchange="changeSelect(this.value)">
		    				  	<option value =	"0">Sin selección</option>
		    				  	<option value =	"1">1-Mensual</option>
		    				  	<option value =	"3">3-Trimestral</option>
		    				  	<option value =	"5">5-Semestral (A)</option>
		    				  	<option value =	"2">2-Bimestral</option>
		    				  	<option value =	"9">9-Sin Periodo</option>

		    				  </select>
		    				</div>
		    				
		    				<div class="input-group mb-3" id="divElement3">
		    				  <div class="input-group-prepend">
		    				    <span class="input-group-text">Tipo de declaración: </span>
		    				  </div>
		    				  <select class="form-control" name="txtPeriodicidad" id="txtPeriodicidad">
		    				  	<option value =	"0">Sin selección</option>
		    				  	<option value =	"1">Normal</option>
		    				  	<option value =	"2">Normal con Corrección Fiscal</option>
		    				  	

		    				  </select>
		    			</div>
		    	</div>


		    <div class="col-sm-6 d-flex flex-column p-2 justify-content-center align-items-center align-content-center align-self-center" >
			      <div class="input-group mb-3" id="divElement4">
			        
			      </div>
			    </div>
			  
  	  </div>

			</div>
		<div class="d-flex flex-wrap flex-column ">
		</div>
			<!---->

<br>
<div class="d-flex flex-container flex-column justify-content-center" id="Obligaciones"> 
	<div><h4>Obligaciones a pagar</h4></div>
	<hr>
	<div class="d-flex justify-content-around flex-wrap" style="">
		<div class="p-2">
			
		</div>
		<div class="p-2">
			
		</div>
		<div class="p-2">
			
		</div>
		
	</div>
	<hr>
	<div class="d-flex flex-row justify-content-center" id="Sig"> 
		<div class="p-2">
			<boton class="btn btn-lg bg-blood text-white">SIGUIENTE</boton>
		</div>
		
	</div>
</div>
	</div>




</div>





<script type="text/javascript">
  let imgInicio = document.getElementById("inicio");
  let btnInicio = document.getElementById("btnInicio");
  const periodo = document.getElementById("txtPeriodo");
  const dperiodo = document.getElementById("divElement4");
  changeSelect(0);	


  imgInicio.style.display = 'flex';
  btnInicio.style.display = 'none';

  function configDeclaracion(){
    imgInicio.style.display = 'none';
    btnInicio.style.display = 'flex';
    

  }
  function changeSelect(id){
  	let item = '';
		item += '<div class="input-group-prepend">';
		item += '<span class="input-group-text">Periodicidad: </span>';
		item += '</div>';
		item += '<select class="form-control" name="txtPeriodicidad" id="txtPeriodicidad" onchange="changeSelect(this.value)">';
  	console.log(id);
  	if(id == 0) {
  			dperiodo.style.display = 'none';

  	}else if(id == 1){
  			dperiodo.style.display = 'flex';
  			dperiodo.innerHTML = '';
  		 	
  	    item += '<option value =	"0">Sin selección</option>';
				item += '<option value =	"1">Enero</option>';
				item += '<option value =	"2">Febrero</option>';
				item += '<option value =	"3">Marzo</option>';
				item += '<option value =	"4">Abril</option>';
				item += '<option value =	"5">Mayo</option>';
				item += '<option value =	"6">Junio</option>';
				item += '<option value =	"7">Julio</option>';
				item += '<option value =	"8">Agosto</option>';
				item += '<option value =	"9">Septiembre</option>';
				item += '<option value =	"10">Octubre</option>';
				item += '<option value =	"11">Noviembre</option>';
				item += '<option value =	"12">Diciembre</option>';
				item += '</select>';
				dperiodo.innerHTML += item;

  	} else if(id == 2){
  			dperiodo.style.display = 'flex';
  		 	
  			dperiodo.innerHTML = '';
  	    item += '<option value =	"0">Sin selección</option>';
				item += '<option value =	"b1">Enero-Febrero</option>';
				item += '<option value =	"b2">Marzo-Abril</option>';
				item += '<option value =	"b3">Mayo-Junio</option>';
				item += '<option value =	"b4">Julio-Agosto</option>';
				item += '<option value =	"b5">Septiembre-Octubre</option>';
				item += '<option value =	"b6">Noviembre-Diciembre</option>';
				item += '</select>';
				dperiodo.innerHTML += item;

  	} else if(id == 3){
  			dperiodo.style.display = 'flex';
  			dperiodo.innerHTML = '';
  		 	
  	    item += '<option value =	"0">Sin selección</option>';
				item += '<option value =	"t1">Enero-Marzo</option>';
				item += '<option value =	"t2">Abril-Junio</option>';
				item += '<option value =	"t3">Julio-Septiembre</option>';
				item += '<option value =	"t4">Octubre-Diciembre</option>';
				item += '</select>';
				dperiodo.innerHTML += item;

  	} else if(id == 5){
  			dperiodo.style.display = 'flex';
  		 	
  			dperiodo.innerHTML = '';
  	    
  			item += '<option value =	"0">Sin selección</option>';
				item += '<option value =	"s1">Enero-Junio</option>';
				item += '<option value =	"s2">Julio-Diciembre</option>';
				item += '</select>';
				dperiodo.innerHTML += item;

  	} else if(id == 9){
  			dperiodo.style.display = 'flex';
  		 	item ='';
  			dperiodo.innerHTML = '';
				item += '<div class="input-group-prepend">';
				item += '<span class="input-group-text">Fecha de Causación: </span>';
				item += '</div>';
				item += '<input type="date" name="txtFeCausacion" id="txtFeCausacion" >';
				item += '</div>';
				dperiodo.innerHTML += item;

  	}
  }
</script>
