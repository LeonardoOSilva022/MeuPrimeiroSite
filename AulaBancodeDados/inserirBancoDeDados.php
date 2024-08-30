<?php
ini_set('error_reporting', E_ALL); 
ini_set('display_errors', 1);

$nome = $_GET['nome'];
$precoEmReais = $_GET['precoEmReais'];


$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'fullstack';

// Cria uma conexão
$conn = new mysqli($host, $user, $password, $database);


// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// errada! $sql = "INSERT INTO caixaRegistradora('nome', 'valor') VALUES('$nome', $precoEmReais);";
$sql = "INSERT INTO caixaregistradora(nome, preco) VALUES('$nome', $precoEmReais)";

if($conn->query($sql) === TRUE){
    echo $nome . " foi inserido com sucesso";
}
else{
    echo $nome . " nao foi inserido com sucesso";

}

$conn->close();


?>