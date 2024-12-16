```markdown
# Documentação Técnica do DESAFIO SYSTOCK

## Descrição

Este repositório contém o código-fonte de um sistema de gestão de usuários utilizando Vue.js para o front-end e Laravel para o back-end. O sistema implementa funcionalidades básicas de CRUD (Criar, Ler, Atualizar e Deletar) para gerenciar usuários, incluindo cadastro, listagem, alteração e exclusão.

## Instruções de Configuração

### Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas em seu ambiente:

- **Docker**: Para rodar os contêineres do projeto.
- **Docker Compose**: Para orquestrar os contêineres.

### Passos para Rodar o Projeto

1. Clone o repositório em sua máquina local:

   ```bash
   git clone https://github.com/MiguelAmoedo/desafio-systock.git
   cd desafio-systock
   ```

2. Para configurar e rodar os contêineres com todas as dependências do projeto, execute o seguinte comando:

   ```bash
   docker-compose up -d
   ```

   Este comando irá configurar e iniciar o back-end (Laravel) e o front-end (Vue.js) em contêineres Docker, de forma que o sistema estará pronto para ser utilizado.

---

## Configuração do Front-End (Vue.js)

O front-end foi desenvolvido utilizando **Vue.js**. O projeto roda na **porta 8081**.

### Rotas do Vue.js

O sistema possui as seguintes rotas configuradas no Vue.js:

- **Home (Usuários)**: Exibe a lista de usuários.
  - **Rota**: `/`
  - **Componente**: `UserList`

- **Criar Usuário**: Formulário para criação de novos usuários.
  - **Rota**: `/criar`
  - **Componente**: `UserCreate`

- **Alterar Usuário**: Formulário para alteração de dados de um usuário existente.
  - **Rota**: `/alterar`
  - **Componente**: `UserSettings`

```javascript
{
  path: '/',
  name: 'users',
  component: UserList,
},
{
  path: '/criar',
  name: 'criar',
  component: UserCreate,
},
{
  path: '/alterar',
  name: 'alterar',
  component: UserSettings,
}
```

### Funcionamento do CRUD

O sistema possui funcionalidades de CRUD para manipulação de usuários, que podem ser realizadas através da interface Vue.js, que se comunica com a API Laravel.

---

## Configuração do Back-End (Laravel)

O back-end foi desenvolvido utilizando **Laravel**. O sistema de API está disponível na **porta 8000**.

### Rotas do Laravel

As rotas do Laravel permitem a criação, leitura, atualização e exclusão de usuários. Aqui estão as rotas implementadas no arquivo `routes/web.php`:

- **Listar usuários**: Retorna todos os usuários.
  - **Método**: `GET`
  - **Rota**: `/user`
  - **Controller**: `UserController@index`

- **Exibir um usuário específico**: Exibe os detalhes de um usuário específico.
  - **Método**: `GET`
  - **Rota**: `/user/{id}`
  - **Controller**: `UserController@show`

- **Cadastrar um novo usuário**: Cria um novo usuário com os dados informados.
  - **Método**: `POST`
  - **Rota**: `/user`
  - **Controller**: `UserController@store`

    Exemplo de dados para cadastro:
    ```json
    {
      "name": "João da Silvaa",
      "email": "joa1o@exemplo.com",
      "password": "senha123",
      "password_confirmation": "senha123",
      "cpf": "06436679898" // CPF deve ser válido
    }
    ```

- **Atualizar dados de um usuário**: Atualiza os dados de um usuário específico.
  - **Método**: `PUT`
  - **Rota**: `/user/{id}`
  - **Controller**: `UserController@update`

- **Deletar um usuário**: Exclui um usuário específico.
  - **Método**: `DELETE`
  - **Rota**: `/user/{id}`
  - **Controller**: `UserController@destroy`

---

## Considerações Finais

Esse sistema foi projetado para ser simples e funcional, oferecendo as principais operações de CRUD para gerenciamento de usuários.

Para modificar ou estender o sistema, sinta-se à vontade para contribuir e ajustar o código conforme suas necessidades.

---

## Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
```

Este `README.md` fornece uma visão geral clara do projeto, instruções de configuração, detalhes sobre o funcionamento das rotas e a documentação técnica necessária para que outros desenvolvedores ou equipes possam entender e contribuir para o sistema.
