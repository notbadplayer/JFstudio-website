<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Strona poświęcona lokalnej społeczności muzycznej." />
        <meta name="author" content="Kamil Rogaczewski" />
        <title>JFstudio</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body id="page-top">

        {{ dd($articles) }}

        @include('layouts.navigation')
        @include('layouts.header')
        @include('layouts.content')
        @include('layouts.contact')
        @include('layouts.footer')

        <script src="{{ mix('js/template.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
