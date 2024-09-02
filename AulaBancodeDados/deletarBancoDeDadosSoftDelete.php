<?php
ini_set('error_reporting', E_ALL); 
ini_set('display_errors', 1);

$id = $_GET['id'];

$host = '127.0.0.1'; 
$user = 'root';
$password = '';
$database = 'fullstack';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$contadorSql = "Select count(*) as total from caixaRegistradora where id = $id";

$resultado = $conn->query($contadorSql);

$row = $resultado->fetch_assoc();


if ($row['total'] == 0) {
    echo $id . " nao existe!";

} else {
    $sql = "UPDATE caixaRegistradora set deletado = 1 where id = $id";


    if ($conn->query($sql) === TRUE) {
        echo $id . " foi deletado (de mentirinha) com sucesso";
    } else {
        echo $id . " nao foi deletado com sucesso";

    }
}

$conn->close();

?>