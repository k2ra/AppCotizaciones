<?php

class cotizacion{

	public $db;
	
	

		public function __construct()
		    {
		       $this->db = new Conexion();
		    }

		public function insertaCotizacion($numcotiza, $cliente, $empresa,$telefono,$correo, $subtotal, $impuesto, $total,$detalle){
			$detallecot=array();
			$fecha_actual = date("y-m-d");

			$query = "INSERT INTO tbl_cotizaciones VALUES ('$numcotiza', '$cliente','$fecha_actual','$total')";


			if ($this->db->query($query)) {
    			echo "New record created successfully";
			} else {
   				echo "Error: " . $query . "<br>" . $this->db->error();
			}

			//mysqli_close($this->connect);

				$detallecot = json_decode($detalle,true);
			
				foreach($detallecot as $obj => $value){
					
					echo $value['descripcion'];
					$cantidad=$value['cantidad'];
					$descripcion=$value['descripcion'];
					$precio = $value['precio'];

					$querydet = "INSERT INTO detallecotizacion VALUES ('$numcotiza', '$cliente', '$empresa','$telefono','$correo','$impuesto','$total','$cantidad' ,'$descripcion' , '$precio')";
					//echo $obj[0];
				      // $id =$det[$obj]{'descripcion'};
				       // $descripcion = $obj{'descripcion'};
				        //$cantidad = $obj->cantidad;
					if ($this->db->query($querydet)) {
	    				echo "New record created in detalle cotizacion successfully";
					} else {
		   				echo "Error: " . $query . "<br>" . $this->db->error();
					}
				}
				$this->db->close();
			

		}

