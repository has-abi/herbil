<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@yield('custum_meta')
    <title>@yield("title","Ville de Tamansourt")</title>
    @notifyCss
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap"
        rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
@yield("custum_styles")
<!--Scripts-->
    <script src="{{asset("js/app.js")}}"></script>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

</head>
<body>

@yield("template")

@yield("custum_scripts")
@notifyJs
</body>
</html>
