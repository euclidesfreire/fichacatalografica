Ficha Catalográfica 
=======================

Introdução
------------
Esse é o Repositório do Sistema para Criar e Gerenciar Fichas Catalográficas para o Sistema de Bibliotecas da Universidade Estadual do Maranhão. 

*PROJETO EM DESENVOLVIMENTO


Tecnologias utilizadas:
-----------------------
Backend:
--------
 * PHP 7.1.3+
 * Laravel Framework 5.8.*
 * R&OS PHP Pdf 

Frontend:
---------
 * AdminLTE


Instalação
------------

Usando composer (recomendado)
----------------------------
Clone o repositório e manualmente execute o 'composer':

    cd (Caminho do Diretório em que desejas clonar)
    git clone https://github.com/euclidesfreire/fichacatalografica.git
    cd fichacatalografica
    composer self-update
    composer install

Os comandos acima baixam o código do sistema e instalam suas dependências. Agora é preciso configurar o sistema.

Você pode copiar o arquivo .env.example e criar um novo chamado .env, nesse arquivo ficarão as configurações do banco de dados e demais configurações do sistema.

    cp .env.example .env

Abra o arquivo .env e configure-o de acordo com as informações do seu servidor.

Agora execute o comando abaixo parar criar uma chave para a aplicação:

    php artisan key:generate

Nosso último passo é executar os comandos para criar a base de dados do sistema. Você precisa primeiro criar um banco de dados e configurar os dados no arquivo .env, e então depois execute o comando:

    php artisan migrate

Laravel
------------

O sistema foi desenvolvido utilizando o framework Laravel 5.8. Caso tenha alguma dúvida na configuração, instalação de dependências, ou para entender o funcionamento do framework, você pode utilizar a documentação no site oficial do Laravel.

[https://laravel.com/docs/5.8](https://laravel.com/docs/5.8)