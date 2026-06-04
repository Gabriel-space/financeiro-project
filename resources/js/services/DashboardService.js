import axios from 'axios';

export default {
    buscarResumo() {
        return axios.get('/api/dashboard');
    },
};
