<?php

require_once('config.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $tarefa = $_POST['tarefa'];
    $status = $_POST['status'];

    // Atualiza a tarefa no banco de dados
    $query = "UPDATE tarefas SET tarefa = '$tarefa', status = '$status' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Verifica se a atualização foi bem-sucedida
    if ($result) {
        echo "Tarefa atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar tarefa: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>