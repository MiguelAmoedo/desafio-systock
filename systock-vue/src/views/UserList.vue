<template>
    <div class="user-list-container">
      <!-- Mensagem de erro, se houver -->
      <div v-if="error" class="error-message">
        {{ error }}
      </div>
  
      <!-- Mensagem de carregamento -->
      <div v-if="loading" class="loading-message">
        Carregando...
      </div>
  
      <!-- Exibe a lista de usuários quando carregado -->
      <div v-if="!loading && !error" class="user-list">
        <div v-for="user in users" :key="user.id" class="user-card">
          <div class="user-card-header">
            <img :src="user.avatarUrl || 'https://www.gravatar.com/avatar/'" alt="Avatar" class="user-avatar" />
            <span class="user-name">{{ user.name }}</span>
          </div>
          <div class="user-email">{{ user.email }}</div>
          <div class="user-cpf">
            <strong>CPF:</strong> {{ user.cpf }}
          </div>
          <div class="user-actions">
            <button @click="viewUser(user)" class="view-details-btn">Ver Detalhes</button>
          </div>
        </div>
      </div>
  
      <!-- Modal de Detalhes do Usuário -->
      <div v-if="selectedUser" class="modal-overlay" @click.self="closeModal">
        <div class="modal-content">
          <h2>Detalhes do Usuário</h2>
          <p><strong>Nome:</strong> {{ selectedUser.name }}</p>
          <p><strong>Email:</strong> {{ selectedUser.email }}</p>
          <p><strong>CPF:</strong> {{ selectedUser.cpf }}</p>
         
          <button @click="closeModal" class="close-modal-btn">Fechar</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { getUsers } from '@/services/api'; 
  
  export default {
    name: 'UserList',
    data() {
      return {
        users: [], 
        loading: true, 
        error: null, 
        selectedUser: null, 
      };
    },
    mounted() {
      this.fetchUsers(); 
    },
    methods: {
      async fetchUsers() {
        try {
          const response = await getUsers(); 
          if (response && response.data.data) {
            this.users = response.data.data; 
          } else {
            this.error = 'Dados não encontrados ou resposta inválida';
          }
        } catch (error) {
          this.error = 'Erro ao buscar usuários: ' + error.message; 
          console.error('Erro ao buscar usuários:', error); 
        } finally {
          this.loading = false; 
        }
      },
  
      viewUser(user) {
        this.selectedUser = user; // Define o usuário selecionado para exibir no modal
      },
  
      closeModal() {
        this.selectedUser = null; // Fecha o modal ao definir o usuário selecionado como null
      },
    },
  };
  </script>
  
  <style scoped>
  /* Estilos personalizados para tornar a aparência mais agradável */
  .user-list-container {
    padding: 20px;
  }
  
  .error-message {
    color: red;
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 20px;
  }
  
  .loading-message {
    color: #007bff;
    font-size: 1.2em;
    margin-bottom: 20px;
  }
  
  .user-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }
  
  .user-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 300px;
    padding: 16px;
    transition: transform 0.3s ease;
  }
  
  .user-card:hover {
    transform: scale(1.05);
  }
  
  .user-card-header {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
  }
  
  .user-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    margin-right: 12px;
  }
  
  .user-name {
    font-size: 1.2em;
    font-weight: bold;
  }
  
  .user-email {
    color: #555;
    font-size: 1em;
    margin: 8px 0;
  }
  
  .user-cpf {
    font-size: 0.9em;
    margin-bottom: 12px;
  }
  
  .user-actions {
    text-align: center;
  }
  
  .view-details-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .view-details-btn:hover {
    background-color: #0056b3;
  }
  
  /* Estilos do Modal */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  
  .modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 300px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }
  
  .modal-content h2 {
    font-size: 1.5em;
    margin-bottom: 12px;
  }
  
  .close-modal-btn {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    margin-top: 20px;
  }
  
  .close-modal-btn:hover {
    background-color: #d32f2f;
  }
  </style>
  