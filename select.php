<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
            <style>
        body{
            font-family: Arial;
            background: #961032d5
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
    <h1>Procure seu Veiculo na lista</h1>
<?php
include 'conexao.php';

$sql = "SELECT id, Modelo, Marca, Placa, Ano FROM Veiculo";
$result = $conn->query($sql);


?>

<table>
    <tr>
        <th>ID</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Placa</th>
        <th>Ano</th>
    </tr>
<?php
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['Modelo']; ?></td>
            <td><?php echo $row['Marca']; ?></td>
            <td><?php echo $row['Placa']; ?></td>
            <td><?php echo $row['Ano']; ?></td>
</tr>
<?php

    }
}
else{
    echo "<tr>
        <td colspan='3'>Desculpa mas nao achemos teu carro, se quiser volta no começo e cadastre novamente</td>
    </tr>";
}
$conn->close();
?>
</table>
</body>
</html>