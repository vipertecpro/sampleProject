<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ @$attributes['data']['pageInfo'] }}" name="description" />
    <meta content="{{ @$attributes['data']['meta_keywords'] }}" name="keywords" />
    <meta content="{{ @$attributes['data']['meta_author'] }}" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME').' | '.@$attributes['data']['pageTitle'] }}</title>
    <link href="{{ publicAsset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ publicAsset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="{{ publicAsset('img/favicon.webp') }}"/>
</head>