		public function eliminarCotizacion($id){

			$query = "DELETE FROM tbl_cotizaciones WHERE id_cotizacion ='$id'";

			
			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				   return 1;
				} else {
				    return 0;
				}
		}
		
		public function buscaProductos(){
			
			$resp =array();
			$query = "SELECT * FROM tbl_productos";

			/*if (mysqli_query($this->connect, $query)) {
    			echo "select successfully";
			} else {
   				echo "Error: " . $query . "<br>" . mysqli_error($this->connect);
			}*/

			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				    while($row = $this->db->recorrer($result)) {
				        $resp[] = array("id" => $row["id_products"], "descripcion" => $row["descripcion"], "precio" => $row["precio"]);


				        //"id: " . $row["id_products"]. " descripcion: " . $row["descripcion"]. " precio" . $row["precio"];
				    }
				} else {
				    echo "0 results";
				}
				return $resp;
		}


		public function buscaProductosXdesc($producto){
			
			$resp =array();
			$query = "SELECT * FROM tbl_productos WHERE descripcion like'%$producto%'";

			/*if (mysqli_query($this->connect, $query)) {
    			echo "select successfully";
			} else {
   				echo "Error: " . $query . "<br>" . mysqli_error($this->connect);
			}*/

			$result =$this->db->query($query);

				if ($result) {
				    // output data of each row
				    while($row = $this->db->recorrer($result)) {
				        $resp[] = array("id" => $row["id_products"], "descripcion" => $row["descripcion"], "precio" => $row["precio"], "fecha_de_alta"=> $row["prod_fecha"]);


				        //"id: " . $row["id_products"]. " descripcion: " . $row["descripcion"]. " precio" . $row["precio"];
				    }
				} else {
				    echo "0 results";
				}
				return $resp;
		}

		public function muestradetcotizacion(){
			
			$resp =array();
			$query = "SELECT * FROM tbl_cotizaciones";

			/*if (mysqli_query($this->connect, $query)) {
    			echo "select successfully";
			} else {
   				echo "Error: " . $query . "<br>" . mysqli_error($this->connect);
			}*/

			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				    while($row = $this->db->recorrer($result)) {
				        $resp[] = array("id" => $row["id_cotizacion"], "cliente" => $row["cliente"], "fecha" => $row["fecha_cotizacion"], "monto" => $row["monto"]);


				        //"id: " . $row["id_products"]. " descripcion: " . $row["descripcion"]. " precio" . $row["precio"];
				    }
				} else {
				    echo "0 results";
				}
				return $resp;
		}

		public function cotizacionesxmes(){
			
			$resp =array();
			$query = "SELECT DATE_FORMAT(fecha_cotizacion,'%Y') as ano, DATE_FORMAT(fecha_cotizacion,'%M') as mes, count(*) as cantidad FROM tbl_cotizaciones group by DATE_FORMAT(fecha_cotizacion,'%Y-%M') order by id_cotizacion desc";


			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				    while($row = $this->db->recorrer($result)) {
				        $resp[] = array("año" => $row["ano"],"mes" => $row["mes"], "cantidad" => $row["cantidad"]);

				        	/*"año" => $row["ano"], */
				        //"id: " . $row["id_products"]. " descripcion: " . $row["descripcion"]. " precio" . $row["precio"];
				    }
				} else {
				    echo "0 results";
				}
				return $resp;
		}


		public function insertaClients($nombre, $empresa, $cedula,$correo,$direccion,$telefono){
			$detallecot=array();
			$fecha_actual = date("y-m-d");

			$query = "INSERT INTO tbl_clients (clie_nombre,clie_nombre_comercial,clie_cedula,clie_correo,clie_direccion,clie_telefono) VALUES ('$nombre', '$empresa','$cedula','$correo','$direccion','$telefono')";


			if ($this->db->query($query)) {
    			return 1;
			} else {
   				echo "Error: " . $query . "<br>" . $this->db->error();
			}

			
				$this->db->close();
			

		}


		public function buscaDatosClie($buscaCliente){
			
			$resp =array();
			$query = "SELECT * FROM tbl_clients WHERE clie_nombre like '$buscaCliente%'  or clie_nombre_comercial like '$buscaCliente%'";
						//or CONCAT(clie_nombre,' ',clie_apellido) like '$buscaCliente%'";


			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				    while($row = $this->db->recorrer($result)) {
				        $resp[] = array("id"=>$row["clie_id"], "nombre" => $row["clie_nombre"], "empresa"=> $row["clie_nombre_comercial"],"ruc" => $row["clie_cedula"], "correo" => $row["clie_correo"], "direccion" => $row["clie_direccion"] ,"telefono"=>$row["clie_telefono"]);

//$resp= $row["clie_nombre"];
				        //"id: " . $row["id_products"]. " descripcion: " . $row["descripcion"]. " precio" . $row["precio"];
				    }
				} else {
				    $resp = "";

				}
				return $resp;
		}

		public function eliminarClients($id){
			
			$resp ="";
			$query = "DELETE FROM tbl_clients WHERE clie_id ='$id'";

			
			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				   return 1;
				} else {
				    return 0;
				}
				//return $result;
		}


		public function updateClients($idEdit,$nombreEdit,$empresaEdit,$cedulaEdit,$correoEdit,$direccionEdit,$telefonoEdit){

			
			$query = "UPDATE tbl_clients SET clie_nombre ='$nombreEdit', clie_nombre_comercial='$empresaEdit', clie_cedula='$cedulaEdit',clie_correo='$correoEdit',clie_direccion='$direccionEdit',clie_telefono='$telefonoEdit'  WHERE clie_id ='$idEdit'";

			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				   return 1;
				} else {
				    return 0;
				}
		}


		public function insertaProductos($descripcion, $precio, $fecha){
			$detallecot=array();
			$fecha_actual = date("y-m-d");

			$query = "INSERT INTO tbl_productos ( id_products, descripcion, precio, prod_fecha) VALUES ('h','$descripcion', '$precio','$fecha_actual')";


			if ($this->db->query($query)) {
    			echo "Nuevo Producto agregado correctamente";
			} else {
   				echo "Error: " . $query . "<br>" . $this->db->error();
			}

			
			$this->db->close();
			

		}


		public function eliminarProducts($id){

			$query = "DELETE FROM tbl_productos WHERE id_products ='$id'";

			
			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				   return 1;
				} else {
				    return 0;
				}
		}


		public function updateProducts($idEdit,$descripcionEdit,$precioEdit,$fechaEdit){

			$fecha_actual = date("y-m-d");
			$query = "UPDATE tbl_productos SET descripcion ='$descripcionEdit', precio='$precioEdit', prod_fecha='$fecha_actual'  WHERE id_products ='$idEdit'";

			$result = $this->db->query($query);

				if ($result) {
				    // output data of each row
				   return 1;
				} else {
				    return 0;
				}
		}		





		public function validaCredenciales($user, $password){
			
			$ans ="";
			$query = "SELECT * FROM tbl_usuarios WHERE correo_electronico = '$user' AND clave = '$password' ";

			$result = $this->db->query($query);


			if( $this->db->rows($result) > 0){

				while($row = $this->db->recorrer($result)) {

				$ans= $row["nombre"]." ".$row["apellido"];
				}
			}
			else{
				$ans=false;
			}


				return $ans;
		}

		public function detalleCotizacion(){
			$numcotiza = $_GET['data'];
			$result = $this->db->query("SELECT *,DATE_FORMAT(cotiza.fecha_cotizacion, '%d/%m/%Y') as fecha	FROM detallecotizacion det, tbl_cotizaciones cotiza	WHERE det.cotizacion = cotiza.id_cotizacion and cotiza.id_cotizacion ='$numcotiza'");

			if($this->db->rows($result) >0){
				while($data = $this->db->recorrer($result)){
					$resp[]=$data;
				}

			}else{
				$resp =false;
			}

			return $resp;
		}

		public function insertaFactura($numfactura){
			$numcotiza = $_POST['txtCotizacion'];
			$cliente = $_POST['txtCliente'];
			$empresa = $_POST['txtEmpresa'];
			$telefono = $_POST['txtTelefono'];
			$correo = $_POST['txtCorreo'];
			$subtotal = $_POST['txtsubtotal'];
			$itbms = $_POST['txtitbms'];
			$total = $_POST['txttotal'];

			$result = $this->db->query("INSERT INTO TBL_FACTURA VALUES('$numfactura',now(),'$numcotiza','$cliente','$empresa','$telefono','$correo','$subtotal','$itbms',$total)");

			if ($this->db->affected_rows>0) {
    			$resp = "Nuevo Producto agregado correctamente";
			} else {
   				$resp =false;
			}

			
			$this->db->close();

			return $resp;
		
		}

		public function listaFactura(){

			$result = $this->db->query("SELECT id_factura as factura, fecha,cliente,monto FROM tbl_factura");

			if($this->db->rows($result) >0){
				while($data = $this->db->recorrer($result)){
					$resp[]=$data;
				}

			}else{
				$resp =false;
			}

			return $resp;
		}
	
}


?>