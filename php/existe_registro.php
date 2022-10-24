			<?php
			function existe_registro($query)
			{
				$host="localhost";
				$user="root";
				$pass="";
				$db="folios_cdt";

				$connect=new mysqli($host, $user, $pass, $db) or die("error" . msqli_errno($connect));
				if($connect->connect_error){
					die("Conexión fallida: ".$connect->connect_error);
				}
 				$resultado=$connect->query($query);
 				$row = $resultado->fetch_row();
				#print($row[0]);
				return $row[0];
			}
				?>
