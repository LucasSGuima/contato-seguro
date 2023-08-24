### Documentação da API

A aplicação possui uma mini documentação na rota web default. Ela está disponível temporariamente em https://contato-seguro.lucassilvaguimaraes.com.br/. Vale apena consultar, temos um passo a passo para instalação e uso! E também temos um video online no youtube: (video)

### Desafio | Backend

O desafio consiste em usar a base de dados em SQLite disponibilizada e criar uma **rota de uma API REST** que **liste e filtre** todos os dados. Serão 10 registros sobre os quais precisamos que seja criado um filtro utilizando parâmetros na url (ex: `/registros?deleted=0&type=sugestao`) e retorne todos resultados filtrados em formato JSON.

Você é livre para escolher o framework que desejar, ou não utilizar nenhum. O importante é que possamos buscar todos os dados acessando a rota `/registros` da API e filtrar utilizando os parâmetros `deleted` e `type`.

* deleted: Um filtro de tipo `boolean`. Ou seja, quando filtrado por `0` (false) deve retornar todos os registros que **não** foram marcados como removidos, quando filtrado por `1` (true) deve retornar todos os registros que foram marcados como removidos.
* type: Categoria dos registros. Serão 3 categorias, `denuncia`, `sugestao` e `duvida`. Quando filtrado por um `type` (ex: `denuncia`), deve retornar somente os registros daquela categoria.

O código deve ser implementado no diretorio /source. O bando de dados em formato SQLite estão localizados em /data/db.sq3.

Caso tenha alguma dificuldade em configurar seu ambiente e utilizar o SQLite, vamos disponibilizar os dados em formato array. Atenção: dê preferência à utilização do banco SQLite.

Caso você já tenha alguma experiência com Docker ou queira se aventurar, inserimos um `docker-compose.yml` configurado para rodar o ambiente (utilizando a porta 8000).

Caso ache a tarefa muito simples e queira implementar algo a mais, será muito bem visto. Nossa sugestão é implementar novos filtros (ex: `order_by`, `limit`, `offset`), outros métodos REST (`GET/{id}`, `POST`, `DELETE`, `PUT`, `PATCH`), testes unitários etc. Só pedimos que, caso faça algo do tipo, nos explique na _Resposta do participante_ abaixo.

# Resposta do participante

Assista o video de apresentação da API
### VIDEO: (video)

Acesse a documentação online da API
### Documentação Online: (doc)

Olá pessoal da Contato Seguro,

Gostaria de apresentar a minha solução para o desafio proposto. Diante das opções de frameworks PHP disponíveis para a criação da API, optei pelo Laravel devido à sua popularidade e à diversidade de ferramentas que oferece para construir APIs de qualidade.

Minha solução segue uma série de etapas bem estruturadas, com verificações cuidadosas para lidar com exceções. Começando pelo arquivo Handler.php, configurei-o para tratar exceções 404, garantindo que sempre seja retornado um JSON com a mensagem "Record not found". Isso evita retornos em HTML e outras respostas indesejadas.

Além disso, implementei o middleware EnvironmentCheckMiddleware.php para prevenir erros de conexão com o banco de dados. Dessa forma, em caso de falha na conexão, o middleware responde com um JSON contendo o código 500 e a mensagem "Erro ao conectar-se ao banco de dados".

No que diz respeito às rotas, criei todas as operações RESTful (GET, POST, PATCH, PUT e DELETE) no arquivo de rotas, redirecionando cada uma para os respectivos métodos no RecordController.php. Nesse controlador, implementei as verificações de dados passados nas requisições e atendi aos requisitos essenciais e opcionais do desafio.

Fiz questão de seguir a estrutura do framework e, como parte da solução, criei 16 testes unitários abrangendo as principais funcionalidades do projeto.

Enfrentei uma dificuldade relacionada ao autoincremento no banco de dados SQLite, que não estava funcionando conforme o esperado. Por conta disso, optei por implementar manualmente a funcionalidade de autoincremento na coluna "id". Essa abordagem permitiu que eu utilizasse o Eloquent do Laravel de maneira mais eficiente e limpa.

O projeto está completo e detalhado, e para uma compreensão mais abrangente, gravei um vídeo demonstrando o projeto em ação. Convido vocês a assistirem o vídeo (video), pois acredito que ajudará a visualizar melhor a estrutura e os detalhes do projeto. E também a consultar a nossa documentação online: (doc)

