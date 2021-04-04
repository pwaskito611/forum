<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    @include('includes.style')
    
    @include('includes.js')
    @livewireScripts
</head>
<body class="bg-gray-100 min-h-screen m-0 flex flex-col"> 
    @include('includes.navbar')
    @yield('content')
    @include('includes.footer')
</body>
</html>