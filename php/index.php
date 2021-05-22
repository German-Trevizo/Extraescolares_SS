<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['nombre']."".$user[0]['apellido'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['numcontrol'] = $user[0]['numcontrol'];
		
		header("Location: invoice_list/invoice_list.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>
<title>ITSNCG</title>
<script src="js/invoice.js"></script>
<link href="../css/style2.css" rel="stylesheet">
<header class="header ">
    <div class="topbar clearfix">
        <div class="container">
            <div class="row-fluid">
                <div class="col-md-6 col-sm-6 text-left">
                    <p>
                        <strong><i class="fa fa-phone"></i></strong> (636) 692-95-00 EXT.18 &nbsp;&nbsp;

                    </p>
                </div><!-- end left -->
                <div class="col-md-6 col-sm-6 hidden-xs text-right">
                    <div class="social">
                        <a class="facebook" href="https://www.facebook.com/comunicacion.itsncg/" target="_blank"
                        data-tooltip="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                    </div><!-- end social -->
                </div><!-- end left -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end topbar -->

    <div class="container">
        <nav class="navbar navbar-default yamm">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo-normal">
                    <a class="navbar-brand" href="/"><img src="images/logo.png" alt=""></a>
                </div>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Inicio</a></li>
                    <li class="dropdown hassubmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Nosotros <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/conocenos" >Conócenos</a></li>
                          <li><a href="/politicas" >Políticas de Calidad</a></li>
                          <li><a href="/servicios" >Servicios</a></li>
                          <li><a href="/contraloria" >Contraloría</a></li>

                        </ul>
                    </li>

                    <li class="dropdown hassubmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Carreras <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/contador-publico">Contador Público</a></li>
                            <li><a href="/gestion-empresarial">Ingeniería en Gestión Empresarial</a></li>
                            <li><a href="/industrial">Ingeniería Industrial</a></li>
                            <li><a href="/sistemas">Ingeniería en Sistemas Computacionales</a></li>
                            <li><a href="/electromecanica">Ingeniería Electromecánica</a></li>
                            <li><a href="/mecatronica">Ingeniería Mecatrónica</a></li>
                            <li><a href="/electronica">Ingeniería Electrónica</a></li>
                        </ul>
                    </li>


                    <li class="dropdown hassubmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Enlaces <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="http://148.223.124.178/docentes/" target="_blank">Portal Docentes</a></li>
                          <li><a href="http://148.223.124.178/escolar/Login.aspx" target="_blank">Portal Alumnos</a></li>
                           <li><a href="http://mail.office365.com" target="_blank">Correo</a></li>
                           <li><a href="http://10.250.241.15" target="_blank">Master Web</a></li>
                           <li><a href="http://itsncg.bibliotecasdigitales.com/home?category=3" target="_blank">Biblioteca Virtual</a></li>
                           <li><a href="https://elibro.net/es/lc/itsncg/inicio/ " target="_blank">Biblioteca Virtual  edit. eLibro</a></li>
                           <hr>
                           <li><a href=" http://148.223.124.182/misclases" target="_blank">Moodle</a></li>
                          
                        </ul>
                    </li>
                    <li class="dropdown hassubmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          Alumnos <span class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/residencias">Residencias</a></li>

                        </ul>
                    </li>
                    <li class="dropdown hassubmenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          Transparencia <span class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a
                                target="_blank"
                                href="https://consultapublicamx.inai.org.mx/vut-web/faces/view/consultaPublica.xhtml#inicio">
                                Consulta</a>
                            </li>
                            <li>
                                <a href="/presupuestos"> Presupuesto Basado en Resultados</a>
                            </li>

                        </ul>
                    </li>



                </ul>
            </div>
        </nav><!-- end navbar -->
    </div><!-- end container -->
</header>
<?php include('container.php');?>
<div class="row">	
  <div class="col-xs-6">
  
<div class="heading">
		<!-- <h2>Actividades Extraescolares</h2> -->
	</div>
<div class="login-form">
<form action="" method="post">
    <h2 class="text-center">Iniciar Sesión</h2>  
<div class="form-group">
<?php if ($loginError ) { ?>
<div class="alert alert-warning"><?php echo $loginError; ?></div>
<?php } ?>
</div>         
<div class="form-group">
    <input name="email" id="email" type="email" class="form-control" placeholder="Email numcontrol" autofocus required>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
</div> 
<div class="form-group">
    <button type="submit" name="login" class="btn btn-primary" style="width: 100%;"> Acceder </button>
</div>
<div class="clearfix">
<label class="pull-left checkbox-inline"><input type="checkbox"> Recordarme</label>
</div>        
</form>
</div>   

</div>
<div class="col-xs-6">-</div>	
</div>		
</div>
<?php include('footer.php');?>