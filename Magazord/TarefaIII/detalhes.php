<?php
// Simulando a base de dados com os mesmos produtos do index.php
$produtos = [
    1 => [
        'id' => 1,
        'nome' => 'Cadeira Gamer',
        'preco' => 'R$ 890,99',
        'imagem' => 'imagens/cadeira.jpg',
        'descricao' => 'Sinta o conforto ergonômico enquanto mergulha em suas aventuras virtuais. Com seu design arrojado em vermelho vibrante, esta cadeira é mais do que apenas um assento - é um portal para um novo nível de imersão e desempenho.',
    ],
    2 => [
        'id' => 2,
        'nome' => 'Celular',
        'preco' => 'R$ 5.100,00',
        'imagem' => 'imagens/celular.jpg',
        'descricao' => 'Fotos vibrantes e cheias de vida com 108MP. Câmera com IA que captura detalhes que você nem imaginava serem possíveis, para que você possa relembrar seus momentos mais preciosos com qualidade.',
    ],
    3 => [
        'id' => 3,
        'nome' => 'Notebook',
        'preco' => 'R$ 4.200,00',
        'imagem' => 'imagens/notebook.jpg',
        'descricao' => 'Intel Core 5. Windows 11 Home. 16 GB RAM, 512 GB SSD. Tela 15.6" Full HD AMOLED.',
    ],
    4 => [
        'id' => 4,
        'nome' => 'Tablet',
        'preco' => 'R$ 2.500,00',
        'imagem' => 'imagens/tablet.jpg',
        'descricao' => 'Tela de 14.6 Polegadas. 512GB, 12GB RAM. Câmera Traseira: 13MP.',
    ],
    5 => [
        'id' => 5,
        'nome' => 'Teclado',
        'preco' => 'R$ 200,00',
        'imagem' => 'imagens/teclado.jpg',
        'descricao' => 'O teclado gamer Logitech G515 LIGHTSPEED TKL oferece uma experiência de nível superior com um design slim e engenharia pensada para desempenho.',
    ]
];

// Obtendo o ID do produto a partir da URL
$id_produto = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Verificando se o produto existe
if (isset($produtos[$id_produto])) {
    $produto = $produtos[$id_produto];
} else {
    die('Produto não encontrado!');
}

// Definindo o tema
$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>

    <!-- Carrega o CSS geral e o tema dinâmico -->
    <link rel="stylesheet" href="css/style.css"> <!-- Estilos gerais -->
    <link rel="stylesheet" href="themes/<?php echo $theme; ?>.css"> <!-- Aplica o tema selecionado -->
    
    <style>
        .produto-detalhes {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
            padding: 20px;
        }

        /* Ajustando o tamanho da imagem */
        .produto-imagem {
            width: 300px; /* Define o tamanho fixo da largura */
            height: auto; /* Mantém a proporção da imagem */
            margin-bottom: 20px; /* Espaço abaixo da imagem */
        }

        .produto-detalhes h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .produto-detalhes p {
            font-size: 1.1rem;
            line-height: 1.6;
            text-align: justify;
            margin-bottom: 20px;
        }

        .voltar-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .voltar-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Detalhes do Produto</h1>

    <div class="produto-detalhes">
        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>" class="produto-imagem">
        <h2><?php echo $produto['nome']; ?></h2>
        <p><strong>Preço:</strong> <?php echo $produto['preco']; ?></p>
        <p><strong>Descrição:</strong> <?php echo $produto['descricao']; ?></p>
        <a href="index.php" class="voltar-link">Voltar para a lista de produtos</a>
    </div>

</body>
</html>
