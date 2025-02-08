# Ranking API

Este projeto é uma API REST simples desenvolvida em **PHP** utilizando o **Slim Framework**, que retorna o ranking de um determinado movimento. A API lista os usuários, seus respectivos recordes pessoais (maior valor), posição e data.

## 📌 Funcionalidades
- Retorna o ranking de um determinado movimento
- Ordena os usuários pelo maior recorde pessoal
- Usuários com o mesmo recorde ocupam a mesma posição

## 📋 Requisitos
- PHP 8.0+
- Composer
- Servidor MySQL ou MariaDB

## 🚀 Instalação

1. Clone este repositório:
   ```sh
   git clone https://github.com/seu-usuario/nome-do-repo.git
   cd nome-do-repo
   ```

2. Instale as dependências com o Composer:
   ```sh
   composer install
   ```

3. Configure o banco de dados no arquivo `.env`:
   ```env
   DB_HOST=localhost
   DB_NAME=ranking_db
   DB_USER=root
   DB_PASS=secret
   ```

4. Crie o banco de dados e execute as migrations e seeders:
   ```sh
   php .\database\migrations.php
   php .\database\seeder.php
   ```

5. Inicie o servidor embutido do PHP:
   ```sh
   composer start
   ```

## 📡 Endpoints

### ➤ Obter Ranking de um Movimento
`GET /ranking/{movement_id}`

#### Exemplo de Resposta:
```json
{
    "movement": "Deadlift",
    "ranking": [
        { "position": 1, "user": "Jose", "record": 190, "date": "2021-01-06" },
        { "position": 2, "user": "Joao", "record": 180, "date": "2021-01-02" },
        { "position": 3, "user": "Paulo", "record": 170, "date": "2021-01-01" }
    ]
}
```

## 🛠 Tecnologias Utilizadas
- **PHP 8**
- **Slim Framework**
- **MySQL**
- **Composer**
- **Swagger** (Documentação da API)

## 📖 Documentação Swagger

Para visualizar a documentação da API, acesse:
[Swagger UI](http://localhost:8000/swagger)


## 📜 Estrutura do Projeto
```
/
├── App/
│   ├── Controllers/
│   │   ├── RankingController.php  # Controlador principal do ranking
│   ├── Models/
│   │   ├── Movement.php         # Model de Movimentos
│   │   ├── PersonalRecord.php   # Model de Recordes Pessoais
│   │   ├── User.php             # Model de Usuários
├── config/
│   ├── database.php             # Configuração do banco de dados
├── database/
│   ├── migrations.php           # Script de criação das tabelas
│   ├── seeder.php               # Popula o banco de dados com dados iniciais
├── public/
│   ├── index.php                # Entrada principal da API
│   ├── swagger/
│   │   ├── index.html          # Documentação da API
│   │   ├── docs/               # Diretório para arquivos da documentação
├── routes/
│   ├── web.php                  # Definição das rotas da API
├── vendor/                      # Dependências do Composer
├── .gitignore                   # Arquivos ignorados no Git
├── composer.json                # Dependências do projeto
├── composer.lock                # Controle de versões do Composer
├── README.md                    # Documentação do projeto
├── swagger.php                   # Configuração do Swagger
```

## 📝 Considerações
- O projeto foi desenvolvido seguindo boas práticas e pode ser facilmente expandido.
- O código está versionado e pode ser acessado no GitHub.
- Sugestões e melhorias são bem-vindas!

## 📄 Licença
Este projeto está sob a licença MIT. Sinta-se livre para utilizá-lo e contribuir! 🎉

