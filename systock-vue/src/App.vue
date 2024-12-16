<template>
  <div class="app">
    <!-- Sidebar -->
    <div class="sidebar">
      <ul>
        <li><a href="/">Usuários</a></li>
        <li><a href="/criar">Criar Usuários</a></li>
        <li><a href="/alterar">Configurar Usuários</a></li>
      </ul>
    </div>

    <!-- Conteúdo principal -->
    <div class="main-content">
      <router-view />
    </div>
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>

<style scoped>

.app {
  display: flex;
}


.sidebar {
  width: 130px;
  background-color: #2c3e50; 
  color: white;
  padding: 10px;
  height: 100vh; 
}

.sidebar ul {
  list-style-type: none;
  padding: 0;
}

.sidebar li {
  margin: 15px 0;
}

.sidebar a {
  color: white;
  text-decoration: none;
  font-size: 18px;
  display: block;
  padding: 10px;
  border-radius: 5px;
  transition: background-color 0.3s ease, transform 0.3s ease; /* Suaviza as transições */
}


.sidebar a:hover {
  background-color: #34495e; 
  transform: scale(1.05); 
}

.sidebar a:active {
  background-color: #1abc9c;
}


.main-content {
  flex-grow: 1; 
  padding: 10px;
  margin-left: 40px; 
}
</style>
