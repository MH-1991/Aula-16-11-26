<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <style>
            
            table{
                width: 100%;
                border-collapse: collapse;
            }
            th,td{
                border: 2px, solid, #ddd;
                padding: 10px;
                text-align:left;
            }
            th{
                background-color:green;
                color: white;
            }
            tr:nth-child(even){
                background-color: #6b7b66
            }
            body{
                font-family: Arial;
                background: #b6b6b6;
                padding: 20px;
            }
            form{
                background-color:white;
                padding:20px;
                border-radius: 20px;
            }
        </style>
        <script>
            function preecherFormulario(id, nome, idade){
                document.getElementById('id').value=id;
                document.getElementById('modelo').value=modelo;
                document.getElementById('marca').value=marca;
                document.getElementById('placa').value=placa;
                document.getElementById('ano').value=ano;
            }
        </script>
        </head>
    <body>
        <ul>
            <li><a href="insert.php">CREATE</a></li>
            <li><a href="select.php">READ</a></li>
            <li><a href="update.php">UPDATE</a></li>
            <li><a href="delete.php">DELETE</a></li>
        </ul>
        <h1>Atualização de Veiculos</h1>
        <div id='lista-veiculos'>
            <?php
            include 'conexao.php';

            $sql = 'SELECT id,Marca,Modelo, Marca,Ano FROM Aluno';
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                ?>
                    <table>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Placa</th>
                            <th>Anor</th>
                        </tr>
                <?php
                while($row = $result->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?php echo $row["Marca"]; ?></td>
                            <td><?php echo $row["Modelo"]; ?></td>
                            <td><?php echo $row["Placa"]; ?></td>
                            <td><?php echo $row["Ano"]; ?></td>
                            <td><button onclick='preecherFormulario(<?php echo $row["id"]; ?>, "<?php echo $row["Marca"]; ?>", <?php echo $row["Modelo"]; ?>, <?php echo $row["Placa"]; ?>, <?php echo $row["Ano"]; ?>)'>Editar</Button></td>
                    <?php
                }
                ?>
                    </table><br><br>
                <?php
            }
            else{
                echo "0 resultados!";
            }
            ?>
        </div>
        <form action="#" method="post">
            <input type="hidden" name='id' id="id">

            <label>Marca:</label><br>
            <input type="text" name="marca" id="marca" required><br>
            <label>Modelo:</label><br>
            <input type="text" name="modelo" id="modelo" required><br>
            <label>Placa:</label><br>
            <input type="text" name="placa" id="placa" required><br>
            <label>Ano</label></br>
            <input type="number" name="ano" id="ano" requerid><br>

            <input type="submit" value="Atualizar">
        </form>
    </body>
</html>

<?php
if(isset($_POST['nome'])){
    $id = $conn->real_escape_string($_POST['id']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $idade = $conn->real_escape_string($_POST['idade']);

    $sql="UPDATE Aluno SET Nome='$nome', Idade=$idade WHERE id=$id";
    if($conn->query($sql) == TRUE){
        echo "Aluno atualizado com sucesso";
    }
    else{
        echo "Erro ao atualizar aluno!";
    }
}

$conn->close();
?>