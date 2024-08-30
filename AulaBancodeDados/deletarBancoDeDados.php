<?php
// Mostrar todos os erros
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// Verifica se o parâmetro 'id' foi passado e se é um número
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("ID inválido fornecido.");
}

$id = $_GET['id']; // Agora temos certeza de que o 'id' está definido e é um número

// Configurações de conexão com o banco de dados
$host = '127.0.0.1'; // ou localhost
$user = 'root';
$password = '';
$database = 'fullstack';

// Cria uma conexão
$conn = new mysqli($host, $user, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta SQL para verificar se o registro existe
$contadorSql = "SELECT count(*) as total FROM caixaregistradora WHERE id = $id";
$resultado = $conn->query($contadorSql);

// Verifica se a consulta foi bem-sucedida
if ($resultado) {
    $row = $resultado->fetch_assoc();

    if ($row['total'] == 0) {
        echo $id . " não existe!";
    } else {
        // Consulta SQL para deletar o registro
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

// Fecha a conexão com o banco de dados
$conn->close();
?>
