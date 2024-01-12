<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <?php
    require_once('config.php');

    // Verifica se o ID da tarefa foi fornecido
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Obtém os dados da tarefa do banco de dados
        $query = "SELECT * FROM tarefas WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $tarefa = mysqli_fetch_assoc($result);

        // Exibe o formulário de edição
        echo "<form action='editar.php' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $tarefa['id'] . "'>";
        echo "<label for='tarefa'>Tarefa:</label>";
        echo "<input type='text' name='tarefa' id='tarefa' value='" . $tarefa['tarefa'] . "' required>";
        echo "<br>";
        echo "<label for='status'>Status:</label>";
        echo "<input type='text' name='status' id='status' value='" . $tarefa['status'] . "' required>";
        echo "<br>";
        echo "<input type='submit' value='Editar'>";
        echo "</form>";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
    ?>
</body>
</html>

