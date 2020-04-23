<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME').' | '.@$attributes['data']['pageTitle'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ @$attributes['data']['pageInfo'] }}" name="description" />
    <meta content="{{ @$attributes['data']['meta_keywords'] }}" name="keywords" />
    <meta content="{{ @$attributes['data']['meta_author'] }}" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('plugin_css')
    <link href="{{ adminAsset('images/favicon.ico') }}" rel="shortcut icon">
    <link href="{{ adminAsset('libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />
    <link href="{{ adminAsset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ adminAsset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ adminAsset('css/unicons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ adminAsset('css/unicons-embedded.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ adminAsset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ adminAsset('css/CodeStyler.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ adminAsset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    @stack('custom_page_css')
</head>
