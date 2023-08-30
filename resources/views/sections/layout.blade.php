<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Fonts -->
	    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

	    <!-- Styles -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	    @vite(['resources/css/app.css', 'resources/js/app.js'])
	    <script>
	    	window.user = "{{ auth()->user()->name }}"
	    </script>
	    <style>
	        body {
	            font-family: 'Nunito', sans-serif;
	        }
	    </style>
	@yield('content')
</html>