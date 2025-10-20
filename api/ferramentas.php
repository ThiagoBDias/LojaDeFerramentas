<?php
// Arquivo: api/ferramentas.php
// Descrição: Endpoint para listar todas as ferramentas ou buscar por um termo.

// Inclui o arquivo de conexão com o banco de dados.
// O `require_once` garante que o arquivo seja incluído apenas uma vez e interrompe a execução se não for encontrado.
require_once 'db.php';

try {
    // Verifica se há um parâmetro de busca 'q' na URL.
    $searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';

    // A consulta SQL base para selecionar as ferramentas e suas categorias.
    $sql = "
        SELECT 
            f.id, 
            f.nome, 
            f.descricao, 
            f.preco, 
            f.imagem_url,
            c.nome AS categoria_nome 
        FROM 
            ferramentas f
        LEFT JOIN 
            categorias c ON f.categoria_id = c.id
    ";

    // Se um termo de busca for fornecido, adiciona uma cláusula WHERE para filtrar os resultados.
    if (!empty($searchTerm)) {
        // A cláusula WHERE busca o termo no nome da ferramenta ou no nome da categoria.
        $sql .= " WHERE f.nome LIKE :searchTerm OR c.nome LIKE :searchTerm";
    }

    // Adiciona uma ordenação padrão para os resultados.
    $sql .= " ORDER BY f.nome ASC";

    // Prepara a consulta SQL para execução.
    $stmt = $pdo->prepare($sql);

    // Se houver um termo de busca, associa o valor ao placeholder :searchTerm.
    // O uso de `bindValue` com `LIKE` e `%` previne SQL Injection.
    if (!empty($searchTerm)) {
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    }

    // Executa a consulta.
    $stmt->execute();

    // Busca todos os resultados e os armazena na variável $ferramentas.
    $ferramentas = $stmt->fetchAll();

    // Define o código de resposta HTTP para 200 (OK).
    http_response_code(200);

    // Retorna os dados das ferramentas em formato JSON.
    echo json_encode([
        'status' => 'success',
        'count' => count($ferramentas),
        'data' => $ferramentas
    ]);

} catch (PDOException $e) {
    // Em caso de erro na consulta, retorna uma mensagem de erro genérica.
    http_response_code(500); // Internal Server Error
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao buscar ferramentas.',
        // 'error_details' => $e->getMessage() // Descomente apenas para depuração
    ]);
}
