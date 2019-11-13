# Laravel-TodoList

## Como Instalar

1. `git clone`
1. `composer install`
1. `cp .env.example .env`

#Configuração do .env

No campo "DB_DATABASE" ponha o nome do seu banco de dados MYSQL: DB_DATABASE=nomedoseubanco;
No campo "DB_USERNAME" ponha o seu usuário do MYSQL: DB_USERNAME=root;
No campo "DB_PASSWORD" ponha a sua senha do MYSQL: DB_PASSWORD=andreluiz19;

Rode os comandos:
1. `php artisan key:generate`
1. `php artisan migrate:fresh --seed`, para subir o banco de dados e o administrador padrão.

#Inicialização do servidor:
No terminal, utilize o comando `php artisan serve`. O sistema pode ser acessado pelo endereço http://localhost:8000/

#Utilizando o sistema:

#Autenticação
Para acessar o sistema é necessário realizar o login com **nome: admin** e **senha: admin**
Você será redirecionado para a tela de listagem de tarefas pendentes e finalizadas. 

#Tarefas:
Uma tarefa tem uma descrição, data de finalização, status e timestamps de criação e atualização.

**Criar tarefa:**
    Para criar uma nova tarefa, basta clicar no botão "Adicionar tarefa". Você será redirecionado a uma página de criação, deverá escrever uma descrição para a tarefa e apertar em "Criar".
    
**Finalizar tarefa:**
    Uma tarefa criada pode ser marcada como finalizada, clicando-se no botão "finalizar". Nesse caso, o status passa a ser "Finalizada" e a data de finalização é atualizada para a data atual.
    Não é possível finalizar uma tarefa mais de uma vez. Nesse caso, o sistema retornará um erro.

**Deletar tarefas**
    Para deletar uma tarefa, basta clicar no botão "Deletar" e  em "Confirmar".




