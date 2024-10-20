# Desafio Dev

Projeto Realizado em Laravel, utilizando Docker e Mysql, também foi implementado testes unitários com PHPUnit
Este projeto visa registrar a integração de pagamentos via BOLETO, PIX, e cartão de crédito parcelado ou não, com a plataforma ASAAS, também registra as transações e armazena no banco e lista as últimas 100 realizadas.

<div style="border:1px solid #e00; padding: 10px; border-radius: 5px; background-color: #ffe6e6;">
  <strong>⚠️ ATENÇÃO:</strong> O arquivo <code>.env</code> está disponível neste projeto apenas para facilitar a reexecução. <strong>Não disponibilize este arquivo</strong> caso vá utilizar este projeto em produção.
</div>


## 🚀 COMO FAÇO PARA RODAR ESTE INCRÍVEL PROJETO EM MINHA MÁQUINA?

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento, análise ou teste.


### 📋 Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

```
Você precisa ter o docker instalado em sua máquina e operacional.
```

Caso não possúa o docker instalado, consulte a **[Doc do Docker](https://docs.docker.com/)** para saber como realizar este processo.

### 🔧 Instalação

Passo-a-passo para que você possa executar este projeto em sua máquina após ter o docker instalado.

Baixe este projeto no botão acima:

```
Clique no botão "Code" e defina a opção que deseja para clonar o projeto
```

Com o projeto aberto, e seu docker em execução, no terminal de controle ou no terminal do Visual Studio Code, na pasta do projeto, execute o comando abaixo:

```
docker-compose up -d
```


Após isso, caso o docker ja esteja em execuçção, acesse o projeto em

```
http://localhost:8080/pagamento
```

Para facilitar o teste, foi deixado um valor fictício de cartão de crédito no projeto.


## ⚙️ Testes com PHPUnit e Xdebug

Este projeto utiliza o [PHPUnit](https://phpunit.de/) para realizar testes automatizados.

Também é possível gerar teste de cobertura


### 🔩 Analise os testes de ponta a ponta

com o docker rodando, no terminal, acesse a pasta do projeto

```
docker exec -it laravel_app bash 
```

Após, execute o teste

```
php artisan test --coverage-html=storage/coverage
```



## 🛠️ Construído com

Este projeto foi desenvolvido utilizando diversas tecnologias e ferramentas que auxiliam na construção e manutenção de aplicações web modernas. Aqui estão as principais:

* [Laravel](https://laravel.com/docs) - Framework PHP utilizado para desenvolvimento do back-end da aplicação.
* [Docker](https://www.docker.com/) - Ferramenta de contêinerização usada para criar o ambiente de desenvolvimento isolado e padronizado.
* [MySQL](https://www.mysql.com/) - Sistema de gerenciamento de banco de dados relacional utilizado para armazenar dados.
* [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML) - Linguagem de marcação usada para estruturar o conteúdo do site.
* [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS) - Linguagem de estilo utilizada para definir a aparência visual do projeto.
* [jQuery](https://jquery.com/) - Biblioteca JavaScript usada para facilitar a manipulação de elementos DOM e realizar requisições AJAX.
* [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript) - Linguagem de programação utilizada para criar interatividade e lógica no front-end.
* [PHPUnit](https://phpunit.de/) - Ferramenta utilizada para escrever e executar testes unitários no projeto.
* [Xdebug](https://xdebug.org/docs) - Ferramenta de depuração e geração de relatórios de cobertura de código para PHP.

Essas ferramentas foram escolhidas por sua robustez, escalabilidade e facilidade de integração, proporcionando uma base sólida para o desenvolvimento deste projeto.

## 📌 Versão

Controle de versão com Git.

## ✒️ Autores


* **Thiago Horbach** - *Desenvolvedor* - [LinkedIn](https://www.linkedin.com/in/thiagohorbach)

---
⌨️ com ❤️ por [Thiago Horbach](https://www.linkedin.com/in/thiagohorbach) 😊

