<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
</head>
<body>

    <h1>Adicionar Tarefa</h1>
    <form action="adicionar.php" method="POST">
        <input for="text" name="tarefa"placeholder="tarefa">
        <select name="status" >
        <option velue="status">Status:</label>
        <input type="text" name="status" id="status" required>
        <br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>