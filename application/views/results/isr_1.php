
	<div class="d-flex justify-content-around">
		<div class="text-center">
			<img src="<?php echo base_url()."/assets/images/utem.png"; ?>" alt="Logo" style="height: 60px; width: 90px;">
		</div>
		<div class="text-center">
			<h4 class="">ISR Simplificado de Confianza. Personas Físicas</h4>
			<p class="text-small">VISTA PREVIA</p>
		</div>
		<div class="text-center">
			<img src="<?php echo base_url()."/assets/images/sat.png"; ?>" alt="Logo" style="height: 50px; width: 90px;">
		</div>
	</div>
	<?php 
		if($isr){
			print_r($isr);
		
	 ?>
	<br>
	<section class="container">
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">RFC:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data text-uppercase" id="txtRFC" name="txtRFC" ><?php echo $isr[0]['txtRFC']; ?></p>
			</div>
		</div>
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Nombre:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data text-uppercase" id="txtUserName" name="txtUserName"><?php echo $isr[0]['name']." ".$isr[0]['lastName']; ?></p>
			</div>
		</div>
	</section>
	<section class="container border-top-bottom">
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Tipo de Declaración:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtTipoDec" name="txtTipoDec" ><?php echo $isr[0]['txtTipoDeclaracion']; ?></p>
			</div>
			
		</div>
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Periodicidad:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtPeriodicidad" name="txtPeriodicidad"><?php echo $isr[0]['txtPeriodicidad']; ?></p>
			</div>
			<div class="row-item-20">
				<p class="text-normal">Periodo de la declaración:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtPeriodo" name="txtPeriodo" ><?php echo $isr[0]['txtPeriodo']; ?></p>
			</div>
		</div>
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Ejercicio:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtEjercicio" name="txtEjercicio"><?php echo $isr[0]['txtEjercicio']; ?></p>
			</div>
			<div class="row-item-20">
				<p class="text-normal">Vencimiento de la obligación:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtVencimiento" name="txtVencimiento">18/09/2022</p>
			</div>
		</div>
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Version:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtVersion" name="txtVersion" >1.0</p>
			</div>
		</div>
	</section>

	<section class="container border-top-bottom-title mt-2">
		<div class="d-flex justify-content-center">
			<p class="text-title">INGRESOS</p>
		</div>
	</section>

	<section class="container border-top-bottom mt-3 pb-2">
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">¿los ingresos obtenidos por copropiedad?</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control" type="text" name="txtCopropiedad" id="txtCopropiedad" value="NO">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">total de ingresos efectivamente cobrados</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtEfectivos" id="txtEfectivos" value="54000.00">
			</div>
		</div>
		<hr>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">descuentos, devoluciones y bonificaciones </p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtDescuentos" id="txtDescuentos" value="0">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">Ingresos a Disminuir</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIngresosDisminuir" id="txtIngresosDisminuir" value="0">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">Ingresos a Adicionales</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIngresosAdicionales" id="txtIngresosAdicionales" value="0">
			</div>
		</div>
	</section>

	<section class="container border-top-bottom-title mt-2">
		<div class="d-flex justify-content-center">
			<p class="text-title">DETERMINACIÓN</p>
		</div>
	</section>
	
	<section class="container border-top-bottom mt-3 pb-2">
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">Total de ingresos por la actividad</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtTotalIngresos_Determinacion" id="txtTotalIngresos_Determinacion" value="54000.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">base gravable</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtBaseGravable" id="txtBaseGravable" value="54000.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">tasa aplicable</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtTasaAplicable" id="txtTasaAplicable" value="1.50%">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">impuesto mensual</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtImpuestoMensual" id="txtImpuestoMensual" value="810.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">isr retenido por personas morales</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIsrRetMorales" id="txtIsrRetMorales" value="375.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">impuesto a cargo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtImpuestoCargoIsr" id="txtImpuestoCargoIsr" value="375.00">
			</div>
		</div>
	</section>

	<section class="container border-top-bottom-title mt-2">
		<div class="d-flex justify-content-center">
			<p class="text-title">PAGO</p>
		</div>
	</section>
	
	<section class="container border-top-bottom mt-3 pb-2">
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">a cargo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtCntAcargo" id="txtCntAcargo" value="435.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">total de contribuciones</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtTotalContribuciones" id="txtTotalContribuciones" value="435.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">subisidio para el empleo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtSubsidio" id="txtSubsidio" value="125.00">
			</div>
		</div>
		<hr>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">Compensaciones por aplicar</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control" type="text" name="txtCompensacionesPago" id="txtCompensacionesPago" value="NO">
			</div>
		</div>
		
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">compensaciones</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="flCompensaciones" id="flCompensaciones" value="250.00">
			</div>
		</div>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">total de aplicaciones</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtAplicacionesPago" id="txtAplicacionesPago" value="375.00">
			</div>
		</div>
		<hr>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">total de contribuciones</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtTotalContribucionesPago" id="txtTotalContribucionesPago" value="435.00">
			</div>
		</div>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">total de aplicaciones</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtAplicaciones" id="txtAplicaciones" value="375.00">
			</div>
		</div>
		
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">cantidad a cargo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtCantidadCargo" id="txtCantidadCargo" value="60.00">
			</div>
		</div>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">cantidad a pagar</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtCantidadPago" id="txtCantidadPago" value="60.00">
			</div>
		</div>

	</section>

	<hr>

	<?php 
	}else{
		?>
		<div class="container">
			<div class=" row">
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
					<h5>No se realizó la actividad por completo</h5>
				</div>
			</div>
		</div>
	
	<?php } ?>