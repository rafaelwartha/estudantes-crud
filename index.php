<?php
require_once 'session-start.php';
require_once 'conecta-db.php';

// Consulta os estudantes no banco de dados
$query = "SELECT * FROM estudantes";
$result = $pdo->query($query);

// Verifica se a consulta foi executada com sucesso
if ($result->rowCount() > 0) {
    $estudantes = $result->fetchAll(PDO::FETCH_ASSOC);
} else {
    $estudantes = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Estudantes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }

        .container {
           width: 80%;
           max-width: 800px;
            
        }

        header {
            background-color: #333;
            padding: 10px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
            
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
   <div class="container">
        <header>
            <a href="create.php">Criar Estudante</a>
            <a href="logoff.php">LogOff</a>
        </header>

    <h1>Lista de Estudantes</h1>

    <?php if (count($estudantes) > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Nota Final</th>
                <th>Excluir</th>
                <th>Editar</th>
            </tr>
            <?php foreach ($estudantes as $estudante): ?>
                <tr>
                    <td><?php echo $estudante['id']; ?></td> 
                    <td><?php echo $estudante['nome']; ?></td>
                    <td><?php echo $estudante['idade']; ?></td>
                    <td><?php echo $estudante['nota_final']; ?> </td>
                    <td>
                        <a href="delete.php?id=<?php echo $estudante['id']; ?>">Excluir</a>
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $estudante['id']; ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Nenhum estudante encontrado.</p>
    <?php endif; ?>
</div> 
</body>
</html>
