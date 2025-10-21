# Loja de Ferramentas - Guia de Desenvolvimento

Este projeto é uma loja online de ferramentas com backend em PHP e frontend em React.

## 🏗️ Arquitetura do Projeto

- **Backend**: PHP com PDO (API REST)
- **Frontend**: React + TypeScript + Vite
- **Banco de Dados**: MySQL
- **Deploy**: Vercel (frontend) + Render (backend) + PlanetScale (database)

## 📁 Estrutura de Pastas

```
LojaDeFerramentas/
├── api/                    # Backend PHP
│   ├── db.php             # Configuração de conexão com banco de dados
│   ├── ferramentas.php    # Endpoint: listar ferramentas
│   └── ferramenta.php     # Endpoint: detalhes de uma ferramenta
├── frontend/              # Aplicação React
│   ├── src/
│   │   ├── components/    # Componentes React
│   │   ├── services/      # Serviços de API
│   │   └── App.tsx        # Componente principal
│   └── package.json
└── schema.sql             # Script de criação do banco de dados
```

## 🚀 Como Rodar Localmente

### Pré-requisitos

1. **PHP** (versão 7.4 ou superior)
   - Recomendado: Instalar XAMPP ou WAMP
2. **MySQL** (incluído no XAMPP/WAMP)
3. **Node.js** (versão 18 ou superior)
   - Baixe em: https://nodejs.org/

### Passo 1: Configurar o Banco de Dados

1. Inicie o **Apache** e **MySQL** no painel do XAMPP
2. Acesse `http://localhost/phpmyadmin`
3. Crie um novo banco de dados chamado `loja_de_ferramentas`
4. Importe o arquivo `schema.sql` (aba "Importar" no phpMyAdmin)
5. Verifique se as credenciais em `api/db.php` estão corretas:
   ```php
   define('DB_HOST', '127.0.0.1');
   define('DB_NAME', 'loja_de_ferramentas');
   define('DB_USER', 'root');
   define('DB_PASS', '');  // Deixe vazio se estiver usando XAMPP
   ```

### Passo 2: Iniciar o Backend (API PHP)

Se você estiver usando XAMPP/WAMP, mova a pasta `LojaDeFerramentas` para dentro de `htdocs` (XAMPP) ou `www` (WAMP).

A API estará disponível em: `http://localhost/LojaDeFerramentas/api/`

**Ou use o servidor embutido do PHP:**

```powershell
php -S 127.0.0.1:8000
```

Teste os endpoints:
- Lista de ferramentas: http://127.0.0.1:8000/api/ferramentas.php
- Detalhes (ID 1): http://127.0.0.1:8000/api/ferramenta.php?id=1

### Passo 3: Iniciar o Frontend (React)

1. Abra um novo terminal
2. Navegue para a pasta `frontend`:
   ```powershell
   cd frontend
   ```

3. Se ainda não instalou as dependências, rode:
   ```powershell
   npm install
   ```

4. Inicie o servidor de desenvolvimento:
   ```powershell
   npm run dev
   ```

5. Abra seu navegador em: **http://localhost:5173**

## 🧪 Testando a Integração

Com o backend e frontend rodando:

1. Acesse `http://localhost:5173` no navegador
2. Você deve ver a lista de ferramentas carregando da API
3. Use a barra de busca para filtrar ferramentas
4. Se aparecer um erro de conexão, verifique se:
   - O servidor PHP está rodando (porta 8000 ou XAMPP)
   - O banco de dados está criado e populado
   - As credenciais em `api/db.php` estão corretas

## 📦 Próximos Passos

- [ ] Adicionar endpoint para formulário de contato
- [ ] Implementar autenticação para administradores
- [ ] Criar painel admin para gerenciar produtos
- [ ] Fazer deploy na Vercel (frontend) e Render (backend)

## 🐛 Problemas Comuns

### Erro: "Erro ao carregar ferramentas"

- **Causa**: API PHP não está acessível
- **Solução**: Verifique se o servidor PHP está rodando e se a URL em `frontend/src/services/api.ts` está correta

### Erro: "Falha na conexão com o banco de dados"

- **Causa**: MySQL não está rodando ou credenciais incorretas
- **Solução**: 
  - Inicie o MySQL no painel do XAMPP
  - Verifique as credenciais em `api/db.php`

### Erro: "npm não é reconhecido"

- **Causa**: Node.js não foi instalado corretamente ou não está no PATH
- **Solução**: 
  - Reinstale o Node.js marcando "Add to PATH"
  - Reinicie o VS Code após a instalação

## 📝 Licença

Este projeto é de código aberto para fins educacionais.
