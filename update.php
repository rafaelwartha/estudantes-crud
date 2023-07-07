<?php
// Verifica se o ID do estudante foi fornecido
require_once 'session-start.php';

if (isset($_GET['id'])) {
    require_once 'conecta-db.php';

    // Obtém o ID do estudante
    $id = $_GET['id'];

    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os novos valores dos campos do formulário
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $nota_final = $_POST['nota_final'];

        // Atualiza as informações do estudante no banco de dados
        $query = "UPDATE estudantes SET nome = :nome, idade = :idade, nota_final = :nota_final WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':nota_final', $nota_final);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('location: index.php');
    } else {
        // Obtém as informações atuais do estudante do banco de dados
        $query = "SELECT * FROM estudantes WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Verifica se o estudante foi encontrado
        if ($stmt->rowCount() > 0) {
            $estudante = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Estudante não encontrado!";
            exit();
        }
    }
} else {
    echo "ID do estudante não fornecido!";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Estudante</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            width: 100%;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box; /* Adicionado */
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Estilo para o botão "Voltar" */
        a.button {
            display: block;
            width: 100%;
            text-align: center;
            padding: 8px;
            margin-top: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Editar Estudante</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $estudante['nome']; ?>"><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" value="<?php echo $estudante['idade']; ?>"><br>

        <label for="nota_final">Nota Final:</label>
        <input type="number" step="0.01" id="nota_final" name="nota_final" value="<?php echo $estudante['nota_final']; ?>"><br>

        <button type="submit">Atualizar</button>
    </form>

    <a href="index.php" class="button">Voltar</a>
</body>
</html>

