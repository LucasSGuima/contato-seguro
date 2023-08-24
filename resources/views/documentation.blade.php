<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Documentação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta19/dist/css/tabler.min.css">
</head>

<body>
    <script src="https://preview.tabler.io/dist/js/demo-theme.min.js"></script>

    <div class="page">
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    Documentação
                </h1>

                <div class="flex-row navbar-nav order-md-last">
                    <div class="d-none d-md-flex">
                        <a href="?theme=dark" class="px-0 nav-link hide-theme-dark" title="Dark Mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                            </svg>
                        </a>

                        <a href="?theme=light" class="px-0 nav-link hide-theme-light" title="Light Mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrapper">

            <div class="page-body">
                <div class="container-xl">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="space-y-4">

                                <div>
                                    <h2 class="mb-3">1. Introdução</h2>

                                    <div id="faq-1" class="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-item">
                                            <div class="accordion-header" role="tab">
                                                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq-1-1">Entendendo o Desafio!</button>
                                            </div>

                                            <div id="faq-1-1" class="accordion-collapse collapse show" role="tabpanel" data-bs-parent="#faq-1">
                                                <div class="pt-0 accordion-body">
                                                    <div>
                                                        <p>
                                                            O desafio consiste em usar a base de dados em SQLite disponibilizada e criar uma rota de uma API REST que liste e filtre todos os dados.
                                                        </p>
                                                        <p>
                                                            Olá me chamo Lucas, e desenvolvi esse desafio solicitado pela Contato Seguro, segue uma mini documentação da aplicação. Ahh, você também pode deixar a página no <a href="?theme=dark">MODO ESCURO</a> ou
                                                            <a href="?theme=light">MODO CLARO</a>
                                                        </p>
                                                        <p>
                                                            Ah!! Importante dizer, deixei a API online temporariamente em meu website, esta em <a href="https://contato-seguro.lucassilvaguimaraes.com.br">https://contato-seguro.lucassilvaguimaraes.com.br/</a>, caso venha a testar por ela apenas troque localhost/api/ por https://contato-seguro.lucassilvaguimaraes.com.br/api/.
                                                        </p>
                                                        <p>
                                                            Em caso de correção ou contato, sinta-se avontade para entrar em contato comigo atraves do <a target="_blank" href="https://linkedin.com/in/lucas-guimarães-dev">Linked In - Lucas Guimarães</a> recebi esse desafio atraves da <a target="_blank" href="https://www.linkedin.com/in/camilacorreacasanova/">Camila Corrêa Casanova</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-item">
                                            <div class="accordion-header" role="tab">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-1-2">Resumo do Desafio!</button>
                                            </div>

                                            <div id="faq-1-2" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-1">
                                                <div class="pt-0 accordion-body">
                                                    <div>
                                                        <h2>
                                                            <strong># Desafio | Backend</strong>
                                                        </h2>

                                                        <p>
                                                            O desafio consiste em usar a base de dados em SQLite disponibilizada e criar uma <strong>rota de uma API REST</strong> que <strong>liste e filtre</strong> todos os dados. Serão 10 registros sobre os quais precisamos que seja criado um filtro utilizando parâmetros na url (ex: `/registros?deleted=0&type=sugestao`) e retorne todos resultados filtrados em formato JSON.
                                                        </p>

                                                        <p>
                                                            Você é livre para escolher o framework que desejar, ou não utilizar nenhum. O importante é que possamos buscar todos os dados acessando a rota `/registros` da API e filtrar utilizando os parâmetros `deleted` e `type`.
                                                        </p>

                                                        <p>
                                                            * deleted: Um filtro de tipo `boolean`. Ou seja, quando filtrado por `0` (false) deve retornar todos os registros que <strong>não</strong> foram marcados como removidos, quando filtrado por `1` (true) deve retornar todos os registros que foram marcados como removidos.
                                                            * type: Categoria dos registros. Serão 3 categorias, `denuncia`, `sugestao` e `duvida`. Quando filtrado por um `type` (ex: `denuncia`), deve retornar somente os registros daquela categoria.
                                                        </p>

                                                        <p>
                                                            O código deve ser implementado no diretorio /source. O bando de dados em formato SQLite estão localizados em /data/db.sq3.
                                                        </p>

                                                        <p>
                                                            Caso tenha alguma dificuldade em configurar seu ambiente e utilizar o SQLite, vamos disponibilizar os dados em formato array. Atenção: dê preferência à utilização do banco SQLite.
                                                        </p>

                                                        <p>
                                                            Caso você já tenha alguma experiência com Docker ou queira se aventurar, inserimos um `docker-compose.yml` configurado para rodar o ambiente (utilizando a porta 8000).
                                                        </p>

                                                        <p>
                                                            Caso ache a tarefa muito simples e queira implementar algo a mais, será muito bem visto. Nossa sugestão é implementar novos filtros (ex: `order_by`, `limit`, `offset`), outros métodos REST (`GET/{id}`, `POST`, `DELETE`, `PUT`, `PATCH`), testes unitários etc. Só pedimos que, caso faça algo do tipo, nos explique na _Resposta do participante_ abaixo.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h2 class="mb-3">2. Instalação</h2>

                                    <div id="faq-2" class="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-item">
                                            <div class="accordion-header" role="tab">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-2-1">Passo a Passo - Clonar e Configurar API Laravel</button>
                                            </div>

                                            <div id="faq-2-1" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-2">
                                                <div class="pt-0 accordion-body">
                                                    <div>
                                                        <style>
                                                            ol {
                                                                font-size: 1rem;
                                                                font-weight: bold;
                                                            }
                                                        </style>
                                                        <ol>
                                                            <li>Abra um terminal no seu computador.</li>
                                                            <li>Navegue até o diretório onde deseja clonar o repositório da API. Por exemplo:</li>
                                                        </ol>

                                                        <pre>cd projetos</pre>

                                                        <ol start="3">
                                                            <li>Clone o repositório da sua API usando o comando git clone:</li>
                                                        </ol>

                                                        <pre>git clone https://github.com/LucasSGuima/contato-seguro.git</pre>

                                                        <ol start="4">
                                                            <li>Após o clone ser concluído, entre na pasta do projeto:</li>
                                                        </ol>

                                                        <pre>cd contato-seguro</pre>

                                                        <ol start="5">
                                                            <li>Instale as dependências do Laravel utilizando o Composer. Certifique-se de ter o Composer instalado em seu sistema:</li>
                                                        </ol>

                                                        <pre>composer install</pre>

                                                        <ol start="6">
                                                            <li>Copie o arquivo de exemplo .env.example para .env:</li>
                                                        </ol>

                                                        <pre>cp .env.example .env</pre>

                                                        <ol start="7">
                                                            <li>Gere uma chave de criptografia para sua aplicação Laravel:</li>
                                                        </ol>

                                                        <pre>php artisan key:generate</pre>

                                                        <ol start="8">
                                                            <li>Abra o arquivo .env em um editor de texto e atualize as seguintes configurações:</li>
                                                        </ol>

                                                        <div>
                                                            <p>
                                                                Configurações do banco de dados:
                                                            </p>

                                                            <pre>DB_CONNECTION=sqlite<br>DB_DATABASE=/var/www/html/database/db.sq3 (Caminho Absoluto)</pre>

                                                            <p>
                                                                Certifique-se de substituir o Caminho Absoluto, para a configuração correta do seu banco de dados.
                                                            </p>
                                                        </div>

                                                        <ol start="9">
                                                            <li>Inicie o Laravel Sail:</li>
                                                        </ol>

                                                        <pre>./vendor/bin/sail up</pre>

                                                        <ol start="10">
                                                            <li>Após o Laravel Sail estar em execução, você pode acessar sua API em http://localhost.</li>
                                                        </ol>

                                                        <p>Certifique-se de ter o Docker instalado em seu sistema para que o Laravel Sail funcione corretamente.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h2 class="mb-3">3. Testando a API</h2>

                                    <div id="faq-3" class="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-item">
                                            <div class="accordion-header" role="tab">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-3-1">Testes Unitário</button>
                                            </div>

                                            <div id="faq-3-1" class="accordion-collapse collapse" role="tabpanel" data-bs-parent="#faq-3">
                                                <div class="pt-0 accordion-body">
                                                    <p>
                                                        Os testes unitários, são usados para verificar o comportamento de uma aplicação em um nível mais alto. Eles testam uma funcionalidade completa da perspectiva do usuário, simulando as interações com a aplicação como um todo. Esses testes são úteis para garantir que diferentes partes da aplicação estejam funcionando corretamente em conjunto.
                                                    </p>

                                                    <h2>
                                                        Passo a Passo para Executar os Testes do Laravel:
                                                    </h2>

                                                    <ol>
                                                        <li>Abra um terminal no seu sistema.</li>
                                                        <li>Navegue até o diretório do projeto Laravel onde os testes estão localizados.</li>
                                                        <li>Execute o seguinte comando para executar todos os testes do Laravel:</li>
                                                    </ol>

                                                    <pre>php artisan test</pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta19/dist/js/tabler.min.js"></script>
</body>

</html>
