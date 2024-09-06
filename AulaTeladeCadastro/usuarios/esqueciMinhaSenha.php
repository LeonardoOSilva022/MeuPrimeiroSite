<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$email = $_GET['email'];
$senha = $_GET['novaSenha'];
$palavraDeSeguranca = $_GET['palavraDeSeguranca'];

$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'fullstack';


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM `usuarios` where `status` = 'ativo' and email = '$email' and palavraDeSeguranca = '$palavraDeSeguranca' limit 1";


$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    $sql = "UPDATE usuarios SET senha = '$senha' WHERE id = " . $row['id'];

    $resultado = $conn->query($sql);

    echo "Senha Atualizada :) " . $row["nome"];
} else {
    echo "Senha Não Atualizada :( ";
}

$conn->close();

?>