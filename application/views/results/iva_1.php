	<div class="d-flex justify-content-around">
		<div class="text-center">
			<img src="<?php echo base_url()."/assets/images/utem.png"; ?>" alt="Logo" style="height: 60px; width: 90px;">
		</div>
		<div class="text-center">
			<h4 class="">IVA Simplificado de Confianza</h4>
			<p class="text-small">VISTA PREVIA</p>
		</div>
		<div class="text-center">
			<img src="<?php echo base_url()."/assets/images/sat.png"; ?>" alt="Logo" style="height: 50px; width: 90px;">
		</div>
	</div>

	<br>
	<section class="container">
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">RFC:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data text-uppercase" id="txtRFCIVA" name="txtRFCIVA" >FEAJ850930GV1</p>
			</div>
		</div>
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Nombre:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtUserNameIVA" name="txtUserNameIVA">JUAN ALVAREZ</p>
			</div>
		</div>
	</section>
	<section class="container border-top-bottom">
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Tipo de Declaración:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtTipoDecIVA" name="txtTipoDecIVA" >Normal</p>
			</div>
			
		</div>
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Periodicidad:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtPeriodicidadIVA" name="txtPeriodicidadIVA">1-Mensual</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal">Periodo de la declaración:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtPeriodoIVA" name="txtPeriodoIVA" >Enero</p>
			</div>
		</div>
		<div class="d-flex flex-wrap ">
			<div class="row-item-20">
				<p class="text-normal">Ejercicio:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtEjercicioIVA" name="txtEjercicioIVA">2022</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal">Vencimiento de la obligación:</p>
			</div>
			<div class="row-item-20">
				<p class="text-normal-data" id="txtVencimientoIVA" name="txtVencimientoIVA">18/09/2022</p>
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
			<p class="text-title">DETERMINACIÓN</p>
		</div>
	</section>

	<section class="container border-top-bottom mt-3 pb-2">
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">actividades gravadas del 16%</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtActividades16" id="txtActividades16" value="54000.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">actividades gravadas 0%</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtActividades0" id="txtActividades0" value="0">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">actividades excentas</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtActividadesExcentas" id="txtActividadesExcentas" value="0">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">Actividades no objeto del impuesto</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtActividadesNo" id="txtActividadesNo" value="0">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">iva a cargo a la tasa del 16%</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIVACArgo" id="txtIVACArgo" value="0">
			</div>
		</div>
	
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">Total de IVA a cargo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtTotalIVACargo" id="txtTotalIVACargo" value="0">
			</div>
		</div>

		<hr>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">iva no cobrado por devoluciones, descuentos y bonificacionesde ventas</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIVANoCobrado" id="txtIVANoCobrado" value="0">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">IVA retenido</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtRetenido" id="txtRetenido" value="1.50%">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">iva acreditable del periodo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIVAPeriodo" id="txtVAPeriodo" value="810.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">iva por devoluciones 
				, descuentos y bonificaciones en gastos</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIVADevoluciones" id="txtIVADevoluciones" value="375.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">cantidad a cargo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtIngresosAdicionales" id="txtIngresosAdicionales" value="375.00">
			</div>
		</div>

		<hr>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">acreditamiento del saldo a favor de periodos anteriores</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtAcreditamientoAnteriores" id="txtAcreditamientoAnteriores" value="0">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">Impuesto a Cargo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtImpuestoCargo" id="txtImpuestoCargo" value="54000.00">
			</div>
		</div>
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">Impuesto a Favor</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtImpuestoFavor" id="txtImpuestoFavor" value="0">
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
				<p class="text-normal-data text-uppercase">compensaciones por aplicar</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtSubsidio" id="txtSubsidio" value="0">
			</div>
		</div>
		
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">estímulos por aplicar</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtEstimulos" id="txtEstimulos" value="0">
			</div>
		</div>
		<hr>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">total de contribuciones</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtTotalContribucionesPago" id="txtTotalContribucionesPago" value="0">
			</div>
		</div>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">total de aplicaciones</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtTotalAplicacionesPago" id="txtTotalAplicacionesPago" value="375.00">
			</div>
		</div>

		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal-data text-uppercase">cantidad a cargo</p>
			</div>
			<div class="row-item-30">
				<input disabled class="text-normal-data form-control text-end" type="text" name="txtCantidadCargoPago" id="txtCantidadCargoPago" value="435.00">
			</div>
		</div>

		
		<div class="d-flex flex-wrap flex-item-25">
			<div class="row-item-30">
				<p class="text-normal text-uppercase">cantidad a cargo</p>
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