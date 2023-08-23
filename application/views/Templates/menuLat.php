<!-- Menú lateral fijo -->

<div class="col-lg-2 bg-light" style="min-height: 600px;">
    <aside class="bg-light">
            <div class="list-group">
                <div class="list-group-item list-group-item-action">
                    Usuarios
                    <ul class="list-group mt-2">
                        <a href="<?php echo site_url('dashboard') ?>" class="list-group-item list-group-item-action">Listado de Usuarios</a>
                      
                        <!--<a href="#" class="list-group-item list-group-item-action">Alumnos <?php 
                                if ($allusers['alumnos'] != 0) {?>
                                    <span class="badge rounded-circle bg-primary"><?php echo $allusers['alumnos']; ?></span>
                            <?php
                                }
                            ?></a>
                        <a href="#" class="list-group-item list-group-item-action">Docentes <?php 
                                if ($allusers['docentes'] != 0) {?>
                                    <span class="badge rounded-circle bg-primary"><?php echo $allusers['docentes']; ?></span>
                            <?php
                                }
                            ?></a>-->
                        <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#newUser" >Agregar Nuevo Usuario</a>
                    </ul>
                </div>
                <div class="list-group-item list-group-item-action">
                    Grupos <?php 
                                if ($allusers['group'] != 0) {?>
                                    <span class="badge rounded-circle bg-primary"><?php echo $allusers['group']; ?></span>
                            <?php
                                }
                            ?>
                    <ul class="list-group mt-2">
                        <a href="<?php echo site_url('allGroups'); ?>" class="list-group-item list-group-item-action">Listado de Grupos</a>
                        <a href="#" class="list-group-item list-group-item-action"  onclick="newGroup();">Agregar Nuevo Grupo</a>

                    </ul>
                </div>
                <div class="list-group-item list-group-item-action">
                    Actividades
                    <ul class="list-group mt-2">
                        <a href="<?php echo site_url('activities'); ?>" class="list-group-item list-group-item-action" >Listado de Actividades</a>
                        <a href="<?php echo site_url('rfcList'); ?>" class="list-group-item list-group-item-action">RFC's Asignados</a>
                        <a href="<?php echo site_url('res_isr_1');?>" class="list-group-item list-group-item-action">ISR Simplificado de Confianza. Personas Físicas</a>
                        <a href="<?php echo site_url('res_iva_1');?>" class="list-group-item list-group-item-action">IVA Simplificado de Confianza</a>
                        <a href="<?php echo site_url('complete');?>" class="list-group-item list-group-item-action">Completo</a>
                    </ul>
                </div>
            </div>
        </aside>
</div>
