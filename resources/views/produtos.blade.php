<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produtos</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
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
	<div class="wrapper popup" style="display: none;">
		<input type="text" id="nome" class="form-input" placeholder="nome">
		<input type="text" id="descricao" class="form-input" placeholder="descrição">
		<input type="text" id="preco" class="form-input" placeholder="preço">
		<input type="number" id="quantidade" class="form-input" placeholder="quantidade">
		<div class="row">
			<button class="btn btn-error" id="cancelar">Cancelar</button>
			<button class="btn btn-success" id="cadastrar">Cadastrar</button>
		</div>
	</div>
	<div class="container">
		<div class="wrapper lista_produtos">
			<div class="row">
				<h1>Produtos</h1>
				<button class="btn btn-success">Cadastrar</button>
			</div>
			<div class="row">
				<input type="text" id="search" class="form-input" placeholder="Buscar" style="width:80%;">
				<button class="btn btn-success">Pesquisar</button>
			</div>
				<hr style="width:50%; border:1px solid var(--border);" />
			<div class="row">
				<table width="100%">
					<thead>
						<th>#</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Action</th>
					</thead>
					<tbody>
						@if(!empty($products))
						@foreach($products as $item)
						<tr>
							<td>{{$item->code}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->description}}</td>
							<td>{{$item->quantity}}</td>
							<td>{{"R$".number_format(($item->price / 100), 2, ",", "")}}</td>
							<td>
								<i class="bi bi-pencil-square"></i>
							</td>
						</tr>
						@endforeach
							</tbody>
						</table>
						@else
							</tbody>
						</table>
						<center><h3>Nenhum produto cadastrado!</h3></center>
						@endif
			</div>
		</div>
	</div>
</body>
</html>