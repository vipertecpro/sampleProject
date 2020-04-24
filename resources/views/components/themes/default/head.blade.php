<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="{{ @$attributes['data']['meta_description'] }}" />
    <meta name="keywords" content="{{ @$attributes['data']['meta_keywords'] }}"/>
    <meta name="author" content="{{ @$attributes['data']['meta_author'] }}"/>
    <title>{{ @$attributes['data']['pageTitle'] }}</title>

    <link href="{{ publicAsset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ publicAsset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="{{ publicAsset('img/favicon.webp') }}"/>

</head>
