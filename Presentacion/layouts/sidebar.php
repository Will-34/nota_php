<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Inicio</div>
                <a class="nav-link" href="PHome.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Home
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
               

                <?php 
                
                if($_SESSION["rol_usuario"]==1){
                    echo '
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Acceso
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>    
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="PUsuario.php">Usuario</a>
                        <a class="nav-link" href="PRol.php">Rol</a>
                    </nav>
                </div>';
                  }
                

                ?>
<!-- 
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="PUsuario.php">Usuario</a>
                        <a class="nav-link" href="PRol.php">Rol</a>
                    </nav>
                </div> -->



                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseI" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Modulos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseI" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="PNota.php">Notas</a>
                        <a class="nav-link" href="PTarea.php">Tareas</a>
                        <a class="nav-link" href="PImagen.php">Imagen temporal</a>

                    </nav>
                </div>






            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logueado como:</div>
            <?php echo $_SESSION["nombre_usuario"]; ?>
        </div>
    </nav>
</div>