<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>കേരള സർക്കാർ  - Government of Kerala</title>
    <!-- Font Awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/login_style.css" rel="stylesheet">
    <link href="css/malfonts.css" rel="stylesheet">
</head>
<body class="creative-lp">
    <!--Main Navigation-->
    <header>
      <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top scrolling-navbar white">
            <div class="container">
                <a class="navbar-brand font-weight-bold title mal_xxl" href="index.php"> കേരള സർക്കാർ </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="">
                    <!-- Social Icon  -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item ml-3">
                            <a class="btn btn-dark-green btn-rounded btn-sm font-weight-bold" href="index.php" data-offset="90"> <span class=" mal_xl"> <i class="fas fa-home"></i> &nbsp; ഹോം  </span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ./navbar --- -->
        <!--Intro Section-->
        <section class="view intro-2">
            <div class="mask rgba-gradient7">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                <!--Grid row-->
                <div class="row  pt-5 mt-3">
                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body px-5">
                                <h2 class="feature-title text-center mb-2 mt-4 font-weight-bold blue-text">
                                    <strong>Official Login Only</strong>
                                </h2>
                                <hr>
                                <form method="POST" action="{{ route('login') }}">
                        @csrf
                                <!--Grid row-->
                                <div class="row mt-3 px-5">
                                <!--Grid column-->
                                    <div class="col-md-12 px-5">
                                        <div class="md-form mb-0 ">
                                            <i class="fas fa-user prefix blue-text"></i>
                                            <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                        </div>
                                        <div class="md-form mb-0">
                                            <i class="fas fa-lock prefix blue-text"></i>
                                            <input id="password" type="password"  name="password" required placeholder="Password" autocomplete="current-password">
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-indigo text-white btn-point btn-flat mt-5"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login</button>
                                        </div>
                                    </div>
                                    <!--Grid column-->
                                </div>
                                <!--Grid row-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
        </section>
    </header>
    <!--Main Navigation-->
  <!--Footer-->
    <footer class="page-footer text-center text-md-left unique-color-dark pt-0 mt-0">
  <!-- Copyright-->
        <div class="footer-copyright text-center py-3">
            <div class="container-fluid">
                <span class="eng_xxxs"> Designed and Developed by: <a href="" target="_blank" data-toggle="tooltip" title="This will open an external website."> C-DIT </a> </span>
            </div>
        </div>
        <!--/.Copyright -->
    </footer>
    <!--/.Footer-->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
    <script>
        //Animation init
        new WOW().init();

        // Material Select Initialization
        $(document).ready(function () {
            $('.mdb-select').material_select();
        });
    </script>
</body>
</html>