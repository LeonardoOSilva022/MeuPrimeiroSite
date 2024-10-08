<?php

require "../conexao.php";

if (!isset($_GET['id'])) {
    header('Location:listar.php');
}
$id = $_GET['id'];


$sql = "SELECT * FROM `filmes` where id = $id";

$resultado = $conn->query($sql);

$row = $resultado->fetch_assoc();

$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Filme - Locadora</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            margin: 0;
            display: flex;
            height: 100vh;
            color: #333;
        }

        .sidebar {
            background-color: #2c3e50;
            width: 250px;
            padding: 20px;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.2);
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h2 {
            color: white;
            font-size: 24px;
            margin: 0;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ecf0f1;
            font-size: 18px;
            display: block;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            color: #ecf0f1;
        }

        .main-content {
            flex: 1;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin: 20px;
            overflow-y: auto;
        }

        .main-content h1 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input[type="submit"] {
            background-color: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: #34495e;
        }
    </style>
</head>

<body>
    <?php require "../menu.php"; ?>
    <div class="main-content">
        <h1>Atualizar Filme</h1>

        <form action="acoes/atualizarAcao.php" method="GET">
            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="titulo" value="<?php echo $row['titulo'] ?>" required>
            </div>

            <div class="form-group">
                <label for="genre">Gênero:</label>
                <select id="genre" name="genero" required>
                    <option value="acao" <?php if ($row["genero"] == "acao")
                        echo 'selected'; ?>>Ação</option>
                    <option value="comedia" <?php if ($row["genero"] == "comedia")
                        echo 'selected'; ?>>Comédia</option>
                    <option value="drama" <?php if ($row["genero"] == "drama")
                        echo 'selected'; ?>>Drama</option>
                    <option value="fantasia" <?php if ($row["genero"] == "fantasia")
                        echo 'selected'; ?>>Fantasia</option>
                    <option value="suspense" <?php if ($row["genero"] == "suspense")
                        echo 'selected'; ?>>Suspense</option>
                    <option value="terror" <?php if ($row["genero"] == "terror")
                        echo 'selected'; ?>>Terror</option>
                </select>
            </div>

            <div class="form-group">
                <label for="release_date">Data de Lançamento:</label>
                <input type="date" id="release_date" name="dataDeLancamento"
                    value="<?php echo $row['dataDeLancamento'] ?>" required>
            </div>

            <div class="form-group">
                <label for="director">Diretor:</label>
                <input type="text" id="director" name="diretor" value="<?php echo $row['diretor'] ?>" required>
            </div>

            <div class="form-group">
                <label for="rating">Classificação:</label>
                <input type="text" id="rating" name="classificacao" value="<?php echo $row['classificacao'] ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea id="description" name="descricao" rows="4" required><?php echo $row['descricao'] ?></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="Atualizar Filme">
            </div>
        </form>
    </div>

</body>

</html>