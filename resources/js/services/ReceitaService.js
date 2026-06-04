import axios from 'axios';

export default {
    listar() {
        return axios.get('/api/receitas');
    },

    criar(dados) {
        return axios.post('/api/receitas', dados);
    },

    atualizar(id, dados) {
        return axios.put(`/api/receitas/${id}`, dados);
    },

    excluir(id) {
        return axios.delete(`/api/receitas/${id}`);
    },
};
