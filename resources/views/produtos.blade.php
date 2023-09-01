@extends("sections.layout")
@include("sections.aside")
@section("content")
	<title>Produtos</title>
    @if(!empty($products))
    <script type="text/javascript">
    	window.products = {{ Illuminate\Support\Js::from($products) }};
    </script>
    @endif
</head>
<body>
	@yield("aside")
	<form class="wrapper popup" id="popup_create" action="/product" method="POST" style="display: none;">
		@csrf
		@method("POST")
		<label class="justify-between">Nome:
			<input type="text" id="name" name="name" class="form-input" placeholder="nome">
		</label>
		<label class="justify-between">Còdigo de barras:
			<input type="text" id="code" name="code" class="form-input" placeholder="código de barras">
		</label>
		<label class="justify-between">Descrição:
			<input type="text" id="description" name="description" class="form-input" placeholder="descrição">
		</label>
		<label class="justify-between">Preço:
			<input type="number" id="price" name="price" class="form-input" placeholder="100 = R$1,00">
		</label>
		<label class="justify-between">Quantidade:
			<input type="number" id="quantity" name="quantity" class="form-input" placeholder="quantidade">
		</label>
		<div class="row">
			<button class="btn btn-error fechar_popup" id="cancelar">Cancelar</button>
			<button type="submit" class="btn btn-success" id="salvar_create">Salvar</button>
		</div>
	</form>
	<form class="wrapper popup" id="popup_update" action="/product" method="POST" style="display: none;">
		@csrf
		@method("PUT")
		<input type="hidden" name="id" id="update_id" class="form-input" value="">
		<label class="justify-between">Nome:
			<input type="text" name="name" id="update_name" class="form-input" placeholder="nome">
		</label>
		<label class="justify-between">Descrição:
			<input type="text" name="description" id="update_description" class="form-input" placeholder="descrição">
		</label>
		<label class="justify-between">Preço:
			<input type="number" name="price" id="update_price" class="form-input" placeholder="preço">
		</label>
		<label class="justify-between">Quantidade:
			<input type="number" name="quantity" id="update_quantity" class="form-input" placeholder="quantidade">
		</label>
		<div class="row">
			<button class="btn btn-error fechar_popup" id="cancelar">Cancelar</button>
			<button type="submit" class="btn btn-success" id="salvar_update">Salvar</button>
		</div>
	</form>
	<div class="container">
		<div class="wrapper lista_produtos">
			<div class="row">
				<h1>Produtos</h1>
				<button class="btn btn-success" id="cadastrar">Cadastrar</button>
			</div>
			<div class="row">
				<input type="text" id="search" class="form-input" placeholder="Buscar" style="width:100%;">
			</div>
				<hr style="width:50%; border:1px solid var(--border);" />
			<div class="row" style="max-height: 54vh;overflow: hidden;overflow-y: auto; padding:0px 10px;align-items: flex-start;">
				<table width="100%">
					<thead>
						<th>Código</th>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th style="text-align: center;">Ações</th>
					</thead>
					<tbody>
						@if(!empty($products))
						@foreach($products as $item)
						<tr data-name="{{$item->name}}">
							<td>{{$item->code}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->description}}</td>
							<td>{{$item->quantity}}</td>
							<td>{{"R$".number_format(($item->price / 100), 2, ",", "")}}</td>
							<td style="display:flex;justify-content: space-around;">
								<span class="editar" data-item="{{$item->id}}">
									<i class="bi bi-pencil-square"></i>
								</span>
								<span class="deletar text-danger" data-delete="{{$item->id}}">
									<i class="bi bi-x-lg" style="pointer-events: none;"></i>
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
		@if($errors->any())
		@foreach($errors->all() as $error)
			<strong><sub class="text-error half">{{$error}}</sub></strong>
		@endforeach
		@endif
	</div>
	@vite(['resources/js/snackbar.js','resources/js/products.js'])
</body>
@endsection