<?php
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);


$host = '127.0.0.1';
$usuario = 'root';
$password = '';
$database='fullstack';


$conn = new mysqli($host, $usuario, $password, $database);

if ($conn->connect_error) {
    die('Conexão Falhou'. $conn->connect_error);
}


$sql = "SELECT * FROM 'caixaregistradora'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['id'] . " - " . $row["nome"] . " - " . $row["preco"] . ' - ' . $row['dataDeCriacao'] . "<br>";
    }
}

$conn->close();
?>