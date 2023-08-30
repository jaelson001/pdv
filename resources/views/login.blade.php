@extends("sections.layout")
@section("content")
	<title>Login</title>
</head>
<body>
	<div class="container">
        <div class="wrapper popup">
				<center><h1>Entrar</h1></center>
            <div class="row">
				<form method="POST" action="/autenticar">
				    @csrf
				    <input style="width:80%;" class="form-input text-center" type="text" name="email" />
				    <input style="width:80%;" class="form-input text-center" type="password" name="senha" />
            		<div class="row justify-center text-center ">
						@if($errors->any())
						@foreach($errors->all() as $error)
							<sub class="text-error half">{{$error}}</sub>
						@endforeach
						@endif
            		</div>
				    <input class="btn btn-accent" type="submit" name="Entrar" />
				</form>
			</div>
		</div>
	</div>
</body>
@endsection