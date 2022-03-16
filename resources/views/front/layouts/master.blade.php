<!DOCTYPE html>
<html lang="en" class="bg-gray-100 overflow-x-hidden">
    <head>
        <meta charset="utf-8">
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="dns-prefetch" href="//use.fontawesome.com">
        <link rel="dns-prefetch" href="//www.googletagmanager.com">
        @include('partials.gtm-head')

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Ray</title>
        <meta name="description" content="@yield('description')">
        <link rel="canonical" href="{{ url()->current() }}"/>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c170d0c6e5.js" crossorigin="anonymous"></script>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @include('partials.favicon')

        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:creator" content="@spatie_be"/>
        <meta name="twitter:site" content="@spatie_be"/>
        <meta name="twitter:title" content="@yield('title')"/>
        <meta name="twitter:description"
        content="@yield('description')"/>
        <meta name="twitter:image" content="https://myray.app/images/social-card.png"/>

        <meta property="og:site_name" content="Ray">
        <meta property="og:locale" content="en_US">
        <meta property="og:url" content="{{ url()->current() }}"/>
        <meta property="og:type" content="product"/>
        <meta property="og:title" content="@yield('title')"/>
        <meta property="og:description"
            content="@yield('description')"/>
        <meta property="og:image" content="https://myray.app/images/social-card.png"/>


        @bukStyles()
        @bukScripts()

        
    </head>
    <body class="max-w-6xl mx-auto
    bg-white
    font-sans font-medium text-black">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        @include('partials.gtm-body')
        @production
            <!-- Twitter universal website tag code -->
            <script>
                !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
                },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
                    a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
                // Insert Twitter Pixel ID and Standard Event data below
                twq('init','o5ha5');
                twq('track','PageView');
            </script>
            <!-- End Twitter universal website tag code -->
        @endproduction

        <script  src=" {{ mix('js/app.js') }}" defer></script>
    </body>
</html>
