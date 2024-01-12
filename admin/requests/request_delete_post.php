<?php
session_start();

include_once ('../../helpers/database.php');

$post_id = $_GET['post_id'];
$user_level = $_SESSION['user_level'];
$connection = connectDatabase();
$root_dir = $_SERVER['DOCUMENT_ROOT'] . '/chef-em-casa';

// Função para verificar se o usuário é o autor do post
function is_author_post($post_id, $connection){
    $user_id = $_SESSION['user_id'];

    $query = "SELECT user_id FROM posts WHERE id = '$post_id' AND user_id = '$user_id'";
    $result = mysqli_query($connection, $query);

    return mysqli_num_rows($result) > 0;
}

if (is_author_post($post_id, $connection) || $user_level == 'admin') {
    // Obtém o caminho do arquivo da imagem do post
    $query = "SELECT image FROM posts WHERE id = '$post_id'";
    $result = mysqli_query($connection, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $image_path = $root_dir . '/' . $row['image'];

        // Verifica se o arquivo existe antes de tentar excluí-lo
        if (file_exists($image_path)) {
            // Exclui o arquivo
            unlink($image_path);
        } else {
            // Se o arquivo não existir, você pode querer lidar com isso de alguma forma
            $_SESSION['message'] = "Aviso: O arquivo não foi encontrado.";
            $_SESSION['message_type'] = "warning";
            header("Location: ../posts.php");
        }

        // Deleta o post do banco de dados
        $delete_query = "DELETE FROM posts WHERE id = '$post_id'";
        $delete_result = mysqli_query($connection, $delete_query);

        if ($delete_result) {
            $_SESSION['message'] = "Sua postagem foi deletada com sucesso.";
            $_SESSION['message_type'] = "success";
            header("Location: ../posts.php");
        } else {
            $_SESSION['message'] = "Ocorreu um erro ao deletar a postagem. Tente novamente mais tarde.";
            $_SESSION['message_type'] = "danger";
            header("Location: ../posts.php");
        }
    } else {
        $_SESSION['message'] = "Erro ao obter o caminho da imagem.";
        $_SESSION['message_type'] = "danger";
        header("Location: ../posts.php");
    }
} else {
    $_SESSION['message'] = "Você não tem permissão para deletar essa postagem";
    $_SESSION['message_type'] = "danger";
    header("Location: ../posts.php");
}
?>
