<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "folios_cdt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM usuarios WHERE Usuario='Usuario';";

if ($conn->query($sql) === TRUE) {
    echo "Se borro el registro exitosamente";
} else {
    echo "Error al borrar el registro: " . $conn->error;
}

$conn->close();
?>
