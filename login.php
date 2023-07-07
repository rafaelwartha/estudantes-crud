<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        form {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; /* Adicionado */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #161616;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        h3 {
            color: #ff0000;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" action="autenticar.php">
        <h1>Login</h1>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>
        
        <?php if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
           <h3>Credenciais inválidas</h3>
        <?php } ?>
        <?php if (isset($_GET['erro']) && $_GET['erro'] == 2) { ?>
           <h3>Faça o login para continuar</h3>
        <?php } ?>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
