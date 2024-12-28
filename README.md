
# Projeto fornecedores

## Configurações do Projeto

1. **Clone o repositório**

    ```bash
    git clone https://github.com/ededias/teste-dev-php-edenilson.git
    cd teste-dev-php
    ```


1. **Docker**

    ```bash
        // para subir as imagens do docker
        docker compose up --build -d
        // para instalar as dependencias do laravel 
        docker exec -it laravel_app composer install
        // para rodar as migrations 
        docker exec -it laravel_app php artisan migrate
    ```

A aplicação ira rodar localhost

Utilizando a aplicação sem o docker

1. **Sem docker**
    
    ```bash
        // instalar as dependencias
        composer install
        // rodar as migrations
        php artisan migrate
    ```
    4. **Configure o arquivo `.env`**

    Edite o arquivo `.env` para configurar o banco de dados e outras variáveis. Exemplo de configuração para MySQL:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=laravel_user
    DB_PASSWORD=secret
    ```
 


## Documentação da API

#### Listar fornecedores

```http
  GET /api/supplier/list?orderBy=asc
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `orderBy` | `string` | Ordena a lista de fornecedores (asc/desc) |

#### Retorna uma lista de fornecedores

```http
  GET /api/supplier/find/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do fornecedor que deseja listar que você deseja buscar |

#### retorna a lista um unico fornecedor

```http
  POST /api/supplier/create/
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `fantasy`      | `string` | **Obrigatório**. Nome fantasia |
| `social`      | `string` | **Obrigatório**. Razão social |
| `phone`      | `string` | **Obrigatório**. Telefone de contato |
| `email`      | `string` | **Obrigatório**. e-mail de contato |
| `ie`      | `string` | **Obrigatório**. Inscrição estadual |
| `im`      | `string` | **Obrigatório**. Inscrição municipal |
| `document`      | `string` | **Obrigatório**. CNPJ ou CPF |
| `address`      | `object` | **Obrigatório**. Objeto de dados de endereço |
| `zipcode`      | `string` | **Obrigatório**. CEP do fornecedor |
| `street`      | `string` | **Obrigatório**. Logradouro do fornecedor |
| `number`      | `string` | **Obrigatório**. Numero do fornecedor |
| `neighborhood`      | `string` | **Obrigatório**. Bairro do fornecedor |
| `city`      | `string` | **Obrigatório**. Cidade do fornecedor |
| `state`      | `string` | **Obrigatório**. Estado do fornecedor |
| `country`      | `string` | **Obrigatório**. País do fornecedor |

#### Realiza o cadastro de um novo fornecedor



```http
  PUT /api/supplier/update/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. Id do fornecedor que deseja atualizar |
| `fantasy`      | `string` | **Obrigatório**. Nome fantasia |
| `social`      | `string` | **Obrigatório**. Razão social |
| `phone`      | `string` | **Obrigatório**. Telefone de contato |
| `email`      | `string` | **Obrigatório**. e-mail de contato |
| `ie`      | `string` | **Obrigatório**. Inscrição estadual |
| `im`      | `string` | **Obrigatório**. Inscrição municipal |
| `document`      | `string` | **Obrigatório**. CNPJ ou CPF |
| `address`      | `object` | **Obrigatório**. Objeto de dados de endereço |
| `zipcode`      | `string` | **Obrigatório**. CEP do fornecedor |
| `street`      | `string` | **Obrigatório**. Logradouro do fornecedor |
| `number`      | `string` | **Obrigatório**. Numero do fornecedor |
| `neighborhood`      | `string` | **Obrigatório**. Bairro do fornecedor |
| `city`      | `string` | **Obrigatório**. Cidade do fornecedor |
| `state`      | `string` | **Obrigatório**. Estado do fornecedor |
| `country`      | `string` | **Obrigatório**. País do fornecedor |

#### Realiza a edição de um fornecedor

```http
  DELETE /api/supplier/delete/{id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. Id do fornecedor que deseja atualizar |

#### Realiza a exclusão de um fornecedor

Recebe dois números e retorna a sua soma.

