@extends("sections.layout")
@include("sections.aside")
@section("content")
	
	<title>Configurações</title>
</head>
<body>
	@yield("aside")
	<div class="container wrapper" style="flex-flow: column wrap;">
		<h1 class="half">Configurções</h1>
		<form method="POST" action="/configs" enctype="multipart/form-data">
			@method("POST")
			@csrf
			@if(isset($configs))
				<div class="row">
					<label class="half">Logotipo (50px x 50px):</label>
					<input type="file" name="logo" id="logo" style="display:none;">
					<label class="drop_area" for="logo">
						<img src="{{!empty($configs->logo) ? Storage::url($configs->logo) : '/logo.ico'}}" alt="Logo" />
					</label>
				</div>
				<div class="row">
					<label class="half">Cor do texto:</label>
					<input type="color" name="primary" id="primary" style="display:none;" value="{{$configs->primary}}" />
					<label class="color_label" style="background:{{$configs->primary}}" for="primary"> </label>
				</div>
				<div class="row">
					<label class="half">Cor do destaque:</label>
					<input type="color" name="accent" id="accent" style="display:none;" value="{{$configs->accent}}" />
					<label class="color_label" style="background:{{$configs->accent}}" for="accent"> </label>
				</div>
				<div class="row">
					<label class="half">Cor da barra flutuante:</label>
					<input type="color" name="secondary" id="secondary" style="display:none;" value="{{$configs->secondary}}" />
					<label class="color_label" style="background:{{$configs->secondary}}" for="secondary"> </label>
				</div>
				<div class="row">
					<label class="half">Tema:</label>
					<select name="theme" class="form-input">
						<option value="dark" {{ $configs->theme == "dark" ? "selected" : ""}} >Escuro</option>
						<option value="light" {{ $configs->theme == "light" ? "selected" : ""}}>Claro</option>
						<option value="system" {{ $configs->theme == "system" ? "selected" : ""}}>Sistema</option>
					</select>
				</div>
				<div class="row">
					<span></span>
					<button class="btn btn-accent" type="submit">Salvar</button>
				</div>
				 @vite(['resources/js/snackbar.js','resources/js/configs.js'])
			@endif
		</form>
		@if($errors->any())
		@foreach($errors->all() as $error)
			<strong class="text-error half">{{$error}}</strong>
		@endforeach
		@endif
		@if(isset($response))
		<script type="text/javascript"> snackBar({{$response}}, "SUCCESS");</script>
		@endif
	</div>
@endsection