
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$host = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'fullstack';


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$sql = "SELECT * FROM `caixaRegistradora` where deletado = 0";


$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
?>

<a href="lerAntesDeAtualizar.php?id=<?php echo $row['id'];?>">Editar</a> ------ 
<a href="deletarBancoDeDadosSoftDelete.php?id=<?php echo $row['id'];?>">Apagar soft delete</a> ------ 
<a href="deletarBancoDeDados.php?id=<?php echo $row['id'];?>">Apagar de verdade</a> ------ 

<?php
        echo $row['id'] . " - " . $row["nome"] . " - " . $row["preco"] . ' - ' . $row['dataDeCriacao'] . "<br>";
    
    }
}

$conn->close();

?>
