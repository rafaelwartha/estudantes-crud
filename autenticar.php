<?php
require_once 'conecta-db.php';

// Função para validar o login
function validarLogin($email, $senha) {
    global $pdo;

    // Limpar as entradas do usuário para evitar ataques de injeção de SQL
    $email = htmlspecialchars($email);
    $senha = htmlspecialchars($senha);

    // Consulta SQL para verificar as credenciais do usuário
    $query = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email, $senha]);

    if ($stmt->rowCount() > 0) {
        // O usuário foi autenticado com sucesso
        return true;
    } else {
        // Autenticação falhou
        return false;
    }
}

// Verificar se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (validarLogin($email, $senha)) {
        // Autenticação bem-sucedida, armazenar o email na variável de sessão
        session_start();
        $_SESSION['email'] = $email;
        
        header('Location: index.php');
        exit();
    } else {
        // Autenticação falhou, exibir mensagem de erro
        header('Location: login.php?erro=1');
        exit();
    }
}
?>
