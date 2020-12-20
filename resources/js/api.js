import axios from 'axios';

const baseURL = process.env.MIX_API_URL;

const api =  axios.create({
    baseURL
});

export default api;