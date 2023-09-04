@extends("sections.layout")
@include("sections.aside")
@section("content")
	<title>Pedidos</title>
</head>
<body>
	@yield("aside")
	<div class="container">
		<div class="wrapper lista_produtos">
			<div class="row">
				<h1>Pedidos</h1>
			</div>
			<div class="row">
				<input type="text" id="search" class="form-input" placeholder="Buscar por data" style="width:100%;">
			</div>
				<hr style="width:50%; border:1px solid var(--border);" />
			<div class="row order_list">
				@if($orders->count() > 0)
					@foreach($orders as $item)
						<div class="row" style="flex-flow:row nowrap;padding-top: 0px;align-items: stretch;">
							<div class="row order">
								<sub class="w-100 text-primary">#{{$item->id}}: <i title="Recibo" style="cursor: pointer;" class="bi bi-sticky"></i></sub>
								<h4 title="Data">{{ \App\Models\Order::brazilianTime($item->created_at) }}</h4>
								<h3 class="w-100 text-accent" title="Total">R${{number_format(($item->total / 100),2, ",","")}} ({{$item->payment}})</h3>
							</div>
							<div class="row products" style="flex-flow:row wrap;">
								<h3 class="row-user">
									<i class="bi bi-person-fill"></i> <span> {{$item->user}}</span>
								</h3>
							@foreach($item->products as $prod)
								<div class="order-product">
									<span>{{$prod->product}}</span> <span>R${{number_format(($prod->price / 100),2, ",","")}}</span>
								</div>
							@endforeach
							</div>
						</div>
					@endforeach
				@else
						<h2 class="w-100 justify-center text-accent" style="font-size: 3rem;margin: 10px;"><i class="bi bi-basket3"></i></h2>
						<h3 class="w-100 justify-center">Nenhum Pedido fechado ainda!</h3>
				@endif
			</div>
		</div>
		@if($errors->any())
		@foreach($errors->all() as $error)
			<strong><sub class="text-error half">{{$error}}</sub></strong>
		@endforeach
		@endif
	</div>
</body>
@endsection