<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Main view</title>
    
    @yield('styles')
    

</head>

<body>

<div id="wrapper">
    
    @include('partials.mainnav')
    

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            @include('partials.topnav')

        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            @yield('content')

        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

@yield('scripts')


</body>

</html>
