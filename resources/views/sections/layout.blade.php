@php		
	$id = auth()?->user()?->company_id;		
	$company = \App\Models\Configuration::asObject($id);		
	$barColor = \App\Models\Configuration::sideTextColor($company->secondary);
@endphp		
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- Fonts -->
	    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

	    <!-- Styles -->
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	    <link rel="stylesheet" type="text/css" href="{{Vite::asset('resources/css/app.css')}}">
	    <style type="text/css">
	    	@switch($company->theme)
	    		@case("system")
			    	@media (prefers-color-scheme: dark) {
					    :root{
					        --primary-background:#1c1c1c;
					        --input-background:#1c1c1c;
					        --secondary-background:#242424;
					        --border:#191919;
					        --danger-color:#b93c3c;
					        {{ "--primary:".$company->primary.";"; }}
							{{ "--secondary:".$company->secondary.";"; }}
							{{ "--accent:".$company->accent.";"; }}
					    }
					}
					@media (prefers-color-scheme: light) {
					    :root{
					        --primary-background:#f3f2ef;
					        --input-background:#f3f2ef;
					        --secondary-background:#ffffff;
					        --border: #e3e2e0;
					        --danger-color:#b93c3c;
					        {{ "--primary:".$company->primary.";"; }}
							{{ "--secondary:".$company->secondary.";"; }}
							{{ "--accent:".$company->accent.";"; }}
					    }
					}
				@break
				@case("light")
					:root{
					    --primary-background:#f3f2ef;
					    --input-background:#f3f2ef;
					    --secondary-background:#ffffff;
					    --border: #e3e2e0;
					    --danger-color:#b93c3c;
					   {{ "--primary:".$company->primary.";"; }}
						{{ "--secondary:".$company->secondary.";"; }}
						{{ "--accent:".$company->accent.";"; }}
					}
				@break
				@case("dark")
					:root{
					    --primary-background:#1c1c1c;
					    --input-background:#1c1c1c;
					    --secondary-background:#242424;
					    --border:#191919;
					    --danger-color:#b93c3c;
			    		{{ "--primary:".$company->primary.";"; }}
						{{ "--secondary:".$company->secondary.";"; }}
						{{ "--accent:".$company->accent.";"; }}
					}
			@endswitch
			.menu_item{
				color:{{$barColor}};
			}
	    </style>
	    <script type="text/javascript" src="{{Vite::asset('resources/js/app.js')}}"></script>
	    @auth
	    <script>
	    	window.user = "{{ auth()->user()->name }}"
	    	window.usr = "{{ base64_encode(json_encode(auth()->user())) }}"
	    </script>
	    @endauth
	    <style>
	        body {
	            font-family: 'Nunito', sans-serif;
	        }
	    </style>
	    <script type="text/javascript">
	    	window.sideTextColor = hex => {
			    let shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
			    hex = hex.replace(shorthandRegex, (m, r, g, b) => {
			        return r + r + g + g + b + b;
			    });
			    let rgb = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
			    rgb = (rgb ? { r: parseInt(rgb[1], 16), g: parseInt(rgb[2], 16), b: parseInt(rgb[3], 16) } : { r: 0, g: 0, b: 0 });
			    return '#' + (Math.round(((parseInt(rgb.r) * 299) + (parseInt(rgb.g) * 587) + (parseInt(rgb.b) * 114)) /1000) > 150 ? "555" : "FFF" );
			}
	    </script>
	@yield('content')
</html>