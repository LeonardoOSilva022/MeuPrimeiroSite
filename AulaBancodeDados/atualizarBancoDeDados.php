<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$id = (int)$_GET['id'];
$nome = $_GET['nome'];
$precoEmReais = $_GET['precoEmReais'];


$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'fullstack';

$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "UPDATE caixaRegistradora SET nome = '$nome', preco = $precoEmReais where id = $id";

if($conn->query($sql) === TRUE){
    echo $nome . " foi atualizado com sucesso";
}
else{
    echo $nome . " nao foi atualizado com sucesso";

}

$conn->close();

?>