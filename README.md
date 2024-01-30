
## Descrição

Este projeto utiliza o framework Laravel 10 para resolver o desafio INNYX. A base de dados é configurada automaticamente ao executar o comando `php artisan migrate`, incluindo dados pré-populados de categorias e produtos.

## Pré-requisitos

Certifique-se de ter o PHP, o Composer e o Laravel 10 corretamente instalados em seu sistema. Se não estiverem instalados, siga as instruções abaixo:

1. **PHP:**
   - Verifique se o PHP está instalado:
     ```bash
     php --version
     ```
   - Caso não esteja instalado, você pode baixá-lo [aqui](https://www.php.net/downloads.php).

2. **Composer:**
   - Instale o Composer seguindo as instruções em [getcomposer.org](https://getcomposer.org/download/).
   - Verifique a instalação:
     ```bash
     composer --version
     ```

3. **Laravel 10:**
   - Instale o Laravel 10 via Composer:
     ```bash
     composer global require laravel/installer
     ```
   - Certifique-se de adicionar o diretório de binários do Composer ao seu caminho (path).

## Funcionalidades

- **Usuários:**
  - Cadastrar.
  - Login para acessar a aplicação.

- **Produtos:**
  - Editar.
  - Excluir.
  - Listar todos os produtos.
  - Pesquisar por produtos por nome e descrição.

## Configuração

Depois que todos os pré-requisitos estiverem funcionando corretamente, seguir o passo-a-passo abaixo:

1. Clone o repositório `git clone https://github.com/xandedutra161/desafio-innyx.git`
2. No seu terminal execute `cd desafio-innyx` para entrar na pasta do projeto.
3. Configurar arquivo `.env`
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=nome-do-seu-banco-aqui
    DB_USERNAME=nome-de-usuario-do-banco
    DB_PASSWORD=senha-do-usuario-do-banco
4. Instale as dependencias do projeto.
    ```bash
    composer install
    php artisan key:generate
    php artisan migrate
    npm install --save-dev vite
5. E para finalizar, rode os dois comandos em processos diferentes.
    ```bash
    php artisan serve
    npm run dev

