<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Dev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .navbar-custom {
            background-color: #002cbe;
            color: white;
            height: 60px;
        }

        .navbar-brand {
            color: white;
            margin-left: 10px;
        }

        .logo-container img {
            max-width: 120px;
        }

        .footer-container {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: right;
            position: fixed;
            bottom: 0;
            right: 0;
            width: 100%;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #f8f9fa;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
            z-index: 1000;
            border-radius: 0;

        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-menu a {
            color: #000;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .dropdown-menu a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-custom d-flex justify-content-between align-items-center">
        <div>
            <span class="menu-toggle ms-3" style="cursor:pointer;"><i class="fas fa-bars"></i></span>
        </div>

        <div class="logo-container text-end me-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
    </nav>

     <div class="dropdown-menu">
        <a href="{{ url('/pagamento') }}">
            <i class="fas fa-credit-card"></i> Iniciar um pagamento
        </a>
        <a href="{{ url('/relatorio') }}">
            <i class="fas fa-file-invoice"></i> Relatório de Pagamentos
        </a>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="footer-container">
        Desenvolvido por Thiago Horbach
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
        $(document).ready(function() {
            $('.menu-toggle').on('click', function() {
                $('.dropdown-menu').toggleClass('show'); // Adiciona ou remove a classe que mostra o menu
            });

            // Fecha o menu se o usuário clicar fora dele
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.menu-toggle').length && !$(event.target).closest('.dropdown-menu').length) {
                    $('.dropdown-menu').removeClass('show'); // Remove a classe para ocultar o menu
                }
            });
        });
    </script>

</body>
</html>
