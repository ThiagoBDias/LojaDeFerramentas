// Arquivo: frontend/src/components/FerramentasList.tsx
// Descrição: Componente que lista todas as ferramentas disponíveis

import { useEffect, useState } from 'react';
import { getFerramentas, type Ferramenta } from '../services/api';
import './FerramentasList.css';

export default function FerramentasList() {
  const [ferramentas, setFerramentas] = useState<Ferramenta[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
  const [searchTerm, setSearchTerm] = useState('');

  // Carrega as ferramentas quando o componente é montado ou quando o termo de busca muda
  useEffect(() => {
    loadFerramentas();
  }, []);

  const loadFerramentas = async (search?: string) => {
    try {
      setLoading(true);
      setError(null);
      const data = await getFerramentas(search);
      setFerramentas(data);
    } catch (err) {
      setError('Erro ao carregar as ferramentas. Verifique se a API está rodando.');
      console.error(err);
    } finally {
      setLoading(false);
    }
  };

  const handleSearch = (e: React.FormEvent) => {
    e.preventDefault();
    loadFerramentas(searchTerm || undefined);
  };

  const formatPrice = (price: string) => {
    return parseFloat(price).toLocaleString('pt-BR', {
      style: 'currency',
      currency: 'BRL'
    });
  };

  if (loading) {
    return (
      <div className="container">
        <div className="loading">Carregando ferramentas...</div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="container">
        <div className="error">{error}</div>
      </div>
    );
  }

  return (
    <div className="container">
      <header className="header">
        <h1>Loja de Ferramentas</h1>
        <form onSubmit={handleSearch} className="search-form">
          <input
            type="text"
            placeholder="Buscar ferramentas..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="search-input"
          />
          <button type="submit" className="search-button">Buscar</button>
          {searchTerm && (
            <button
              type="button"
              onClick={() => {
                setSearchTerm('');
                loadFerramentas();
              }}
              className="clear-button"
            >
              Limpar
            </button>
          )}
        </form>
      </header>

      <div className="ferramentas-grid">
        {ferramentas.length === 0 ? (
          <p className="no-results">Nenhuma ferramenta encontrada.</p>
        ) : (
          ferramentas.map((ferramenta) => (
            <div key={ferramenta.id} className="ferramenta-card">
              <img
                src={ferramenta.imagem_url || 'https://via.placeholder.com/300x300.png?text=Sem+Imagem'}
                alt={ferramenta.nome}
                className="ferramenta-image"
              />
              <div className="ferramenta-content">
                <h3 className="ferramenta-title">{ferramenta.nome}</h3>
                {ferramenta.categoria_nome && (
                  <span className="ferramenta-category">{ferramenta.categoria_nome}</span>
                )}
                <p className="ferramenta-description">
                  {ferramenta.descricao?.substring(0, 100)}
                  {ferramenta.descricao && ferramenta.descricao.length > 100 ? '...' : ''}
                </p>
                <div className="ferramenta-footer">
                  <span className="ferramenta-price">{formatPrice(ferramenta.preco)}</span>
                  <button className="details-button">Ver Detalhes</button>
                </div>
              </div>
            </div>
          ))
        )}
      </div>
    </div>
  );
}
