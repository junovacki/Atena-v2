## Sobre esse projeto

O presente projeto se refere a projeto final para o Curso de Analise e Desenvolvimento de Sistemas.

Link para o documento do projeto final: https://docs.google.com/document/d/1PV5Tqe90fB-h0PQobdzVAeQblOJIrU-Y/edit?usp=sharing&ouid=104974955870868486971&rtpof=true&sd=true

## Como funciona

Basicamente apos a manipulacao de dados gerais na base feitas pelo ADM e a manipulacao de dados das perguntas feitas pelo Professor, e possivel gerar provas pela visao do Coordenador e associar desempenho individual para que seja exibido a performance em varios quesitos.

## O que fazer para o projeto funcionar

Como informado no documento, ja existem login informados, os quais sao (usuario/nome):

adm/teste
professor/teste
coordenador/teste

Recomendo ja ter baixado e instalado os seguintes links:
https://getcomposer.org/download/
https://nodejs.org/en/download/
https://www.php.net/downloads.php (caso nao saiba como instalar sugiro o seguinte link: https://blog.schoolofnet.com/como-instalar-o-php-no-windows-do-jeito-certo-e-usar-o-servidor-embutido/)
https://dev.mysql.com/downloads/installer/

Deixar criado uma base de banco de dados e guarde o nome desse banco criado.

Baixar o projeto e abrir ele no seu editor de arquivos (VsCode,PHPStorm,...) e alterar as informacoes do arquivo .env.example 
na parte do banco de dados (colocar o login, senha, o nome da database nova criada) e depois alterar o nome do arquivo para 
apenas .env e removendo assim a parte do .example

Abrir o terminal (cmd, powershell, ...) e abrir a pasta que baixou o arquivo, e rodar os seguintes comandos (cada linha e um):

composer install <br>
npm install <br>
php artisan migrate <br>
npm run build <br>
php artisan serve <br>

e dar um crtl + click no link que aparecer (geralmente 127.0.0.1:8000)
