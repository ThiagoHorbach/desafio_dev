# Desafio Dev

Projeto Realizado em Laravel, utilizando Docker e Mysql, também foi implementado testes unitários com PHPUnit
Este projeto visa registrar a integração de pagamentos via BOLETO, PIX, e cartão de crédito parcelado ou não, com a plataforma ASAAS, também registra as transações e armazena no banco e lista as últimas 100 realizadas.

<div style="border:1px solid #e00; padding: 10px; border-radius: 5px; background-color: #ffe6e6;">
  <strong>⚠️ ATENÇÃO:</strong> O arquivo <code>.env</code> está disponível neste projeto apenas para facilitar a reexecução. <strong>Não disponibilize este arquivo</strong> caso vá utilizar este projeto em produção.
</div>


## 🚀 Começando

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


* **Thiago Horbach** - *Desenvolvedor* - [Thiago Horbach](https://github.com/ThiagoHorbach)

---
⌨️ com ❤️ por [Thiago Hrobach](https://github.com/ThiagoHorbach) 😊


















<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
