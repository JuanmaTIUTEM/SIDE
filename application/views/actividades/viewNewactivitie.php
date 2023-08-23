<div class="container-fluid justify-content-center">
        <h4 class="text-center">Nueva actividad</h4>
</div>
<div class="container">
  <form id="frmNewActivitie">
    <div class="row justify-content-end">
      <div class="col-lg-6">
        <div class="form-floating mb-3 mt-3">
          <input type="text"  class="form-control" id="actName" name="actName">
          <label for="actName">Nombre de la Actividad:</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-floating mb-3 mt-3">
          <input type="number" min="0.05" step="0.05" value="1.00" class="form-control text-end" id="totIng" name="totIng">
          <label for="totIng">Total de Ingresos ($):</label>
        </div>
      </div>
    </div>
    
    <div id="informacion">
       <div class="card">
         <div class="card-header">
           <a class="btn" data-bs-toggle="collapse" href="#generales">
             Datos generales
           </a>
         </div>
         <div id="generales" class="collapse show" data-bs-parent="#informacion">
           <div class="card-body">
             <div class="row justify-content-between">
               <div class="col-lg-4 flex-fill">
                 <div class="form-floating">
                   <select class="form-select" id="nwPeriodicidad" name="nwPeriodicidad" onchange="activateSelect(this.value);">
                     <option value="0">Seleccione una opción</option>
                     <option value="1">1-Mensual</option>
                     <option value="3">3-Trimestral</option>
                     <option value="5">5-Semestral</option>
                     <option value="2">2-Bimestral</option>
                     <option value="9">9-Sin Periodo</option>
                   </select>
                   <label for="nwPeriodicidad" class="form-label">Periodicidad:</label>
                 </div>
               </div>
               <div class="col-lg-4 flex-fill">
                 <div class="form-floating">
                   <select class="form-select" id="nwTipoDec" name="nwTipoDec">
                     <option value="0">Seleccione una opción</option>
                     <option value="1">Normal</option>
                     <option value="2">Complementaria</option>
                     <option value="3">Normal por Correccion Fiscal</option>
                     <option value="4">Complementaria Correccion Fiscal</option>             
                   </select>
                   <label for="nwTipoDec" class="form-label">Tipo de Declaración:</label>
                 </div>
               </div>
              <!--</div>
             <div class="row justify-content-center mt-2" >-->
              <div class="col-lg-4 ml-auto" id="periodo">
                 <div class="form-floating">
                   <select class="form-select" id="nwPeriodo" name="nwPeriodo">
                    
                   </select>
                   <label for="nwPeriodo" class="form-label">Periodo:</label>
                 </div>
               </div>
               <div class="col-lg-4 ml-auto" id="fecha">
                 <div class="form-floating">
                   <input type="date" class="form-control" id="nwFechaCausa" name="nwFechaCausa">
                   <label for="nwFechaCausa" class="form-label">Fecha Causal:</label>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="card">
         <div class="card-header">
           <a class="collapsed btn" data-bs-toggle="collapse" href="#colobligaciones">
           Obligaciones a Declarar
          </a>
         </div>
         <div id="colobligaciones" class="collapse" data-bs-parent="#informacion">
           <div class="card-body">
             <div class="row justify-content-around">
               <div class="col-lg-4">
                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="ckisr1" name="ckisr1" value="something" checked>
                   <label class="form-check-label">ISR simplificado de personas de confianza. Personas físicas</label>
                 </div>
               </div>
               <div class="col-lg-4">
                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="ckisr2" name="ckisr2" value="something">
                   <label class="form-check-label">ISR retenciones por salarios</label>
                 </div>
               </div>
               <div class="col-lg-4">
                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="ckisr3" name="ckisr3" value="something" >
                   <label class="form-check-label">ISR retenciones por asimilados a salarios</label>
                 </div>
               </div>
               <div class="col-lg-4">
                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="ckiva1" name="ckiva1" value="something" >
                   <label class="form-check-label">IVA retenciones</label>
                 </div>
               </div>
               <div class="col-lg-4">
                 <div class="form-check">
                   <input class="form-check-input" type="checkbox" id="ckiva2" name="ckiva2" value="something" checked>
                   <label class="form-check-label">IVA simplificado de confianza</label>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="card">
         <div class="card-header">
           <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
             Datos de declaración
           </a>
         </div>
         <div id="collapseThree" class="collapse" data-bs-parent="#informacion">
           <div class="card-body">
             <!-- Nav tabs -->
             <ul class="nav nav-tabs">
               <li class="nav-item">
                 <a class="nav-link active" data-bs-toggle="tab" href="#ingresos">Ingresos</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="tab" href="#determinacion">Determinación</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="tab" href="#pagos">Pago</a>
               </li>
             </ul>

             <!-- Tab panes -->
             <div class="tab-content">
               <div class="tab-pane container active" id="ingresos">
                 <div id="ingresosCard" style="margin-top:20px;">
                    <div class="card">
                      <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#descuentos">
                          Descuentos, devoluciones y bonificaciones
                        </a>
                      </div>
                      <div id="descuentos" class="collapse show" data-bs-parent="#ingresosCard">
                        <div class="card-body">
                          <div class="row justify-content-between">
                            <div class="col-lg-10  align-self-start ">
                              <div class="table shadow-lg">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                      <tr>
                                        <th>Concepto</th>
                                        <th>Monto</th>
                                        <th>Accion</th>
                                      </tr>
                                    </thead>
                                    <tbody id="bodyDescuentos">
                                      <tr>
                                        <td class="w-50 text-justify">Ejemplo Devolucion 1</td>
                                        <td class="w-25 text-center">23.56</td>
                                        <td class="text-end w-25 text-center">
                                          <button class="btn btn-outline-danger btn-sm" >Borrar</button>
                                          <button class="btn btn-outline-primary btn-sm">Editar</button>
                                        </td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                              </div>
                            </div>
                            <div class="col-lg-2  align-self-start flex-fill">
                              <button type="button" class="btn btn-outline-primary btn-sm " onclick="addConcept(0)">Agregar</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
               <div class="tab-pane container fade" id="determinacion">...</div>
               <div class="tab-pane container fade" id="pagos">...</div>
             </div>
           </div>
         </div>
       </div>
     </div>


    
  </form>
  
