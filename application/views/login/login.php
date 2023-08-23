
<!DOCTYPE html5>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title; ?></title>

    <!--Librería BULMA-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>bulma/css/bulma.min.css">
   

</head>
<style type="text/css">
  body, footer, section#principal{
    position: absolute;
    width : 100%; 
  }
  body{
  }
  section#principal{
    min-height : 100vh;
  }
  footer{
    bottom: 0;
  }

  .txtWhite{
    color: white;
  }

  .bg-green{
    background-color: darkred;
  }

  .img{
    width: 120px;
    height:90px;
  }
  .btn-noline{
    border: none !important;
  }
  .txt-desc{
    font-size: 10px !important;
  }
  
</style>
<body>
  <section id="principal">

    <div class="navbar-menu  has-background-black-bis" style="height:100px;">
      <div class="navbar-start">
        <a href="<?php echo base_url(); ?>">
          <img class="img" src="<?php echo base_url()."/assets/images/utem.png"?>">
        </a>
      </div>
      <div class="navbar-center"></div>
      <div class="navbar-end">
       
      </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-one-third">
                    <h1 class="title">Inicio de sesión SIDE</h1>
                    <?php echo form_open('clogin/authenticate', 'class="box"'); ?>
                        <div class="field">
                            <label class="label">E-Mail:</label>
                            <div class="control">
                                <?php echo form_input('username', '', 'class="input" required'); ?>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Contraseña:</label>
                            <div class="control">
                                <?php echo form_password('password', '', 'class="input" required'); ?>
                            </div>
                        </div>
                        <div class="field is-flex is-justify-content-end">
                            <div class="control">
                                <?php echo form_submit('submit', 'Iniciar sesión', 'class="button is-danger is-light "'); ?>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
      </div>
    </section>
    
  
      <footer class="d-flex bg-secondary text-white justify-content-center">
        <div>
          <p style="text-align: center;">Universidad Tecnológica de Manzanillo <br>
          &reg; SIDE UTeM 2023 &copy;
          </p>
        </div>
      </footer>
  </section>
</body>

</html>
