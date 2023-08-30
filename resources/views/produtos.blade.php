@extends("sections.layout")
@section("content")
	<title>Produtos</title>
    @if(!empty($products))
    <script type="text/javascript">
    	window.products = {{ Illuminate\Support\Js::from($products) }};
    </script>
    @endif
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
	<div class="wrapper popup" id="popup" style="display: none;">
		<input type="hidden" id="id" class="form-input" value="">
		<label class="justify-between">Nome:
			<input type="text" id="name" class="form-input" placeholder="nome">
		</label>
		<label class="justify-between">Descrição:
			<input type="text" id="description" class="form-input" placeholder="descrição">
		</label>
		<label class="justify-between">Preço:
			<input type="number" id="price" class="form-input" placeholder="preço">
		</label>
		<label class="justify-between">Quantidade:
			<input type="number" id="quantity" class="form-input" placeholder="quantidade">
		</label>
		<div class="row">
			<button class="btn btn-error fechar_popup" id="cancelar">Cancelar</button>
			<button class="btn btn-success" id="salvar">Salvar</button>
		</div>
	</div>
	<div class="container">
		<div class="wrapper lista_produtos">
			<div class="row">
				<h1>Produtos</h1>
				<button class="btn btn-success" id="cadastrar">Cadastrar</button>
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
								<span class="editar" data-item="{{$item->id}}">
									<i class="bi bi-pencil-square"></i>
								</span>
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
	@vite(['resources/js/products.js'])
</body>
@endsection