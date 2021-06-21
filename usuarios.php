<?php
session_start();
if (!isset($_SESSION['userData'])) {
    header("Location: ./login.php");
}
$userData = $_SESSION['userData'];
include "./php/conexion.php";
$resultado = $coneccion->query("select * from user_adm order by id_user DESC") or die($coneccion->error);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Extraescolares</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        <?php include "./layouts/header.php" ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include "./layouts/sidebar.php" ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-image: url(./img/tec2.jpg);">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- '
                            <h1>Usuarios</h1>
                            ' -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Usuarios</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php
                        if (isset($_GET['error'])) {
                        ?>

                            <div class="alert alert-danger">
                                <b>Error</b>
                                <?php echo $_GET['error'] ?>
                            </div>

                        <?php
                        }
                        if (isset($_GET['success'])) {

                        ?>

                            <div class="alert alert-success">
                                <b>Success</b>
                                <?php echo $_GET['success'] ?>
                            </div>
                        <?php
                        }
                        ?>
                        <form action="./php/insertarUsuario.php" class="row" method="POST">
                            <div class="col-4">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" placeholder="Inserta tu nombre" name="nombre" id="txtNombre" required>
                            </div>
                            <div class="col-4">
                                <label for="">Apellido Paterno</label>
                                <input type="text" class="form-control" placeholder="Inserta tu apellido" name="app" required>
                            </div>
                            <div class="col-4">
                                <label for="">Apellido Materno</label>
                                <input type="text" class="form-control" placeholder="Inserta tu apellido" name="apm" required>
                            </div>
                            <div class="col-4">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Inserta tu Email" name="email" required>
                            </div>
                            <div class="col-4">
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="Inserta tu password" name="pass1" required>
                            </div>
                            <div class="col-4">
                                <label for="">Confirmar Password</label>
                                <input type="password" class="form-control" placeholder="Inserta tu confirma" name="pass2" required>
                            </div>
                            <div class="col-4 p-2">
                                <br>
                                <button class="btn btn-primary"><i class="fa fa-plus"></i> Insertar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Usuarios</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Email</th>
                                <th>Accion</th>
                            </thead>
                            <?php
                            while ($fila = mysqli_fetch_array($resultado)) {

                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila['id_user'] ?></td>
                                        <td><?php echo $fila['name'] ?></td>
                                        <td><?php echo $fila['last_name'] ?></td>
                                        <td><?php echo $fila['mlast_name'] ?></td>
                                        <td><?php echo $fila['email'] ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-warning btnEditar" data-id="<?php echo $fila['id'] ?>" data-nome="<?php echo $fila['nombre'] ?>" data-ap="<?php echo $fila['apellido'] ?>" data-email="<?php echo $fila['email'] ?>" data-toggle="modal" data-target="#modal-editar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger btnEliminar" data-id="<?php echo $fila['id'] ?>" data-toggle="modal" data-target="#modal-eliminar">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <?php include "./layouts/footer.php" ?>
        <!--end footer -->

        <!-- 'Modal eliminar' -->
        <div class="modal fade" id="modal-eliminar">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./php/eliminarUsuario.php" method="POST">
                        <div class="modal-body">
                            <p>Deseas eliminar el usuario?</p>

                            <input type="hidden" id="idEliminar" name="id">

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-light">Eliminar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- 'modal editar' -->
        <div class="modal fade" id="modal-editar">
            <div class="modal-dialog">
                <div class="modal-content bg-warning">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./php/editarUsuario.php" method="POST">
                        <div class="modal-body">
                            <p>Cambiar datos</p>
                            <input type="hidden" id="idEdit" name="ids">
                        </div>
                        <div class="col-12">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" placeholder="Inserta tu nombre" name="name" id="txtnom">
                        </div>
                        <div class="col-12">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control" placeholder="Inserta tu apellido" name="first" id="txtap">
                        </div>

                        <div class="col-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control" placeholder="Inserta tu Email" name="hot" id="txtemail">
                        </div>
                        <div class="col-4">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="Inserta tu password" name="pass1">
                        </div>
                        <div class="col-4">
                            <label for="">Confirmar Passwo</label>
                            <input type="password" class="form-control" placeholder="Inserta tu confirma" name="pass2">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-light">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="./dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dashboard/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dashboard/dist/js/demo.js"></script>
    <script>
        var idEliminar = 0;
        $(document).ready(function() {
            $(".btnEliminar").click(function() {
                idEliminar = $(this).data('id');
                $("#idEliminar").val(idEliminar);

            })
            $(".btnEditar").click(function() {
                var id = $(this).data('id');
                var nom = $(this).data('nome');
                var ap = $(this).data('ap');
                var email = $(this).data('email');
                $("#idEdit").val(id);
                $("#txtnom").val(nom);
                $("#txtap").val(ap);
                $("#txtemail").val(email);
            })

        });
    </script>
</body>

</html>