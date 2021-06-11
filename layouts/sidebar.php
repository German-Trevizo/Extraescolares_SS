<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div style="margin: 5%; margin-left:45px; width: 160px; height: 160px;">
        <img src="../img/logotec.jpg" class="img-circle elevation-2" alt="User Image">

    </div>

    <span class="brand-link brand-text font-weight-light" style="text-align: center; display:block;">Bienvenido</span>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $userData['NOM'] . " " . $userData['APP'] ?></a>
            </div>
        </div>

        <!-- 'en font awasome tenemos todos los iconos o como se llaman ' -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="./controlPanel.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
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