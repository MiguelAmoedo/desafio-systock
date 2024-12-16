import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api/user',
  headers: {
    'Content-Type': 'application/json',
  },
});

// Funções para interagir com a API
export const getUsers = () => api.get('/');
export const getUser = (id) => api.get(`/${id}`);
export const createUser = (user) => api.post('/', user);
export const updateUser = (id, user) => api.put(`/${id}`, user);
export const deleteUser = (id) => api.delete(`/${id}`);
