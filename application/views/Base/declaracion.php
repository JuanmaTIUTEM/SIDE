<style type="text/css">
	.imgPerfil{
		width: 5vh;
		height: 5vh;
	}
</style>

<div class="container border border-light">
	<div class="d-flex justify-content-start flex-column">
		<div class="p-1">
			<h4>
				<img src="" class="imgPerfil " id="imgPerfil"><label for="#imgPerfil" class="text-success ">Perfil</label>
			</h4>
		</div>
		<div class="p-1 border border-white d-flex justify-content-start flex-column ">
			<div class=" d-flex justify-content-around">
				<div class="input-group mb-2">
				  <div class="input-group-prepend">
				    <span class="input-group-text">*RFC:</span>
				  </div>
				  <input type="text" class="form-control" name="userRFC" id="userRFC" value="<?php //echo $userRFC ?>" disabled>
				</div>
				<div class="p-2"></div>
				<div class="input-group mb-2">
				  <div class="input-group-prepend">
				    <span class="input-group-text">*Tipo de Declaración:</span>
				  </div>
				  <input list="liTipoDeclaracion" class="form-control" name="txtTipoDeclaracion">
				  <datalist id="liTipoDeclaracion">
				  	<option value="Normal">Normal</option>
				  	<option value="Complementaria">Complementaria</option>
				  	<option value="Normal por Correccion Fiscal">Normal por Correccion Fiscal</option>
				  	<option value="Complementaria Correccion Fiscal">Complementaria Correccion Fiscal</option>
				  </datalist>
				</div>
			</div>
		</div>
		<div class="p-2 border border-white d-flex justify-content-start flex-column ">
			<div class=" d-flex justify-content-around">
				
				<div class="input-group mb-1">
				  <div class="input-group-prepend">
				    <span class="input-group-text">*Periodicidad:</span>
				  </div>
				  <input list="liPeriodicidad" class="form-control" name="txtTipoDeclaracion">
				  <datalist id="liPeriodicidad">
				  	<option value="1-Mensual">1-Mensual</option>
				  	<option value="2-Bimestral">2-Bimestral</option>
				  	<option value="3-Trimestral">3-Trimestral</option>
				  	<option value="4-Semestral">4-Semestral</option>
				  	<option value="5-Semestral">5-Semestral</option>
				  	<option value="6-Anual">6-Anual</option>
				  </datalist>
				</div>
				<div class="p-3"></div>
				<div class="input-group mb-1">
				  <div class="input-group-prepend">
				    <span class="input-group-text">*Tipo de Complementaria:</span>
				  </div>
				  <input list="liTipoComplementaria" class="form-control" name="txtTipoComplementaria">
				  <datalist id="liTipoComplementaria">
				  	<option value="Dejar sin Efecto Obligacion" active>Dejar sin Efecto Obligacion</option>
				  	<option value="Modificación de Obligaciones">Modificación de Obligaciones</option>
				  	<option value="Obligación No Presentada">Obligación No Presentada</option>
				
				  </datalist>
				</div>
			</div>
		</div>
		<div class="p-2 border border-white d-flex justify-content-start flex-column ">
			<div class=" d-flex justify-content-around">
				
				<div class="input-group mb-2">
				  <div class="input-group-prepend">
				    <span class="input-group-text">*Ejercicio:</span>
				  </div>
				  <input list="liEjercicio" class="form-control" name="txtEjercicio">
				  <datalist id="liEjercicio">
				  	<option value="2018">2018</option>
				  	<option value="2019">2019</option>
				  	<option value="2020">2020</option>
				  	<option value="2021">2021 </option>
				  	<option value="2022">2022 </option>
				  	<option value="2023">2023 </option>
				  </datalist>
				</div>
				<div class="p-3"></div>
				<div class="input-group mb-2">
				  <div class="input-group-prepend">
				    <span class="input-group-text">*Periodo:</span>
				  </div>
				  <input list="liPeriodo" class="form-control" name="txtPeriodo">
				  <datalist id="liPeriodo">
				  	<option value="Dejar sin Efecto Obligacion" active>Dejar sin Efecto Obligacion</option>
				  	<option value="Modificación de Obligaciones">Modificación de Obligaciones</option>
				  	<option value="Obligación No Presentada">Obligación No Presentada</option>
				
				  </datalist>
				</div>
			</div>
		</div>

		<div class="p-2 border border-white d-flex justify-content-start flex-column ">
			<div class=" d-flex justify-content-between">
				
				<div class="p-2">
				    <span >*Campos Obligatorios</span>
				</div>
				<div class="p-2">
				  <button class="btn btn-success">Siguiente</button>
				</div>
			</div>
		</div>

	</div>

