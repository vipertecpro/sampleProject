<head>
    <meta charset="utf-8" />
    <title>{{ @$data['page_title'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ @$data['meta_description'] }}" name="description" />
    <meta content="{{ @$data['meta_keywords'] }}" name="keywords" />
    <meta content="{{ @$data['meta_author'] }}" name="author" />
    <link href="{{ asset('admin/images/favicon.ico') }}" rel="shortcut icon">
    @stack('plugin_css')
    <link href="{{ asset('admin/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/unicons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/unicons-embedded.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
</head>
