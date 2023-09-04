@extends("sections.layout")
@section("content")
	<title>Register</title>
</head>
<body>
	<div class="container">
        <form method="POST" action="/registrar" class="wrapper justify-center">
			@csrf
			<h1 class="w-100 text-center" style="margin-bottom: 0px;">Registrar</h1>
			<div class="half ">
				<h3>Empresa</h3>
				<label class="w-100">Nome da empresa:</label>
				<input style="width:90%;" class="form-input text-center" type="text" name="comp_name" />
				<label class="w-100">CNPJ da empresa:</label>
			    <input style="width:90%;" class="form-input text-center" type="text" name="comp_document" />
			</div>
            <div class="half ">
				<h3>Usuario administrador</h3>
				<label class="w-100">Nome:</label>
			    <input style="width:90%;" class="form-input text-center" type="text" name="name" />
				<label class="w-100">Email:</label>
			    <input style="width:90%;" class="form-input text-center" type="text" name="email" />
				<label class="w-100">Senha:</label>
			    <input style="width:90%;" class="form-input text-center" type="password" name="senha" />
			</div>
    		<div class="row justify-center text-center ">
				@if($errors->any())
				@foreach($errors->all() as $error)
					<sub class="text-error half">{{$error}}</sub>
				@endforeach
				@endif
    		</div>
    		<span class="half justify-between">
				<input class="btn btn-accent" type="submit" value="Cadastrar" />
				<a class="text-accent" href="/login">Entrar</a>
    		</span>
		</form>
    </div>
</body>
@endsection