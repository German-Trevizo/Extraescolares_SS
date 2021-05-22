<ul class="nav navbar-nav">
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Nueva cédula
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="../create_invoice.php">Crear nueva cédula</a></li>				  
	</ul>
</li>
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Cédula
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
	<li><a href="invoice_list.php">AJEDREZ</a></li>
		<li><a href="invoice_list3.php">ATLETISMO</a></li>
		<li><a href="invoice_list4.php">BANDA DE GUERRA</a></li>
		<li><a href="invoice_list5.php">BASQUET BOL</a></li>
		<li><a href="invoice_list6.php">BEISBOL</a></li>
		<li><a href="invoice_list7.php">DANZA</a></li>
		<li><a href="invoice_list8.php">KARATE DO</a></li>
		<li><a href="invoice_list9.php">MÚSICA</a></li>
		<li><a href="invoice_list10.php">OTRAS</a></li>
		<li><a href="invoice_list11.php">PESAS</a></li>
		<li><a href="invoice_list12.php">PINTURA</a></li>
		<li><a href="invoice_list13.php">SOCCER</a></li>
		<li><a href="invoice_list14.php">STAFF</a></li>
		<li><a href="invoice_list15.php">TAE KWON DO</a></li>
		<li><a href="invoice_list16.php">VOLEIBOL</a></li>			  
	</ul>
</li>
<?php 
if($_SESSION['userid']) { ?>
	<li class="dropdown">
		<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Conectado: <?php echo $_SESSION['user']; ?>
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
		<!-- 	<li><a href="#">Mi Cuenta</a></li> -->
			<li><a href="action.php?action=logout">Salir</a></li>		  
		</ul>
	</li>
<?php } ?>
</ul>
<br /><br /><br /><br />