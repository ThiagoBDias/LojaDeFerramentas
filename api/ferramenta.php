<?php
// Arquivo: api/ferramenta.php
// Descrição: Endpoint para buscar os detalhes de uma única ferramenta pelo seu ID.

// Inclui o arquivo de conexão com o banco de dados.
require_once 'db.php';

// Verifica se o ID da ferramenta foi fornecido como um parâmetro na URL.
// Se não for fornecido ou for inválido, retorna um erro 400 (Bad Request).
if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => 'ID da ferramenta inválido ou não fornecido.'
    ]);
    exit;
}

// Armazena o ID da ferramenta de forma segura.
$id = (int)$_GET['id'];

try {
    // Consulta SQL para selecionar todos os detalhes de uma ferramenta específica
    // e o nome da sua categoria.
    $sql = "
        SELECT 
            f.id, 
            f.nome, 
            f.descricao, 
            f.preco, 
            f.imagem_url,
            f.disponivel,
            f.data_criacao,
            c.nome AS categoria_nome 
        FROM 
            ferramentas f
        LEFT JOIN 
            categorias c ON f.categoria_id = c.id
        WHERE 
            f.id = :id
    ";

    // Prepara a consulta para execução.
    $stmt = $pdo->prepare($sql);

    // Associa o valor do ID ao placeholder :id, garantindo a segurança contra SQL Injection.
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    // Executa a consulta.
    $stmt->execute();

    // Busca o resultado. Como esperamos apenas um registro, usamos `fetch()`.
    $ferramenta = $stmt->fetch();

    // Se a ferramenta for encontrada, retorna os dados.
    if ($ferramenta) {
        http_response_code(200); // OK
        echo json_encode([
            'status' => 'success',
            'data' => $ferramenta
        ]);
    } else {
        // Se nenhuma ferramenta for encontrada com o ID fornecido, retorna um erro 404 (Not Found).
        http_response_code(404);
        echo json_encode([
            'status' => 'error',
            'message' => 'Ferramenta não encontrada.'
        ]);
    }

} catch (PDOException $e) {
    // Em caso de erro no servidor ou na consulta, retorna um erro 500.
    http_response_code(500); // Internal Server Error
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao buscar a ferramenta.',
        // 'error_details' => $e->getMessage() // Descomente apenas para depuração
    ]);
}
