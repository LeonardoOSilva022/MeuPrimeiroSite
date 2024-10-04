<?php

require "../../conexao.php";

$email = $_GET['email'];
$senha = $_GET['novaSenha'];
$palavraDeSeguranca = $_GET['palavraDeSeguranca'];

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