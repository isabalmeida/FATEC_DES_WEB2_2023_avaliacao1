<?php
session_start();

if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCompleto = $_POST["nomeCompleto"];
    $ra = $_POST["ra"];
    $placaVeiculo = $_POST["placaVeiculo"];

    
    $registro = "$nomeCompleto|$ra|$placaVeiculo\n\n";

    file_put_contents("registro.txt", $registro, FILE_APPEND);

    echo "Cadastro realizado!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Alunos - Fatec</title>
</head>
<body>
    <h1>Entre com o cadastro do aluno</h1>
    <form method="post" action="">
        <label for="nomeCompleto">Nome Completo:</label>
        <input type="text" id="nomeCompleto" name="nomeCompleto" required><br><br>

        <label for="ra">Registro Acadêmico (R.A.):</label>
        <input type="text" id="ra" name="ra" required><br><br>

        <label for="placaVeiculo">Placa do veículo:</label>
        <input type="text" id="placaVeiculo" name="placaVeiculo" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="logout.php">Sair</a>
</body>
</html>