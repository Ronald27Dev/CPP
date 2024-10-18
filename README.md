# CPP - Comunicação Pais e Professores

## Ideia do Projeto

Este projeto foi criado com o intuito de desenvolver uma aplicação para que professores e pais de alunos possam compartilhar informações sobre os alunos de forma eficiente e prática.

## Requisitos para rodar o projeto

Antes de rodar o projeto, certifique-se de ter os seguintes requisitos instalados:

- PHP 8.2 ou superior
- Composer
- MySQL 8 ou superior

## Como rodar o projeto

Siga os passos abaixo para rodar o projeto localmente:

1. **Clone o repositório**:

    ```bash
    git clone https://github.com/SEU-USUARIO/CPP.git
    ```

2. **Acesse o diretório do projeto**:

    ```bash
    cd CPP
    ```

3. **Instale as dependências do Composer**:

    ```bash
    composer install
    ```

4. **Crie e configure o arquivo `.env`** a partir do arquivo `.env.example`:

    ```bash
    cp .env.example .env
    ```

5. **Gere a chave da aplicação**:

    ```bash
    php artisan key:generate
    ```

6. **Configure o banco de dados** no arquivo `.env` (insira suas credenciais do MySQL).

7. **Execute as migrações** para configurar o banco de dados:

    ```bash
    php artisan migrate
    ```

8. **Popule o banco de dados com dados de exemplo (Seeder)**:

    Caso deseje popular o banco de dados com dados de exemplo, execute o seguinte comando:

    ```bash
    php artisan db:seed
    ```

    Isso irá rodar o `DatabaseSeeder` e criar um usuário de teste com as informações padrão. O seeder está configurado para criar um usuário com os seguintes dados:

    - **Nome**: Test User
    - **Email**: test@example.com
    - **Senha**: `123456789`

    Caso queira adicionar mais usuários ou personalizar os dados gerados, edite o arquivo `database/seeders/DatabaseSeeder.php`.

9. **Inicie o servidor de desenvolvimento**:

    ```bash
    php artisan serve
    ```

    O aplicativo estará disponível em [http://localhost:8000](http://localhost:8000).

## Desenvolvedores

- [Ronald](https://github.com/Ronald27Dev)
- [Lucas](https://github.com/lmoliiveira)
- [Pedro](https://github.com/pedroazevedoc)
- [Matheus](https://github.com/MatheusRamosSilver)

## License

Este projeto utiliza o [Laravel framework](https://laravel.com/), que é um software open-source licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
