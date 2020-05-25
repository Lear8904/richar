<?php session_start();
include_once 'conexion.php';
$con = new conexion();
$usuario = $_POST['username'];
$pass = $_POST['pass'];
$res = $con->buscar("usuario","  usuario='$usuario' and clave=MD5('$pass')");
echo "num rows " .$res->num_rows;
if ($res->num_rows > 0) {
    echo "ahuevo";
    $datos = $res->fetch_assoc();
    print_r($datos);
}
$con->close();

