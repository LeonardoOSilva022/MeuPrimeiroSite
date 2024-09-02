<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);


if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("ID inválido fornecido.");
}

$id = $_GET['id']; 


$host = '127.0.0.1'; 
$user = 'root';
$password = '';
$database = 'fullstack';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$contadorSql = "SELECT count(*) as total FROM caixaregistradora WHERE id = $id";
$resultado = $conn->query($contadorSql);

if ($resultado) {
    $row = $resultado->fetch_assoc();

    if ($row['total'] == 0) {
        echo $id . " não existe!";
    } else {
        $sql = "DELETE FROM caixaregistradora WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo $id . " foi deletado com sucesso.";
        } else {
            echo $id . " não foi deletado com sucesso: " . $conn->error;
        }
    }
} else {
    echo "Erro ao verificar existência do registro: " . $conn->error;
}

$conn->close();
?>
