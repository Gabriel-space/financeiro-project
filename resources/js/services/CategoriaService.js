import axios from 'axios';

export default {
    listar() {
        return axios.get('/api/categorias');
    },

    criar(dados) {
        return axios.post('/api/categorias', dados);
    },

    atualizar(id, dados) {
        return axios.put(`/api/categorias/${id}`, dados);
    },

    excluir(id) {
        return axios.delete(`/api/categorias/${id}`);
    },
};
