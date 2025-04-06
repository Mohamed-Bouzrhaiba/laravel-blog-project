<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Blog | {{$title}}</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
</head>
<body>
        @include("partials.nav")
    <main>
        <div class="container">
            @include("partials.flashbags")
            {{$slot}}
        </div>
    </main>
</body>
</html>