</div>
<script type="text/javascript">
  let in_descuentos = [];
  let in_Disminuir = [];
  let in_Adicionales = [];

  let bodyDesc = document.getElementById('bodyDescuentos');

  let periodo = document.getElementById('periodo');
  let fecha  = document.getElementById('fecha');
  let nwPeriodo = document.getElementById('nwPeriodo');


  let mensual = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
  let bimestral = ['Enero-Febrero','Marzo-Abril','Mayo-Junio','Julio-Agosto','Septiembre-Octubre','Noviembre-Diciembre'];
  let trimestral = ['Enero-Marzo','Abril-Junio','Julio-Septiembre','Octubre-Diciembre'];
  let semestral = ['Enero-Junio','Julio-Diciembre'];

  periodo.style.display = 'none';
  fecha.style.display = 'none';
  function activateSelect(id){
    switch(id){
      case '0':
        periodo.style.display = 'none';
        fecha.style.display = 'none';
        break;
      case '1':
       
        fillPeriodo(mensual);
        break;
      case '2':
        fillPeriodo(bimestral);
        break;
      case '3':
        fillPeriodo(trimestral);
        break;
      case '5':
        fillPeriodo(semestral);
        break;
      case '9':
        periodo.style.display = 'none';
        fecha.style.display = 'flex';
        break;
    }
  }

  function fillPeriodo(obj){
    let item = "<option value'0'>Seleccione una opción</option>";
    periodo.style.display = 'flex';
    fecha.style.display = 'none';
    for (var mes of obj) {
      item += "<option value'"+ mes +"'>"+ mes +"</option>";
    }
    nwPeriodo.innerHTML = item;
  }

  function fillRFC(){
    let r = document.getElementById('rfcs');
    $.ajax({
        url: '<?php echo site_url('getRFCs'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          let item ="";
          let rfcs = response;
          let userName ="";
          for (var rfc of rfcs) {
            userName = rfc.name + " " + rfc.lastName;
            item += "<option value='"+ rfc.txtRfc + "'>" + rfc.cveUser + "-" + userName +"</option>";
            console.log(item);
          }
          r.innerHTML = item;
        }
    });
  }

  function addConcept(type){
  	let concept ="";
  	let monto = 0.00;
    let id = 0;

  	concept = prompt("Concepto:");
  	monto = prompt("Monto:");
  	switch(type){
  		case 0:
        let tam = in_descuentos.length;
        id = tam + 1;
  			in_descuentos.push({
          id : id,
  				concept : concept,
  				monto : monto
  			});
  			fillSelectDesc();
  			break;
  		case 1:
  			in_Disminuir.push({
  				concept : concept,
  				monto : monto
  			});
  			break;
  		case 2:
  			in_Adicionales.push({
  				concept : concept,
  				monto : monto
  			});
  			break;

  	}
  	//console.log('Descuentos:',in_descuentos);
  	//console.log('Disminuir:',in_Disminuir);
  	//console.log('Adicionales:',in_Adicionales);
  }

  function fillSelectDesc(){
  	let el ="";
  	for(var item of in_descuentos){
		el += '<tr>';
		el += '<td class="w-50 text-justify">'+ item.concept +'</td>';
		el += '<td class="w-25 text-center">'+ item.monto +'</td>';
		el += '<td class="text-end w-25 text-center">';
		el += '<a type = "button" class="btn btn-outline-danger btn-sm" onclick="delConceptDesc(' + item.id + ','+ item.concept +',' + item.monto + ')">Borrar</a>';
		el += '<button class="btn btn-outline-primary btn-sm">Editar</button>';
		el += '</td>';
		el += '</tr>';
  	}
  	bodyDesc.innerHTML = el;

  }

  function delConceptDesc(pos,concept,monto){
    let item = {
      concept : concept,
      monto : monto
    }
  	console.log()
    console.log(in_descuentos);

  }
</script>
