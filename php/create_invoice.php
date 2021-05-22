<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn2();
if(!empty($_POST['nombre']) && $_POST['nombre']) {	
	$invoice->saveInvoice($_POST);
	header("Location: invoice_list/invoice_list.php");	
}
?>
<title>Cedula de Inscripción a Grupo Cultural o Deportivo.</title>
<script src="../js/invoice.js"></script>
<link href="../css/style2.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container content-invoice">
<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate> 
<div class="load-animate animated fadeInUp">
<div class="row">
<div class="text-center">
    
    <?php include('menu.php');?>	
    <h2 class="title">Cédula de Inscripción a Grupo Cultural o Deportivo.</h2>
</div>		    		
</div>
<input id="currency" type="hidden" value="$">
<div class="row">
   		
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

    
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4>Datos Academicos</h4>
    <table class="table table-bordered table-hover" id="invoiceItem">	
        <tr>

            <th width="50%">Nombre</th>
            <th width="50%">Carrera</th>

        </tr>							
        <tr>

            <td><input type="text" name="nombre" id="nombre_1" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="carrera" id="carrera_1" class="form-control" autocomplete="off"></td>			

        </tr>
        			
    </table>
    
    <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="10%">Número Control</th>
            <th width="10%">Semestre</th>	
            <th width="10%">Turno</th>								
            <th width="10%">Sexo</th>
            <th width="10%">Número de Seguro Social</th>
        </tr>
        <tr>
        <td><input type="text" name="num_control_alumno" id="" class="form-control" autocomplete="off"></td>

            <td><input type="text" name="semestre" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="turno" id="" class="form-control" autocomplete="off"></td>
            <td>
         

<select name="sexo" id=""class="form-control">
  <option value="F">F</option>
  <option value="M">M</option>
</select>
        
        
        </td>
            <td><input type="text" name="numero_seguro_social" id="" class="form-control" autocomplete="off"></td>
        </tr>			
    </table>
    <h4>Datos Informativos</h4> 
    <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="100%">Domicilio</th>
           
        </tr>
        <tr>
            <td><input type="text" name="domicilio" id="" class="form-control" autocomplete="off"></td>
           
        </tr>			
    </table>
 
    <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="5%">Teléfono</th>
            <th width="30%">Casa</th>								
            <th width="30%">Cel.</th>
            <th width="30%">Trabajo</th>
        </tr>
        <tr>
            <td></td>
            <td><input type="text" name="telefono_casa" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="telefono_cel" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="telefono_trabajo" id="" class="form-control" autocomplete="off"></td>
        </tr>			
    </table>
    <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="10%">Fecha de Nacimiento</th>
           
            <th width="20%">Tipo de Sangre</th>								
            <th width="20%">Lugar de Nacimiento</th>
            <th width="20%">CURP</th>
            <th width="15%">Estatura</th>
            <th width="15%">Peso</th>
        </tr>
        <tr>
        <td><input type="date" name="fecha_nacimiento" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="tipo_de_sangre" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="lugar_nacimiento" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="curp" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="estatura" id="" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="peso" id="" class="form-control" autocomplete="off"></td>
        </tr>			
    </table>
    <h4>Datos Personales</h4>
    <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="100%">Corre Electónico</th>
           
        </tr>
        <tr>
            <td><input type="text" name="email_alumno" id="" class="form-control" autocomplete="off"></td>
           
        </tr>			
    </table>
    <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="15%">Alergias</th>
            <th width="85%">Especifique</th>								
            
        </tr>
        <tr>
            <td>
            <select name="alergias" id=""class="form-control">
  <option value="NO">NO</option>
  <option value="SI">SI</option>
</select>
            </td>
            <td><input type="text" name="alergias_e" id="" class="form-control" autocomplete="off"></td>
           
        </tr>			
    </table>
    <h4>Actividades Extraescolares y/o complentarias</h4>
    <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="50%">Culturales, Deportivas y/o Complementarias</th>
            <th width="50%">...</th>								
            
        </tr>
        <tr>
            <td>
           
            <select name="actividades" id=""class="form-control">
  <option value="DANZA">DANZA</option>
  <option value="MUSICA">MÚSICA</option>
  <option value="PINTURA">PINTURA</option>
  <option value="BANDA-DE-GUERRA">BANDA DE GUERRA</option>
  <option value="BASQUET-BOL">BASQUET BOL</option>
  <option value="VOLEIBOL">VOLEIBOL</option>
  <option value="ATLETISMO">ATLETISMO</option>
  <option value="BEISBOL">BEISBOL</option>
  <option value="SOCCER">SOCCER</option>
  <option value="KARATE-DO">KARATE DO</option>
  <option value="TAE-KWON-DO">TAE KWON DO</option>
  <option value="AJEDREZ">AJEDREZ</option>
  <option value="STAFF">STAFF</option>
  <option value="PESAS">PESAS</option>
  <option value="OTRAS">OTRAS</option>
  
</select>
        </td>
            
            <td><input type="text" name="actividades_e" id="" class="form-control" autocomplete="off"></td>
                
        </tr>			
    </table>

   <h4>Exclusivo Departamento Actividades Extraescolares</h4> 
   <table class="table table-bordered table-hover" id="invoiceItem">
    <tr>
            <th width="50%">Actividad</th>
            <th width="%">Descripción</th>								
            
        </tr>
        <tr>
            <td>
            <select name="exclusivo_servicio" id=""class="form-control">
  <option value="SERVICIO-SOCIAL">SERVICIO SOCIAL</option>
  <option value="ACTIVIDADES-COMPLEMENTARIAS">ACTIVIDADES COMPLEMENTARIAS</option>
  <option value="BECA">BECA</option>
  <option value="OTRAS-ACTIVIDADES-DE-SERVICIO-SOCIAL">OTRAS ACTIVIDADES DE SERVICIO SOCIAL</option>

  
</select>
        </td>
            
            <td><input type="text" name="exclusivo_servicio_e" id="" class="form-control" autocomplete="off" required></td>
           
        </tr>			
    </table>
</div>
</div>

<div class="row">	
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
   
    <br>
    <div class="form-group">
        <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
        <input data-loading-text="Guardando..." type="submit" class="btn btn-success"name="invoice_btn" value="Guardar" class="btn btn-success submit_btn invoice-save-btm">						
    </div>
    
</div>

</div>
<div class="clearfix"></div>		      	
</div>
</form>			
</div>
</div>	
<?php include('footer.php');?>