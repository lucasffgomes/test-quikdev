# Filmes Populares do Momento
Este repositório contém um pequeno sistema web que faz uma requisição à uma API do https://www.themoviedb.org/ trazendo uma lista dos filmes mais populares
do momento. Com algumas opções disponíveis na tela, pode-se ordenar alfabeticamente por título do filme, ou selecionar filmes
a serem mostrados de acordo com o gênero.
Podendo ainda, ao clicar no botão `Saiba mais` de um filme, será aberta uma nova página contendo mais informações a cerca do mesmo.

## Linguagens e tecnologias usadas
- PHP 7.X
- Jquery 3.6.X
- Bootstrap 5.0
- Font Family (Google Fonts)

## Informações da API
Foi utilizado a API The Movie DataBases em sua versão 3 retornando objetos JSON para serem manipulados no Back-End e serem mostrados no Front-End.

## Instalação e Utilização do Projeto
Para instalar esse repositório localmente, deve-se utilizar um servidor Apache com PHP 7 ou superior.

## Atenção!
Deve-se criar uma conta em https://www.themoviedb.org/, aceitar os termos e gerar uma chave válida para realizar as requisições.
Ao gerar a chave em seu perfil, abra o arquivo `api_key.php`, que se encontra na raiz do projeto, e cole a chave dentro das aspas da variável `$APIKey`.

Ao executar o projeto terá uma página com a lista de filmes retornadas com os filmes populares.
Críticas, comentários e sugestões por favor envie um e-mail para lucasffgomes@hotmail.com
