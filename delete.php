<?php
// Verifica se o ID do estudante foi fornecido
if (isset($_GET['id'])) {
    require_once 'conecta-db.php';

    // Obtém o ID do estudante
    $id = $_GET['id'];

    // Verifica se o estudante existe no banco de dados
    $query = "SELECT * FROM estudantes WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Verifica se o estudante foi encontrado
    if ($stmt->rowCount() > 0) {
        // Exclui o estudante do banco de dados
        $query = "DELETE FROM estudantes WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('location: index.php');
    } else {
        echo "Estudante não encontrado!";
    }
} else {
    echo "ID do estudante não fornecido!";
}
