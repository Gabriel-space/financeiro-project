import axios from 'axios';

export default {
    listar() {
        return axios.get('/api/despesas');
    },

    criar(dados) {
        return axios.post('/api/despesas', dados);
    },

    atualizar(id, dados) {
        return axios.put(`/api/despesas/${id}`, dados);
    },

    excluir(id) {
        return axios.delete(`/api/despesas/${id}`);
    },
};
