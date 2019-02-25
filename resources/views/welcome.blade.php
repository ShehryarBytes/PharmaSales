<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <title>PharmaSales | Welcome</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <!-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/modal-video/css/modal-video.min.css" rel="stylesheet">
 -->
  <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
    <body>

        <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1> Welcome to <span class="logo-lg"><b>Pharma</b>Sales  <small><i class="fa fa-ambulance fa-5x"></i></small></span></h1>
      <h2>Get Signup for free</h2>
      <img src="img/hero-img.png" alt="Hero Imgs" class="img-responsive" width="600px" height="400px">
      
      @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="btn-get-started scrollto">Home</a>
                    @else
                        <span>
                            <a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a> &nbsp;
                        <a href="{{ route('register') }}" class="btn-get-started scrollto">Register</a>
                        </span>
                    @endauth
                </div>
            @endif
    </div>
  </section><!-- #hero -->
    </body>


  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</html>
