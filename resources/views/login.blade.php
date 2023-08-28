<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
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
</html>