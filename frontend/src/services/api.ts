// Arquivo: frontend/src/services/api.ts
// Descrição: Serviço para comunicação com a API PHP do backend

// URL base da API - mude para a URL do Render quando fizer deploy
const API_BASE_URL = 'http://localhost/LojaDeFerramentas/api';

// Interface que define a estrutura de uma ferramenta
export interface Ferramenta {
  id: number;
  nome: string;
  descricao: string;
  preco: string;
  imagem_url: string;
  categoria_nome: string;
  disponivel?: boolean;
  data_criacao?: string;
}

// Interface para a resposta da API de listagem
interface ApiResponse {
  status: string;
  count?: number;
  data: Ferramenta[] | Ferramenta;
  message?: string;
}

/**
 * Busca todas as ferramentas ou filtra por um termo de busca
 * @param searchTerm Termo opcional para buscar ferramentas específicas
 * @returns Promise com array de ferramentas
 */
export async function getFerramentas(searchTerm?: string): Promise<Ferramenta[]> {
  try {
    const url = searchTerm 
      ? `${API_BASE_URL}/ferramentas.php?q=${encodeURIComponent(searchTerm)}`
      : `${API_BASE_URL}/ferramentas.php`;
    
    const response = await fetch(url);
    
    if (!response.ok) {
      throw new Error(`Erro HTTP: ${response.status}`);
    }
    
    const result: ApiResponse = await response.json();
    
    if (result.status === 'success' && Array.isArray(result.data)) {
      return result.data;
    }
    
    throw new Error(result.message || 'Erro ao buscar ferramentas');
  } catch (error) {
    console.error('Erro ao buscar ferramentas:', error);
    throw error;
  }
}

/**
 * Busca os detalhes de uma ferramenta específica pelo ID
 * @param id ID da ferramenta
 * @returns Promise com os dados da ferramenta
 */
export async function getFerramenta(id: number): Promise<Ferramenta> {
  try {
    const response = await fetch(`${API_BASE_URL}/ferramenta.php?id=${id}`);
    
    if (!response.ok) {
      throw new Error(`Erro HTTP: ${response.status}`);
    }
    
    const result: ApiResponse = await response.json();
    
    if (result.status === 'success' && !Array.isArray(result.data)) {
      return result.data;
    }
    
    throw new Error(result.message || 'Ferramenta não encontrada');
  } catch (error) {
    console.error('Erro ao buscar ferramenta:', error);
    throw error;
  }
}
