<style type="text/css">
	.bg-blood{
		background-color: #9d2449;
	}

  a:hover#lk{
    background-color: #C699A1;
  }


</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-blood">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="d-flex justify-content-around collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item text-white">
        <a class="nav-link text-white" href="#" >Presentar declaración</a>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Consultas
        </a>
        <div class="dropdown-menu bg-blood" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-white" id="lk" href="#">De la declaración</a>
          <a class="dropdown-item text-white "id="lk"  href="#">Por obligación</a>
          <a class="dropdown-item text-white "id="lk"  href="#">Declaraciones Pagadas</a>
          <a class="dropdown-item text-white" id="lk" href="#">Acuse de recibo de la declaración</a>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link text-white" href="#">Presentación declaración otras obligaciones</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav  ml-auto">
        <li  class="nav-item ">
          <a class="nav-link my-2 my-sm-0 text-white" id="btnInicio" href="#">Inicio</a>
        </li>
        <li  class="nav-item ">
          <a class="nav-link my-2 my-sm-0 text-white" href="#" onclick="configDeclaracion();">Cerrar</a>
        </li>
      </ul>
    </form>
  </div>
</nav>
 <!-- Contenedor principal -->
  <div class="columns is-gapless is-fullheight">

