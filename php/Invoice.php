<?php
class Invoice{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";

	private $database  = "php_extra";   

	private $invoiceUserTable = 'administrador';		
	
	private $invoiceOrderTable = 'alumno';
	private $invoiceOrderItemTable = 'alumno';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

		public function loginUsers($email, $password){
		$sqlQuery = "
			SELECT *
			FROM ".$this->invoiceUserTable." 
			WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}
		
	public function checkLoggedIn(){
		if(!$_SESSION['userid']) {
			header("Location:../index.php");
		}
	}		

	public function checkLoggedIn2(){
		if(!$_SESSION['userid']) {
			header("Location:index.php");
		}
	}	
	
		public function saveInvoice($POST) {		
		$sqlInsert = "
			INSERT INTO ".$this->invoiceOrderTable."(user_id, nombre, carrera, num_control_alumno, semestre, turno, sexo, numero_seguro_social, domicilio, telefono_casa, telefono_cel, telefono_trabajo, fecha_nacimiento, tipo_de_sangre, lugar_nacimiento, curp, estatura, peso, email_alumno, alergias, alergias_e, actividades, actividades_e, exclusivo_servicio, exclusivo_servicio_e) 
			VALUES ('".$POST['userId']."', '".$POST['nombre']."', '".$POST['carrera']."', '".$POST['num_control_alumno']."', '".$POST['semestre']."', '".$POST['turno']."', '".$POST['sexo']."', '".$POST['numero_seguro_social']."', '".$POST['domicilio']."', '".$POST['telefono_casa']."', '".$POST['telefono_cel']."', '".$POST['telefono_trabajo']."', '".$POST['fecha_nacimiento']."', 
			'".$POST['tipo_de_sangre']."', '".$POST['lugar_nacimiento']."', '".$POST['curp']."', '".$POST['estatura']."', '".$POST['peso']."', '".$POST['email_alumno']."', '".$POST['alergias']."', '".$POST['alergias_e']."', '".$POST['actividades']."', '".$POST['actividades_e']."', '".$POST['exclusivo_servicio']."', '".$POST['exclusivo_servicio_e']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);

	
}



public function saveInvoice2($POST) {		
	$sqlInsert = "
		INSERT INTO ".$this->invoiceOrderTable."(user_id, nombre, carrera, num_control_alumno, semestre, turno, sexo, numero_seguro_social, domicilio, telefono_casa, telefono_cel, telefono_trabajo, fecha_nacimiento, tipo_de_sangre, lugar_nacimiento, curp, estatura, peso, email_alumno, alergias, alergias_e, actividades, actividades_e, exclusivo_servicio, exclusivo_servicio_e) 
		VALUES ('1', '".$POST['nombre']."', '".$POST['carrera']."', '".$POST['num_control_alumno']."', '".$POST['semestre']."', '".$POST['turno']."', '".$POST['sexo']."', '".$POST['numero_seguro_social']."', '".$POST['domicilio']."', '".$POST['telefono_casa']."', '".$POST['telefono_cel']."', '".$POST['telefono_trabajo']."', '".$POST['fecha_nacimiento']."', 
		'".$POST['tipo_de_sangre']."', '".$POST['lugar_nacimiento']."', '".$POST['curp']."', '".$POST['estatura']."', '".$POST['peso']."', '".$POST['email_alumno']."', '".$POST['alergias']."', '".$POST['alergias_e']."', '".$POST['actividades']."', '".$POST['actividades_e']."', '".$POST['exclusivo_servicio']."', '".$POST['exclusivo_servicio_e']."')";		
	mysqli_query($this->dbConnect, $sqlInsert);
	$lastInsertId = mysqli_insert_id($this->dbConnect);


}
	
	
	
		public function updateInvoice($POST) {
		if($POST['invoiceId']) {	
			$sqlInsert = "
				UPDATE ".$this->invoiceOrderTable." 
				SET nombre = '".$POST['nombre']."', carrera= '".$POST['carrera']."', num_control_alumno = '".$POST['num_control_alumno']."', semestre = '".$POST['semestre']."', turno = '".$POST['turno']."', sexo = '".$POST['sexo']."', numero_seguro_social = '".$POST['numero_seguro_social']."', domicilio = '".$POST['domicilio']."', telefono_casa = '".$POST['telefono_casa']."', telefono_cel = '".$POST['telefono_cel']."', telefono_trabajo = '".$POST['telefono_trabajo']."', fecha_nacimiento = '".$POST['fecha_nacimiento']."', curp = '".$POST['curp']."', tipo_de_sangre  = '".$POST['tipo_de_sangre']."', lugar_nacimiento = '".$POST['lugar_nacimiento']."', estatura = '".$POST['estatura']."', peso = '".$POST['peso']."', email_alumno = '".$POST['email_alumno']."',
alergias= '".$POST['alergias']."', alergias_e = '".$POST['alergias_e']."', actividades = '".$POST['actividades']."', actividades_e = '".$POST['actividades_e']."', exclusivo_servicio = '".$POST['exclusivo_servicio']."', exclusivo_servicio_e = '".$POST['exclusivo_servicio_e']."'
				WHERE user_id = '".$POST['userId']."' AND idced = '".$POST['invoiceId']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		
  	
	}	
	
	public function getInvoiceList(){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE actividades= 'AJEDREZ' AND user_id = '".$_SESSION['userid']."' " ;
		return  $this->getData($sqlQuery);
	}	

	public function getInvoiceList2(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'AJEDREZ'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList3(){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."' AND actividades= 'ATLETISMO'" ;
		return  $this->getData($sqlQuery);
	}
	public function getInvoiceList4(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'BANDA-DE-GUERRA'" ;
	return  $this->getData($sqlQuery);
	}	
	public function getInvoiceList5(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND actividades= 'BASQUET-BOL'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList6(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'BEISBOL'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList7(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'DANZA'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList8(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'KARATE-DO'" ;
	return  $this->getData($sqlQuery);
	}	
	public function getInvoiceList9(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'MUSICA'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList10(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'OTRAS'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList11(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'PESAS'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList12(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'PINTURA'" ;
	return  $this->getData($sqlQuery);
	}	
	public function getInvoiceList13(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'SOCCER'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList14(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND  actividades= 'STAFF'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList15(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND actividades= 'TAE-KWON-DO'" ;
	return  $this->getData($sqlQuery);
	}
	public function getInvoiceList16(){
		$sqlQuery = "
		SELECT * FROM ".$this->invoiceOrderTable." 
		WHERE user_id = '".$_SESSION['userid']."' AND actividades= 'VOLEIBOL'" ;
	return  $this->getData($sqlQuery);
	}	
	public function getInvoice($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."' AND idced = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_assoc($result);
		return $row;
	}	
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "
			SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE idced = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	public function deleteInvoiceItems($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE idced = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteInvoice($invoiceId){
		$sqlQuery = "
			DELETE FROM ".$this->invoiceOrderTable." 
			WHERE idced = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteInvoiceItems($invoiceId);	
		return 1;
	}
}
?>