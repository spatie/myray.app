<meta charset="utf-8">
<x-feed-links />
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

<script src="https://cdn.usefathom.com/script.js" data-site="AUCCHTBP" defer></script>
<script  src=" {{ mix('js/app.js') }}" defer></script>
