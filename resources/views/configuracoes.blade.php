@extends("sections.layout")
@include("sections.aside")
@section("content")
	@if(isset($configs))
		@php
			$c = [];
			foreach($configs as $item){ 
				$c[$item->key] = $item->value; 
			}
			$configs = json_decode(json_encode($c));
		@endphp
	@endif
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
					<label class="half">Cor do texto:</label>
					<input type="color" name="primary_color" id="primary_color" style="display:none;" value="{{$configs->primary_color}}" />
					<label class="color_label" style="background:{{$configs->primary_color}}" for="primary_color"> </label>
				</div>
				<div class="row">
					<label class="half">Cor do destaque:</label>
					<input type="color" name="accent_color" id="accent_color" style="display:none;" value="{{$configs->accent_color}}" />
					<label class="color_label" style="background:{{$configs->accent_color}}" for="accent_color"> </label>
				</div>
				<div class="row">
					<label class="half">Cor da barra flutuante:</label>
					<input type="color" name="accent_secondary" id="accent_secondary" style="display:none;" value="{{$configs->accent_secondary}}" />
					<label class="color_label" style="background:{{$configs->accent_secondary}}" for="accent_secondary"> </label>
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
					<label class="half">Logoipo (50px x 50px):</label>
					<input type="file" name="logo" id="logo" style="display:none;">
					<label class="drop_area" for="logo">
						<img src="{{!empty($configs->logo) ? Storage::url($configs->logo) : '/logo.ico'}}" alt="Logo" />
					</label>
				</div>
				<div class="row">
					<span></span>
					<button class="btn btn-accent" type="submit">Salvar</button>
				</div>
				 @vite(['resources/js/snackbar.js','resources/js/configs.js'])
			@endif
		</form>
		@if(isset($response))
		<script type="text/javascript"> snackBar({{$response}}, "SUCCESS");</script>
		@endif
	</div>
@endsection