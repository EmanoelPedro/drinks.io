
# DRINKS.IO

Aplicação Laravel de drinks, consumindo a API CocktailDB.

Rotas Site:

GET / - Home Page
GET /drink/{id} - Mostra um drink especifico
GET|POST /search - Mostra o resultado de uma busca.


Rotas API: 

GET: /favorite-drinks - Retorna todos os drinks favoritos

POST: /favorite-drinks - Salva um drink como favorito.

DELETE: /favorite-drinks/{id} - Deleta um link pelo Id.

## INSTRUÇÕES PARA TESTAR EM PRODUÇÃO

### Requisitos:
- PHP ^8.0
- Composer
- NodeJS e NPM

1) - criar o arquivo ".env" apartir de ".env.example"

2) - configurar a conexão com seu banco de dados no arquivo ".env".

3) - Instalar as dependências do Composer:
``` 
$ composer install
```

4) - Gerar a chave da aplicação:
```
php artisan key:generate
```

5) - Instalar as dependências do NPM:
```
npm install
```

6) - Rodar as Migrations:
```
$ php artisan migrate

```
7) - Iniciar o servidor do Laravel:
```
$ php artisan serve
```

8) - Compilar os assets frond-end:
```
$ npm run dev
```
