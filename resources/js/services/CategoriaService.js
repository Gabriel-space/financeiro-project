import axios from 'axios';

export default {
    listar() {
        return axios.get('/api/categorias');
    },

    criar(dados) {
        return axios.post('/api/categorias', dados);
    },
};
