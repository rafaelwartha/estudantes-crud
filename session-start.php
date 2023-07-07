<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php?erro=2'); // Redireciona para a página de login com uma mensagem de erro
    exit();
}            
?>