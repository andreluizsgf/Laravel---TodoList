# Laravel-TodoList

## Como Instalar

1. `git clone https://github.com/andreluizsgf/Laravel---TodoList.git`
1. `composer install`
1. `cp .env.example .env`

Lembre-se de criar um banco de dados MYSQL.
Caso não saiba como, siga o tutorial abaixo:

### Criar DB no MYSQL:

1. No terminal, digite o comando `mysql -u "seunomedeusuario" -p;`;
2. Digite sua senha;
3. `CREATE DATABASE nomedoseubanco`

## Configuração do .env

1. No campo "DB_DATABASE" ponha o nome do seu banco de dados MYSQL: DB_DATABASE=nomedoseubanco;
1. No campo "DB_USERNAME" ponha o seu usuário do MYSQL: DB_USERNAME=seunomedeusuario;
1. No campo "DB_PASSWORD" ponha a sua senha do MYSQL: DB_PASSWORD=suasenha;

Rode os comandos:
1. `php artisan key:generate`
1. `php artisan migrate:fresh --seed`, para subir o banco de dados e o administrador padrão.

## Inicialização do servidor:
No terminal, utilize o comando `php artisan serve`. O sistema pode ser acessado pelo endereço http://localhost:8000/

## Arquivos importantes:

### Controle de rotas:
**Caminho: routes/web.php**
Algumas rotas são definidas nesse arquivo.

A rota '/' retorna a view de login. 

Na linha 24 é definido as rotas para as tarefas. O uso de middleware garante que nenhum usuário não logado consiga acessar quaisquer rotas nesse grupo. Por padrão, ao utilizar `Route::resource()` o Laravel instancia todas as rotas de um CRUD básico.

### Controller das Tarefas:
**Caminho: app/Http/Controllers/TaskController.php**

Na Controller são definidos todos os métodos que abrangem uma tarefa.

`index()` retorna uma coleção de todas as tarefas presentes no banco de dados para a view de visualização. A função `sortBy()` nos permite ordenar essa coleção de acordo com o Status de uma tarefa (pendente ou finalizada).

`create()` retorna a view de criação de uma tarefa.

`store()` é o método utilizado para guardar uma tarefa no banco de dados e está diretamente ligado com o método create(). Ao clicar no botão de 'Salvar', na criação de uma tarefa, uma requisição é enviada com os dados passados no formulário. Nesse caso, é criada uma `$task` com o dado passado e é salvo no banco de dados. A função apenas redireciona para a listagem de tarefas com uma resposta de sucesso.  

`edit()` nos permite mudar o status de uma tarefa para 'Finalizada'. É realizada uma busca no banco de dados pela tarefa, a partir do seu `id`. Se o campo `is_done` é igual a 2, significa que a tarefa já foi finalizada e um erro é lançado. Ao contrário, o status da tarefa é atualizado para 2 e a data de finalização `done_date` é atualizado para a data atual. Note que a extensão `Carbon()` é utilizada com essa finalidade. No final, há o redirecionamento para a listagem de tarefas e uma resposta de sucesso é enviada.

`destroy()` deleta uma tarefa do banco de dados. Simples e direta, recebe uma `Task $task` e deleta seu registro. Retorna um redirecionamento para a listagem de tarefas e uma resposta de sucesso é enviada.

### Model das Tarefas
**Caminho: app/Task.php**

Nesse campo você encontrará os campos preenchíveis de uma Tarefa, configurados pela propriedade `$fillable`.

A função `rules()` determina as regras para os nossos campos em `$fillable`. Para esse caso, obrigatoriamente queremos um texto, com no máximo 191 caracteres.

A função `getIsDoneStrAttribute()` retorna para um valor pré estabelecido na constante STATUS(linha 10), para um valor salvo no banco de dados. Ela é útil para msotrar um texto ao invés de números na listagem de tarefas.

### Seeder do administrador
**Caminho: database/seeds/App/UsersTableSeeder.php**

Ao executar o comando `php artisan migrate` a função `run()` criará um usuário, no banco de dados, com os dados passados na migration.

### Migração das Tasks.
**database/migrations/2019_11_12_214503_create_tasks_table.php**

Ao executar o comando `php artisan migrate` a função `up()` criará no banco de dados MySQL uma tabela com o nome 'tasks' e os campos estabelecidos no arquivo.


## Utilizando o sistema:

### Autenticação
Para acessar o sistema é necessário realizar o login com **nome: admin** e **senha: admin**
Você será redirecionado para a tela de listagem de tarefas pendentes e finalizadas. 

### Tarefas:
Uma tarefa tem uma descrição, data de finalização, status e timestamps de criação e atualização.

**Criar tarefa:**
    - Para criar uma nova tarefa, basta clicar no botão "Adicionar tarefa". Você será redirecionado a uma página de criação, deverá escrever uma descrição para a tarefa e apertar em "Salvar".
    - Caso desista da criação, clique no botão "Voltar" para retornar a lista de tarefas.
    
**Finalizar tarefa:**
    - Para finalizar uma tarefa, basta clicar no botão "Finalizar". Nesse caso, o status passa a ser "Finalizada" e a data de finalização é atualizada para a data atual.
    - Não é possível finalizar uma tarefa mais de uma vez. Nesse caso, o sistema retornará um erro.

**Apagar tarefa**
    Para deletar uma tarefa, basta clicar no botão "Apagar" e  em "Delete".




