<?php
// Arquivo: api/db.php
// Descrição: Configuração e inicialização da conexão com o banco de dados usando PDO.

// --- Configurações do Banco de Dados ---
// Substitua pelos seus dados de conexão.
define('DB_HOST', '127.0.0.1');       // Endereço do servidor do banco de dados (geralmente localhost)
define('DB_NAME', 'loja_de_ferramentas'); // Nome do banco de dados criado
define('DB_USER', 'root');          // Usuário do banco de dados
define('DB_PASS', '');              // Senha do banco de dados

// --- DSN (Data Source Name) ---
// String de conexão que informa ao PDO o driver do banco e outras configurações.
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

// --- Opções do PDO ---
// Configurações para o comportamento da conexão PDO.
$options = [
    // Garante que o PDO lance exceções em caso de erros, facilitando o tratamento.
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Define o modo de busca padrão para arrays associativos (ex: $row['nome']).
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Desativa a emulação de prepared statements para usar a funcionalidade nativa do MySQL, mais segura.
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// --- Bloco de Conexão ---
// Tenta estabelecer a conexão com o banco de dados.
try {
    // Cria uma nova instância do PDO para ser usada nos endpoints da API.
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // Em caso de falha na conexão, interrompe a execução e exibe uma mensagem de erro.
    // Em um ambiente de produção, o ideal é logar o erro em vez de exibi-lo na tela.
    http_response_code(500); // Internal Server Error
    echo json_encode([
        'status' => 'error',
        'message' => 'Falha na conexão com o banco de dados.',
        // 'error_details' => $e->getMessage() // Descomente apenas para depuração
    ]);
    exit; // Interrompe a execução do script
}

// --- Configurações de Cabeçalho da API ---
// Define que a resposta será no formato JSON e permite o acesso de qualquer origem (CORS).
// Em produção, restrinja o 'Access-Control-Allow-Origin' para o domínio do seu frontend.
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Permite acesso de qualquer origem
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Tratamento para requisições OPTIONS (pre-flight requests do CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
