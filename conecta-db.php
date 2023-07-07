<?php

// Configurações da conexão com o banco de dados
$host = 'db';
$dbname = 'crud';
$user = 'postgres';
$password = 'postgres';

try {
    // Cria a conexão com o banco de dados usando PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    exit();
}

?>