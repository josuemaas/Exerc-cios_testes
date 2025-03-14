<?php
// Verifica se o usuário selecionou um tema
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light'; // Tema padrão: 'light'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Produtos</title>
    
    <!-- Carrega o CSS geral e o tema dinâmico -->
    <link rel="stylesheet" href="css/style.css"> <!-- Estilos gerais -->
    <link rel="stylesheet" href="themes/<?php echo $theme; ?>.css" id="theme-css"> <!-- Aplica o tema selecionado -->
    
    <script>
        function changeTheme(theme) {
            // Salva a preferência do tema no cookie
            document.cookie = "theme=" + theme + "; path=/; max-age=" + 60 * 60 * 24 * 30; // Salva por 30 dias

            // Altera o arquivo CSS do tema
            var themeLink = document.getElementById("theme-css");
            themeLink.href = "themes/" + theme + ".css";
        }
    </script>
</head>
<body>

    <h1>Catálogo de Produtos</h1>

    <!-- Botões para alternar entre os temas -->
    <form>
        <label for="light">Claro</label>
        <input type="radio" name="theme" value="light" id="light" <?php echo ($theme === 'light') ? 'checked' : ''; ?> onclick="changeTheme('light')">

        <label for="dark">Escuro</label>
        <input type="radio" name="theme" value="dark" id="dark" <?php echo ($theme === 'dark') ? 'checked' : ''; ?> onclick="changeTheme('dark')">
    </form>

    <div class="produto-lista">
        <?php
        // Definindo um array com produtos
        $produtos = [
            [
                'id' => 1,
                'nome' => 'Cadeira Gamer',
                'preco' => 'R$ 890,99',
                'imagem' => 'imagens/cadeira.jpg',
            ],
            [
                'id' => 2,
                'nome' => 'Celular',
                'preco' => 'R$ 5.100,00',
                'imagem' => 'imagens/celular.jpg',
            ],
            [
                'id' => 3,
                'nome' => 'Notebook',
                'preco' => 'R$ 4.200,00',
                'imagem' => 'imagens/notebook.jpg',
            ],
            [
                'id' => 4,
                'nome' => 'Tablet',
                'preco' => 'R$ 2.500,00',
                'imagem' => 'imagens/tablet.jpg',
            ],
            [
                'id' => 5,
                'nome' => 'Teclado Gamer',
                'preco' => 'R$ 200,00',
                'imagem' => 'imagens/teclado.jpg',
            ]
        ];

        foreach ($produtos as $produto) {
            echo '<div class="produto">';
            echo '<img src="' . $produto['imagem'] . '" alt="' . $produto['nome'] . '" class="produto-imagem">';
            echo '<h3>' . $produto['nome'] . '</h3>';
            echo '<p>Preço: ' . $produto['preco'] . '</p>';
            echo '<a href="detalhes.php?id=' . $produto['id'] . '" class="detalhes-link">Ver Detalhes</a>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>
