<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <style>
        body{
            font-family: Arial;
            background: #1b1ebbd5
        }
        .grupo-imput label{
            display: block;
            margin-bottom: 5px;
        }
        .grupo-imput label{
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Novo Veiculo</h1>
    <h6>Nao precisa ler as letras pequenas</h6>
    <form action="#" method="post">
    <div class="grupo-input">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" required>
    </div>
    <div>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required>
    </div>
        <div>
        <label for="placa">Placa:</label>
        <input type="text" name="placa" required>
    </div>
        <div>
        <label for="ano">Ano:</label>
        <input type="number" name="ano" required>
    </div>
    <button type="submit" ckass="botao">Cadastrese</button>
</body>
</html>
<?php
include 'conexao.php';
if(isset($_POST['modelo'])){
    $modelo=$_POST['modelo'];
    $marca=$_POST['marca'];
    $marca=$_POST['placa'];
    $marca=$_POST['ano'];


    $sql="INSERT INTO Veiculo(Modelo, Marca, Placa, Ano) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $modelo, $marca, $placa, $ano);
    $stmt->execute();
    $stmt->close();
}
$conn->close();
?>