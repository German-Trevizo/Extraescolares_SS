<?php

session_start();
$userData = $_SESSION['userData'];
/* include('../header.php'); */
include './php/Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel Extraescolares</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
    <!-- hojas de estilos paloma -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
   <!--  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 -->

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
                        <div class="col-sm-8">
                            <h1>Cedula de Inscripción a Grupo Cultural o Deportivo.</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
               
                    <div class="card-header">
                        <h3 class="card-title">PINTURA</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                          
                                   <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Elegir un Area...
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
<a href="c1.php">AJEDREZ</a>
			<a class="dropdown-item" href="c3.php">ATLETISMO</a>
			<a class="dropdown-item" href="c4.php">BANDA DE GUERRA</a>
			<a class="dropdown-item" href="c5.php">BASQUET BOL</a>
			<a class="dropdown-item" href="c6.php">BEISBOL</a>
			<a class="dropdown-item" href="c7.php">DANZA</a>
			<a class="dropdown-item" href="c8.php">KARATE DO</a>
			<a class="dropdown-item" href="c9.php">MÚSICA</a>
			<a class="dropdown-item" href="c10.php">OTRAS</a>
			<a class="dropdown-item" href="c11.php">PESAS</a>
			<a class="dropdown-item" href="c12.php">PINTURA</a>
			<a class="dropdown-item" href="c13.php">SOCCER</a>
			<a class="dropdown-item" href="c14.php">STAFF</a>
			<a class="dropdown-item" href="c15.php">TAE KWON DO</a>
			<a class="dropdown-item" href="c16.php">VOLEIBOL</a>
  </div>
</div>
                      
               <br>
               <br>   
                            <table id="data-table" class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th width="7%">Cedula. No.</th>
                                        <th width="15%">Fecha Creación</th>
                                        <th width="35%">Alumno</th>
                                        <th width="15%">Num.Control</th>
                                        <th width="3%"></th>
                                        <th width="3%"></th>
                                        <th width="3%"></th>
                                    </tr>
                                </thead>
                                <?php
                                $invoiceList = $invoice->getInvoiceList12();
                                foreach ($invoiceList as $invoiceDetails) {

                                    $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["fecha_hoy"]));
                                    echo '
                                    <tr>
                                        <td>' . $invoiceDetails["idced"] . '</td>
                                        <td>' . $invoiceDate . '</td>
                                        <td>' . $invoiceDetails["nombre"] . '</td>
                                        <td>' . $invoiceDetails["num_control_alumno"] . '</td>
                                        <td><a href="./php/print_invoice.php?invoice_id=' . $invoiceDetails["idced"] . '" title="Imprimir "><div class="btn btn-success"><i class="fas fa-print"></i></div></a></td>
                                        <td><a href="./php/edit_invoice.php?update_id=' . $invoiceDetails["idced"] . '"  title="Editar "><div class="btn btn-primary"><i class="fas fa-edit"></i></div></a></td>
                                        <td><a href="#" id="' . $invoiceDetails["idced"] . '" class="deleteInvoice"  title="Borrar "><div class="btn btn-danger"><i class="far fa-trash-alt"></i></div></a></td>
                                    </tr>
                                    
                                    ';
                                }
                                ?>
                            </table>
                        </div>

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
    <!-- scripts de paloma -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="./js/invoice.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data-table').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontaron resultados",
                    "info": "Mostrando registros del _START_al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {

                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sPrevious": "Anteriror",
                        "sNext": "Siguiente",

                    },
                    "sProcessing": "Procesando...",
                }
            })
        });
    </script>
    <!-- Fin scripts paloma  -->
</body>

</html>