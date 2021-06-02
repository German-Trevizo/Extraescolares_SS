<?php 
session_start();
include('../header.php');
include '../Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>Cedula de Inscripción a Grupo Cultural o Deportivo.</title>
<script src="../../js/invoice.js"></script>
<link href="../../css/style2.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    
<?php include('../container.php');?>
<div class="container">		
<h2 class="title">DANZA.</h2>
<?php include('../menu.php');?>			  
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
$invoiceList = $invoice->getInvoiceList7();
foreach($invoiceList as $invoiceDetails){
 
    $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["fecha_hoy"]));
    echo '
      <tr>
        <td>'.$invoiceDetails["idced"].'</td>
        <td>'.$invoiceDate.'</td>
        <td>'.$invoiceDetails["nombre"].'</td>
        <td>'.$invoiceDetails["num_control_alumno"].'</td>
        <td><a href="../print_invoice.php?invoice_id='.$invoiceDetails["idced"].'" title="Imprimir "><div class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></div></a></td>
        <td><a href="../edit_invoice.php?update_id='.$invoiceDetails["idced"].'"  title="Editar "><div class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></div></a></td>
        <td><a href="#" id="'.$invoiceDetails["idced"].'" class="deleteInvoice"  title="Borrar "><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      </tr>
      
    ';
}       
?>
</table>	
</div>	
<script>  
 $(document).ready(function(){  
      $('#data-table').DataTable();  
 });  
 </script>  
<?php include('../footer.php');?>