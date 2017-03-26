<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts`.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/demo/ustora/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/demo/ustora/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/demo/ustora/css/owl.carousel.css">
    <link rel="stylesheet" href="public/demo/ustora/css/style.css">
    <link rel="stylesheet" href="public/demo/ustora/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('styles')
    
  </head>
  <body>
   
    @include('partials.front.header')
    <!-- End header area -->
    
    @include('partials.front.branding')
    <!-- End site branding area -->
    
    @include('partials.front.mainmenu')
    <!-- End mainmenu area -->
    
    @yield('content')
    
    @include('partials.front.footer')
    <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="public/demo/ustora/js/owl.carousel.min.js"></script>
    <script src="public/demo/ustora/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="public/demo/ustora/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="public/demo/ustora/js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="public/demo/ustora/js/bxslider.min.js"></script>
	<script type="text/javascript" src="public/demo/ustora/js/script.slider.js"></script>
    @stack('scripts')

  </body>
</html>