A dedicação a esse projeto é de extrema importância para mim, pois vejo nele uma oportunidade valiosa que representa muito sobre meu futuro pessoal e profissional. Estou comprometido ao máximo em entregá-lo da melhor forma possível, considerando todas as nuances envolvidas.

Agradeço pela consideração e estou à disposição para quaisquer esclarecimentos.

### Métodos para consulta com filtros

| Método | Url               | Rota        | Descrição                                                  |
| :----- | :----------       | :---------  | :----------------------------------                        |
| GET    | `localhost/api/`  | `registros` | Responsável por receber todas as informações sem filtro.   |

| Método | Url               | Rota                                                            | Descrição                                                           |
| :----- | :----------       | :---------                                                      | :----------------------------------                                 |
| GET    | `localhost/api/`  | `registros?deleted=0&type=duvida&order_by=id&offset=0&limit=10` | Responsável por receber as informações com todos filtro declarados. |

| Método | Url               | Rota                  | Descrição                                                     |
| :----- | :----------       | :---------            | :----------------------------------                           |
| GET    | `localhost/api/`  | `registros?deleted=1` | Responsável por receber as informações com filtro deleted.    |

| Método | Url               | Rota                      | Descrição                                                 |
| :----- | :----------       | :---------                | :----------------------------------                       |
| GET    | `localhost/api/`  | `registros?type=sugestao` | Responsável por receber as informações com filtro type.   |

| Método | Url               | Rota                       | Descrição                                                     |
| :----- | :----------       | :---------                 | :----------------------------------                           |
| GET    | `localhost/api/`  | `registros?order_by=type`  | Responsável por receber as informações com filtro order_by.   |

| Método | Url               | Rota                | Descrição                                                  |
| :----- | :----------       | :---------          | :----------------------------------                        |
| GET    | `localhost/api/`  | `registros?limit=3` | Responsável por receber as informações com filtro limit.   |

| Método | Url               | Rota                          | Descrição                                                           |
| :----- | :----------       | :---------                    | :----------------------------------                                 |
| GET    | `localhost/api/`  | `registros?limit=1&offset=10` | Responsável por receber as informações com filtro limit e offset.   |

### Métodos CRUD

| Método | Url               | Rota                 | Descrição                                                     |
| :----- | :----------       | :---------           | :----------------------------------                           |
| GET    | `localhost/api/`  | `/registros/{id}`    | Responsável por receber as informações de um unico elemento.  |

| Método | Url               | Rota                 | Descrição                                                     |
| :----- | :----------       | :---------           | :----------------------------------                           |
| POST   | `localhost/api/`  | `/registros`         | Responsável por gravar as informações de um elemento.         |

#### Exemplo de corpo
```http
    {
        "type": "duvida",
        "message": "Teste POST",
        "is_identified": 0,
        "whistleblower_name": null,
        "whistleblower_birth": null,
        "created_at": "2021-06-30 18:47:23",
        "deleted": 1
    }
```

| Método | Url               | Rota                 | Descrição                                                                 |
| :----- | :----------       | :---------           | :----------------------------------                                       |
| PATCH  | `localhost/api/`  | `/registros/{id}`    | Responsável por atualizar parcialmente as informações de um elemento.     |

#### Exemplo de corpo
```http
    {
        "message": "Teste PATCH"
    }
```

| Método | Url               | Rota                 | Descrição                                                     |
| :----- | :----------       | :---------           | :----------------------------------                           |
| PUT    | `localhost/api/`  | `/registros/{id}`    | Responsável por atualizar as informações de um elemento.      |

#### Exemplo de corpo
```http
    {
        "type": "duvida",
        "message": "Teste PUT",
        "is_identified": 0,
        "whistleblower_name": null,
        "whistleblower_birth": null,
        "created_at": "2021-06-30 18:47:23",
        "deleted": 1
    }
```

| Método | Url               | Rota                 | Descrição                                                     |
| :----- | :----------       | :---------           | :----------------------------------                           |
| DELETE | `localhost/api/`  | `/registros/{id}`    | Responsável por deletar as informações de um  elemento.       |

## Etiquetas

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)


## Autores

- [@LucasSGuima](https://www.github.com/LucasSGuima)
