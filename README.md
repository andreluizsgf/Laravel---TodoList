# Laravel-TodoList

## Como Instalar

1. `git clone`
1. `php composer install`
1. `cp .env.example .env`

#Configuração do .env

No campo "DB_DATABASE" ponha o nome do seu banco de dados MYSQL: DB_DATABASE=nomedoseubanco;
No campo "DB_USERNAME" ponha o seu usuário do MYSQL: DB_USERNAME=root;
No campo "DB_PASSWORD" ponha a sua senha do MYSQL: DB_PASSWORD=andreluiz19;

Rode os comandos:
1. `php artisan key:generate`
1. `php artisan migrate:fresh --seed`, para subir o banco de dados e o administrador padrão.

#Inicialização do servidor:
No terminal, utilize o comando php artisan serve. O sistema pode ser acessado pelo endereço http://localhost:8000/

##Utilizando o sistema

