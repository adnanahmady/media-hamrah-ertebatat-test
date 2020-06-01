<!DOCTYPE html>
<html>
    <head>
    	<title>@yield('title') | {{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
         <div class="container">
	     @yield('content')
         </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
