<?php ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa registradora</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1em;
            text-align: center;
        }

        main {
            padding: 1em;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1em;
            margin-bottom: 0.5em;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"] {
            padding: 0.75em;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 1em;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.75em;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="button"]:hover {
            background-color: #45a049;
        }


        .erro {
            color: red;
            padding-bottom: 50px;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <main>
        <form method="GET" action="inserirBancoDeDados.php">
            <label for="nome">Nome do produto:</label>
            <input type="text" id="nome" name="nome">

            <label for="precoEmReais">Preço em reais:</label>
            <input type="number" id="precoEmReais" name="precoEmReais">

            <div class="resultado" id="mensagemDeResultado"></div>
            <div class="erro" id="mensagemDeErro"></div>


            <input type="submit" value="Registrar">
        </form>

    </main>

</body>

</html>