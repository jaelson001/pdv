<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <aside class="side_menu">
            <a class="menu_item" href="{{url('/')}}"><i class="bi bi-house"></i></a>
            <a class="menu_item" href="{{url('/produtos')}}"><i class="bi bi-box"></i></a>
            <a class="menu_item" href="#"><i class="bi bi-bar-chart"></i></a>
            <a class="menu_item" href="#"><i class="bi bi-gear"></i></a>
            @auth
            <a class="menu_item" href="{{ url('/sair') }}" >
                <i class="bi bi-box-arrow-left"></i>
            </a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                <i class="bi bi-person"></i>
            </a>
            @endauth
        </aside>
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <input type="number" id="search" class="form-input text-center" placeholder="Buscar (F)" style="width:100%; pointer-events: none;">
                </div>
                <div class="row form-input" style="height:150px;overflow: hidden;overflow-y:auto; align-items: flex-start;">
                    <table width="100%">
                        <thead>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>123</td>
                                <td>Teste</td>
                                <td>Teste de produto</td>
                                <td>1500</td>
                                <td>R$15,00</td>
                                <td class="text-danger"><i class="bi bi-x-lg"></i></td>
                            </tr>
                            <tr>
                                <td>123</td>
                                <td>Teste</td>
                                <td>Teste de produto</td>
                                <td>1500</td>
                                <td>R$15,00</td>
                                <td class="text-danger"><i class="bi bi-x-lg"></i></td>
                            </tr>
                            <tr>
                                <td>123</td>
                                <td>Teste</td>
                                <td>Teste de produto</td>
                                <td>1500</td>
                                <td>R$15,00</td>
                                <td class="text-danger"><i class="bi bi-x-lg"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h3>Ultimo</h3>
                <div class="row">
                    <table width="100%">
                        <thead>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>123</td>
                                <td>Teste</td>
                                <td>Teste do produto</td>
                                <td>R$15,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row wrap">
                    <h1>Total: R$45,00</h1>
                    <ul>
                        <li>Débito</li>
                        <li>Crédito</li>
                        <li>PIX</li>
                        <li>Dinheiro</li>
                    </ul>
                    <button class="btn btn-secondary">Limpar todos</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.addEventListener("keydown",function(event){
                if(event.key == "q" || event.key == "Q"){
                    event.preventDefault();
                  document.querySelector('#qtd').focus();
                }else if(event.key == "f" || event.key == "f"){
                    event.preventDefault();
                  document.querySelector('#search').focus();
                }
            });
        </script>
    </body>
</html>
