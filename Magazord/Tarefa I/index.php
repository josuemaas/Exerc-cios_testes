<?php
session_start();

// Define as tarefas
if (!isset($_SESSION['tarefas'])) {
    $_SESSION['tarefas'] = [
        ['id' => 1, 'titulo' => "Tarefa 1", 'descricao' => "Descrição da Tarefa 1", 'concluida' => false],
        ['id' => 2, 'titulo' => "Tarefa 2", 'descricao' => "Descrição da Tarefa 2", 'concluida' => true],
        // Adicione mais tarefas conforme necessário
    ];
}

// Marca a tarefa como concluída
if (isset($_GET['concluir'])) {
    $idTarefa = (int)$_GET['concluir'];
    foreach ($_SESSION['tarefas'] as &$tarefa) {
        if ($tarefa['id'] === $idTarefa) {
            $tarefa['concluida'] = !$tarefa['concluida'];
            break;
        }
    }
}

// Função para exibir a lista de tarefas
function exibirTarefas($tarefas) {
    foreach ($tarefas as $tarefa) {
        $estilo = $tarefa['concluida'] ? 'text-decoration: line-through; color: grey;' : 'color: black;';
        echo "<li style='$estilo'>
                <h2>{$tarefa['titulo']}</h2>
                <p>{$tarefa['descricao']}</p>
                <a href='?concluir={$tarefa['id']}'>Marcar como " . ($tarefa['concluida'] ? "não concluída" : "concluída") . "</a>
              </li>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>
<body>
    <h1>Lista de Tarefas</h1>
    <ul>
        <?php exibirTarefas($_SESSION['tarefas']); ?>
    </ul>
</body>
</html>