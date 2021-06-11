<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div >
    <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="" style="width: 100px;height: 100px;">
    </div>

    <span class="brand-link brand-text font-weight-light" style="text-align: center; display:block;"><b>Bienvenido</b> <br> <?php echo $userData['NOM'] . " " . $userData['APP'] ?></span>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->


        <!-- 'en font awasome tenemos todos los iconos o como se llaman ' -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="./controlPanel.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <img src="../img/deportes.png" class="" alt="">
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./usuarios.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="php/invoice_list/invoice_list.php" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Cedula de Registro
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="extraescolares_ss" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Evaluaciones
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./php/salir.php" class="nav-link">
                        <i class="nav-icon fas fa-arrow-left"></i>
                        <p>
                            Cerrar Session
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>