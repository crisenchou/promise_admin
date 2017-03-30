<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>@yield('title','app')</title>
    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}"/>

    <!-- page specific plugin styles -->
@stack('css')

<!-- text fonts -->
    <link rel="stylesheet" href="{{asset('assets/css/fonts.googleapis.com.css')}}"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href=" {{asset('assets/css/ace-part2.min.css')}}" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('assets/css/ace-skins.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{asset('assets/css/ace-ie.min.css')}}"/>
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{asset('assets/js/ace-extra.min.js')}}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="no-skin">
@section('navbar')
    @include('partial.navbar')
@show
<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>
    @section('sidebar')
        @include('partial.sidebar')
    @show
    <div class="main-content">
        <div class="main-content-inner">
            @section('breadcrumbs')
                @include('partial.breadcrumbs')
            @show
            <div class="page-content">
                @include('partial.settings')
                @yield('page-content')
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
    @include('partial.footer')
    @include('partial.scroll-up')
</div><!-- /.main-container -->

<!-- basic scripts -->
<!--[if !IE]> -->
<script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
<!-- <![endif]-->
<!--[if IE]>
<script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='{{asset('assets/js/jquery.mobile.custom.min.js')}}'>" + "<" + "/script>");
</script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- page specific plugin scripts -->
@stack('scripts')

<!-- ace scripts -->
<script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
<script src="{{asset('assets/js/ace.min.js')}}"></script>
</body>
</html>
