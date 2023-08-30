@extends("sections.layout")
@section("content")
        <title>PDV</title>
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
                @if($errors->any())
                    @foreach($errors->all() as $error)
                    <div class="row wrap justify-center">
                        <center><strong class="text-error half">{{$error}}</strong><center>
                    </div>
                    @endforeach
                @endif
                <div class="row">
                    <input type="text" id="search" class="form-input text-center" placeholder="Buscar (F)" style="width:100%; pointer-events: none;">
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
                        <tbody id="list">
                        </tbody>
                    </table>
                </div>
                <div class="row wrap">
                    <h1>Total: <span id="total">R$0,00</span></h1>
                    <ul>
                        <li class="btn btn-accent payment" data-payment="debito">Débito</li>
                        <li class="btn btn-accent payment" data-payment="credito">Crédito</li>
                        <li class="btn btn-accent payment" data-payment="pix">PIX</li>
                        <li class="btn btn-accent payment" data-payment="dinheiro">Dinheiro</li>
                    </ul>
                    <button class="btn btn-error clear">Limpar todos</button>
                </div>
            </div>
        </div>
        @vite(['resources/js/snackbar.js','resources/js/pdv.js'])
    </body>
@endsection