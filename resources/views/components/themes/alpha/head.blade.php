<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="{{ @$attributes['data']['pageTitle'] }}" />
    <meta property="og:image" content="{{ @$attributes['data']['pageImage'] }}" />
    <meta property="og:description" content="{{ @$attributes['data']['pageInfo'] }}" />
    <meta property="og:type" content="{{ @$attributes['data']['pageType'] }}" />
    <meta property="og:locale" content="en_GB" />

    <meta content="{{ @$attributes['data']['meta_description'] }}" name="description" />
    <meta content="{{ @$attributes['data']['meta_keywords'] }}" name="keywords" />
    <meta content="{{ @$attributes['data']['meta_author'] }}" name="author" />

    <link rel="stylesheet" href="{!! publicAsset('css/bundle.min.css') !!}">
    <link rel="stylesheet" href="{!! publicAsset('css/cubeportfolio.min.css') !!}">
    <link rel="stylesheet" href="{!! publicAsset('css/wow.css') !!}">
    <link rel="stylesheet" href="{!! publicAsset('css/owl.carousel.min.css') !!}">
    <link rel="stylesheet" href="{!! publicAsset('css/mediaelementplayer.min.css') !!}">
    <link rel="stylesheet" href="{!! publicAsset('css/line-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! publicAsset('css/settings.css') !!}">
{{--    <link rel="stylesheet" href="{!! publicAsset('css/slider.css') !!}">--}}
    <link rel="stylesheet" href="{!! publicAsset('css/style.css') !!}">
    <link rel="icon" href="{!! publicAsset('img/favicon.ico') !!}">
</head>
