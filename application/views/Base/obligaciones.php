<div class="container border border-secondary">
  <div class="d-flex flex-row">
    <div class="p-1"><h5>Obligaciones Registradas</h5></div>
    <div class="p-1"><button class="btn btn-sm btn-outline-info rounded-circle font-weight-bold">?</button></div>
  </div>
  
  <table class="table table-bordered">
    <thead class="bg-light">
      <tr>
        <th></th>
        <th>Descripción</th>
        <th>Fecha de Vencimiento</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="form-check text-center">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input"  name="chkISR" id="chkISR">
            </label>
          </div>
        </td>
        <td>ISR PERSONAS FÍSICAS, ACTIVIDAD EMPRESARIAL Y PROFESIONAL</td>
        <td class="text-center">25/10/2021</td>
      </tr>
      <tr>
        <td>
          <div class="form-check text-center">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input"  name="chkIVA" id="chkIVA">
            </label>
          </div>
        </td>
        <td>
          IMPUESTO AL VALOR AGREGADO
        </td>
        <td class="text-center"> 25/10/2021 </td>
      </tr>

    </tbody>
  </table>
    <div class="d-flex flex-row">
      <div class="p-1"><h5>Otras Obligaciones</h5></div>
      <div class="p-1"><button class="btn btn-sm btn-outline-dark rounded font-weight-bold"> + </button></div>
    </div>
 
  <div class="d-flex justify-content-end">
    <div class="p-2">
      <button class="btn btn-sm btn-success" onclick="contraer();"><< Atrás</button>
    </div>
    <div class="p-2"> <button class="btn btn-sm btn-primary" onclick="next();"> Siguiente >></button>
    </div>
  </div>
 </div>

</div>

<script type="text/javascript">
  function next(){
    var chkISR = document.getElementById('chkISR');
    var chkIVA = document.getElementById('chkIVA');
    let usrRFC = document.getElementById('userRFC').value;
    var obj = new Object();

    if(chkISR.checked){
      obj.isr = "PERSONAS FÍSICAS, ACTIVIDAD EMPRESARIAL Y PROFESIONAL";
    }else{
      obj.isr = 0;

    }
    if (chkIVA.checked) {
      obj.iva = "IMPUESTO AL VALOR AGREGADO";
    }else{
      obj.iva = 0;
    }
    console.log(obj);
    if(obj.isr == 0 && obj.iva == 0){
      alert("Debe seleccionar al menos una obligación!");
    }else{
      axios.post('<?php echo site_url("otrObl"); ?>', {
          data: {
            userId: usrRFC,
            options: obj,
          }
        })
          .then(function(res) {
            if(res.status==200) {
              alert("Si llegué!!");
            }
          })
          .catch(function(err) {
            console.log(err);
          });
    }
    
  }
</script>
