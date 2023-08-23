<div class="col-lg-10">
    <div class="d-flex justify-content-center mt-5">
        <div>
            <img src="<?php echo base_url()."/assets/images/inicio.jpg"; ?>" >
        </div>
    </div>
    <div class="row">
        <?php if(isset($message)){?>
                <div class="alert alert-warning alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>¡ERROR!</strong> <?php echo $message; ?>.

                  </div>
 
         <?php  }
         ?>
        
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <h1 class="text-center">Iniciar sesión</h1>
            <form action="<?php echo site_url('loginSim') ?>" method="POST">
                <div class="mb-3">
                    <label for="txtRfc" class="form-label">RFC:</label>
                    <input type="text" class="form-control" id="txtRfc" name="txtRfc" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary text-end">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>
        

