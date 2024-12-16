<template>
    <div class="create-user">
      <div class="form-container">
        <h2>Cadastrar Usuário</h2>
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label for="name">Nome Completo</label>
            <input
              id="name"
              v-model="form.name"
              type="text"
              :class="{'invalid': !form.name}"
              placeholder="Digite seu nome completo"
              required
            />
            <span v-if="!form.name && submitted" class="error-message">Este campo é obrigatório</span>
          </div>
  
          <div class="form-group">
            <label for="email">Email</label>
            <input
              id="email"
              v-model="form.email"
              type="email"
              :class="{'invalid': !form.email}"
              placeholder="Digite seu email"
              required
            />
            <span v-if="!form.email && submitted" class="error-message">Este campo é obrigatório</span>
          </div>
  
          <div class="form-group">
            <label for="password">Senha</label>
            <input
              id="password"
              v-model="form.password"
              type="password"
              :class="{'invalid': !form.password}"
              placeholder="Digite sua senha"
              required
            />
            <span v-if="!form.password && submitted" class="error-message">Este campo é obrigatório</span>
          </div>
  
          <div class="form-group">
            <label for="password_confirmation">Confirmar Senha</label>
            <input
              id="password_confirmation"
              v-model="form.password_confirmation"
              type="password"
              :class="{'invalid': form.password !== form.password_confirmation}"
              placeholder="Confirme sua senha"
              required
            />
            <span v-if="form.password_confirmation && form.password !== form.password_confirmation" class="error-message">As senhas não coincidem</span>
          </div>
  
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input
              id="cpf"
              v-model="form.cpf"
              type="text"
              :class="{'invalid': !form.cpf}"
              placeholder="Digite seu CPF"
              required
            />
            <span v-if="!form.cpf && submitted" class="error-message">Este campo é obrigatório</span>
          </div>
  
          <button type="submit" class="submit-btn">Cadastrar</button>
        </form>
  
       
        <div v-if="message" class="message" :class="messageType">
          {{ message }}
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { createUser } from '@/services/api'; 
  
  export default {
    data() {
      return {
        form: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          cpf: '',
        },
        submitted: false,
        message: '',
        messageType: '',
      };
    },
    methods: {
      submitForm() {
        this.submitted = true; 
        const isValid = this.validateForm(); 
  
        if (isValid) {
          const userData = {
            name: this.form.name,
            email: this.form.email,
            password: this.form.password,
            password_confirmation: this.form.password_confirmation,
            cpf: this.form.cpf,
          };
  
          console.log('Dados do usuário para envio:', userData);
  
          createUser(userData)
            .then(response => {
              console.log('Usuário criado com sucesso:', response.data);
              this.message = 'Usuário criado com sucesso!';
              this.messageType = 'success';
              
            })
            .catch(error => {
              console.error('Erro ao criar o usuário:', error);
              this.message = 'Erro ao criar o usuário. Tente novamente mais tarde.';
              this.messageType = 'error'; 
            });
        }
      },
  
      // Valida os campos manualmente
      validateForm() {
        return (
          this.form.name &&
          this.form.email &&
          this.form.password &&
          this.form.password_confirmation === this.form.password &&
          this.form.cpf
        );
      },
    },
  };
  </script>
  
  <style scoped>
  .create-user {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f7fc;
  }
  
  .form-container {
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 100%;
    max-width: 500px;
  }
  
  h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
  }
  
  input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    margin-top: 5px;
  }
  
  input.invalid {
    border-color: red;
  }
  
  .error-message {
    color: red;
    font-size: 12px;
    margin-top: 5px;
  }
  
  .submit-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
  }
  
  .submit-btn:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
  }
  
  .message {
    margin-top: 20px;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
  }
  
  .message.success {
    background-color: #28a745;
    color: white;
  }
  
  .message.error {
    background-color: #dc3545;
    color: white;
  }
  </style>
  