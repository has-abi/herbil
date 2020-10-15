<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:locale" content="ar_AR" />
    <meta property="og:type" content="@yield('content','website')" />
    <meta property="og:site_name" content="جماعة حربيل تامنصورت" />
    <meta property="fb:app_id" content="" />
    @yield('extra_metadata')

    <meta name="description" content="@yield('description',' جماعة حربيل تامنصورت, tamansourt')" />
    <meta name="keywords" content="@yield('keywords','جماعة حربيل تامنصورت, tamansourt')" />
    <title>@yield("title","جماعة حربيل تامنصورت")</title>
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
            background: #fffaf7;
        }
    </style>
</head>
<body>

@yield("template")
@yield("custum_scripts")
<script>

    $('#search-start').click(function (){
        $('.search-container').removeClass('d-none');
    });
    $('#search-close').click(function (){
        $('.search-container').addClass('d-none');
    })
    $(".navbar-toggler").click(function() {
        $(".mobile").removeClass('d-none').slideToggle(1000);
    })
    $(".close span").click(function() {
        $(".mobile").slideUp(1000).addClass('d-none');

    })
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f7e6fd8b10f938c"></script>
</body>
</html>
