<head>
    <meta charset="utf-8" />
    <title>{{ @$attributes['data']['page_title'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ @$attributes['data']['meta_description'] }}" name="description" />
    <meta content="{{ @$attributes['data']['meta_keywords'] }}" name="keywords" />
    <meta content="{{ @$attributes['data']['meta_author'] }}" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('plugin_css')
    <link href="{{ asset('admin/images/favicon.ico') }}" rel="shortcut icon">
    <link href="{{ asset('admin/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/unicons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/unicons-embedded.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
    @stack('custom_page_css')
</head>
