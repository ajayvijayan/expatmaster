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
    <link href="css/extra_style.css" rel="stylesheet">
    <link href="css/malfonts.css" rel="stylesheet">
</head>
<body class="creative-lp">
    <!-- Navigation & Intro -->
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
                            <a class="btn btn-dark-green btn-rounded btn-sm font-weight-bold" href="{{route('login')}}" data-offset="90"> <span class=" mal_xl"> ഓദ്യോഗിക ലോഗിൻ  </span> </a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="btn btn-dark-green btn-rounded btn-sm font-weight-bold" id="selfreporting" href="#" data-toggle="modal" data-target=".www" ><span class=" mal_xl"> സ്വയം വെളിപ്പെടുത്തൽ  </span></a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ./navbar --- -->
        <!-----------vivek(start)------->
        <div class="modal fade www" id="themainmodel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Verify User.</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <meta name="_token" content="{{{ csrf_token() }}}"/>
                            <div class="col-lg-12">
                                <div class="row" id="mobileenter">
                                    <div class="col-sm-10"><label for="mobile" id="lblmobile">Mobile No</label><input type="text" name="mobile" id="mobile" placeholder="Mobile No" class="form-control"></div>
                                    <div class="col-sm-10"><label for="dateofbirth" id="lnldob">Date of Birth</label><input type="date"  name="dateofbirth" id="dateofbirth" placeholder="Date Of Birth" class="form-control"></div>
                                    <div class="col-sm-12 text-right"><input type="button" name="userverify" id="userverify" class="btn btn-primary btn-sm" value="Verify"></div>
                                    <label for="verifyuserlbl" id="verifyuserlbl"></label>
                                </div>


                            </div>
                        </form>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div class="modal fade www" id="resultmodel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">സ്വയം വെളിപ്പെടുത്തൽ</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body text-center">
                        <input type="hidden" id="hiddenselfcheck" value="{{Session::get('message')}}">

                        <h3><code>സ്വയം വെളിപ്പെടുത്തൽ വിജയകരം</code></h3>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!---------vivek(end)------>

        <!--Intro Section-->
        <section class="view intro-4 mt-5 pt-5" style="background-image: url('img/slide2.png'); background-repeat: no-repeat; background-size: contain; background-position: center center;"
            id="home">
            <div class="mask rgba-indigo-light">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="row pt-5 mt-3">
                        <div class="col-md-12 wow fadeIn mb-3">
                            <div class="text-center white-text">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
    <!-- Navigation & Intro -->

    <!-- Main content -->
    <main>

        <div class="container">

            <!-- Section: Features v.4 -->
            <section id="features" class="section feature-box text-center my-5 pt-1">

                <!-- Section heading -->
                <h2 class="title font-weight-bold my-5 wow fadeIn" data-wow-delay="0.2s">
                     <strong> <span class="mal_xli">പ്രവാസി രജിസ്‌‌ട്രേഷൻ  </span> </strong>
                </h2>

                <!-- Section sescription -->
                <p class="grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
                <strong> <span class="mal_l indigo-text">   കോവിഡ് 19മായി ബന്ധപ്പെട്ട് വിവിധയിടങ്ങളിൽ താമസിക്കുന്ന പ്രവാസി മലയാളികൾക്ക് തിരികെ കേരളത്തിലേക്ക് എത്തിച്ചേരുന്നതിനായുള്ള രജിസ്ട്രേഷൻ. 
                </span> </strong> </p>

                <!--Grid row-->
                <div class="row features wow fadeIn" data-wow-delay="0.2s">

                    <!--Grid column-->
                    <div class="col-lg-4 text-center">
                        <a href="register.php">
                        <div class="icon-area">
                            <div class="circle-icon">
                                <i class="fas fa-user-plus blue-text"></i>
                            </div>
                            <br>
                            <span class=" indigo-text font-weight-bold mt-2"> <strong> 
                                <span class="mal_l">രജിസ്ട്രേഷൻ  </span> </strong></span>
                            <div class="mt-1">
                                <p class="mx-3"> <strong> <span class="mal_xs dark-grey-text"> കേരളത്തിലേക്ക് തിരികെ വരുന്നതിനായുള്ള രജിസ്‌ട്രേഷൻ പൂർത്തീകരിക്കുക.
                                </span> </strong></p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 text-center">
                        <a href="register.php">
                        <div class="icon-area">
                            <div class="circle-icon">
                                <i class="fas fa-user-edit blue-text"></i>
                            </div>
                            <br>
                            <span class="indigo-text font-weight-bold mt-2"> <strong> <span class="mal_l">തിരുത്തൽ 
                            </span> </strong></span>
                            <div class="mt-1">
                                <p class="mx-3 dark-grey-text"> <strong> <span class="mal_xs">ആഗമന വിവരങ്ങൾ, എത്തിച്ചേരുന്ന സ്ഥലങ്ങൾ എന്നിവ തിരുത്തുന്നതിനും, ചേർക്കുന്നതിനും.
                                </span> </strong></p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4 text-center mb-4">
                        <a href="register.php">
                        <div class="icon-area">
                            <div class="circle-icon">
                                <i class="fas fa-book-reader blue-text"></i>
                            </div>
                            <br>
                            <span class="indigo-text font-weight-bold mt-2"> <strong> <span class="mal_l"> മാർഗ്ഗനിർദ്ദേശങ്ങൾ 
                            </span> </strong></span>
                            <div class="mt-1">
                                <p class="mx-3 dark-grey-text"> <strong> <span class="mal_xs">കേരളത്തിലേക്ക് തിരികെ വരുമ്പോൾ പാലിക്കേണ്ട മാർഗ്ഗനിർദ്ദേശങ്ങൾ. 
                                </span> </strong></p>
                            </div>
                        </div>
                    </a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!-- Section: Features v.4 -->

            <hr>

             <!--Section: Services-->
                <section class="section mt-3 mb-3 pb-3">

                    <!-- Section heading -->
                    <h3 class="text-center title my-5 py-2 dark-grey-text font-weight-bold wow fadeIn" data-wow-delay="0.2s">
                        <strong> <span class="mal_xl">രജിസ്റ്റർ ചെയ്യേണ്ട വിവരങ്ങൾ </span> </strong>
                    </h3>

                    <!-- First row -->
                    <div class="row wow fadeIn" data-wow-delay="0.4s">

                        <!-- First column -->
                        <div class="col-md-4 mb-5 text-center">

                            <!--Panel-->
                            <div class="card card-body text-left white hoverable">
                                <p class="feature-title title font-weight-bold dark-grey-text text-uppercase spacing mt-4 mx-4">
                                    <i class="fas fa-square orange-text mr-2" aria-hidden="true"></i>
                                    <strong> <span class="mal_xl">01 പ്രാഥമിക വിവരങ്ങൾ</span> </strong>
                                </p>
                                <p class="indigo-text font-small mx-4 "><strong><span class="mal_m">താങ്കളുടെ പ്രാഥമിക വിവരങ്ങൾ, പേര്, മൊബൈൽ നമ്പർ, പാസ്‌‌പോർട്ട് നമ്പർ, ജനനത്തീയ്യതി,  വിലാസം എന്നിവ നൽകുക.</span></strong>
                                </p>
                            </div>
                            <!--/.Panel-->

                        </div>
                        <!-- /First column -->

                        <!-- Second column -->
                        <div class="col-md-4 mb-5 text-center">

                            <!--Panel-->
                            <div class="card card-body text-left white hoverable">
                                <p class="feature-title title font-weight-bold dark-grey-text text-uppercase spacing mt-4 mx-4 ">
                                    <i class="fas fa-square orange-text mr-2" aria-hidden="true"></i>
                                    <strong><span class="mal_xl">02 എത്തിച്ചേരുന്ന വിവരങ്ങൾ </span></strong>
                                </p>
                                <p class="indigo-text font-small mx-4"><strong><span class="mal_m">താങ്കൾ വരാൻ ഉദ്ദേശിക്കുന്ന മാർഗ്ഗം, ഏയർപ്പോർട്ട്, റെയിൽവേ സ്റ്റേഷൻ തുടങ്ങിയ വിവരങ്ങൾ. </span></strong>
                                </p>
                            </div>
                            <!--/.Panel-->

                        </div>
                        <!-- /.Second column -->

                        <!-- Third column -->
                        <div class="col-md-4 mb-5 text-center">

                            <!--Panel-->
                            <div class="card card-body text-left white hoverable">
                                <p class="feature-title title font-weight-bold dark-grey-text text-uppercase spacing mt-4 mx-4 ">
                                    <i class="fas fa-square orange-text mr-2" aria-hidden="true"></i>
                                    <strong><span class="mal_xl">03 ആഗമന വിവരങ്ങൾ </span></strong>
                                </p>
                                <p class="indigo-text font-small mx-4 "><strong><span class="mal_m">താങ്കൾ വരുന്ന ഫ്ലൈറ്റ് നമ്പർ, തീയ്യതി, സമയം എന്നിവ യാത്രാമാർഗ്ഗങ്ങൾ പുനരാരംഭിക്കുമ്പോൾ ചേർക്കാവുന്നതാണ്.</span></strong>
                                </p>
                            </div>
                            <!--/.Panel-->

                        </div>
                        <!-- /.Third column -->

                    </div>
                    <!-- /.First row -->

                </section>
                <!--/Section: Services-->
            <!-- Section: Features v.4 -->

            <hr>

            <!-- Section: About 1-->
            <section id="about" class="section about mt-1 mb-5 py-2 wow fadeIn" data-wow-delay="0.2s">

                <!-- Grid row -->
                <div class="row pt-2 mt-lg-5">

                    <!-- Grid column -->
                    <div class="col-lg-6 col-md-12 mb-3 wow fadeIn" data-wow-delay="0.4s">
                        <!-- Image -->
                        <div class="embed-responsive embed-responsive-16by9">
             <video  controls>
                          <source src="files/frontvid.mp4" type="video/mp4">
                        </video>
            </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-6 ml-auto col-md-12 wow fadeIn" data-wow-delay="0.4s">

                        <!-- Secion heading -->
                        <span class="mb-5 feature-title title font-weight-bold wow fadeIn" data-wow-delay="0.2s">
                            <strong><span class="mal_xl">പ്രവാസികള്‍ക്ക് ഓണ്‍ലൈന്‍ മെഡിക്കല്‍ സേവനം: മുഖ്യമന്ത്രി</span></strong>
                        </span>

                        <!-- Description -->
                        <p align="justify" class="indigo-text "><strong><span class="mal_xxs">പ്രവാസി മലയാളികൾക്ക്‌ കരുതലുമായി സംസ്ഥാന സർക്കാർ. മലയാളികൾ കൂടുതലുള്ള രാജ്യങ്ങളിൽ അഞ്ച്‌ ഹെൽപ്‌ ഡെസ്‌ക്‌ ആരംഭിച്ചു. മുഖ്യമന്ത്രിയുടെ നിർദേശപ്രകാരം വിവിധ സംഘടനകളുമായി ചേർന്ന്‌ നോർക്കയാണ്‌ ഹെൽപ്‌ ഡെസ്‌ക്‌ ആരംഭിച്ചത്‌. ആ പ്രദേശത്തെ എല്ലാവിഭാഗം ജനങ്ങളും സംഘടനകളുമടങ്ങുന്ന ഗ്രൂപ്പുകൾ രൂപീകരിച്ചിട്ടുണ്ട്‌.</span></strong></p>
                        <p class="grey-text">
                            <i class="fas fa-long-arrow-alt-right blue-text mr-2" aria-hidden="true"></i> <strong><span class="mal_xxs indigo-text">കോവിഡ് രജിസ്ട്രേഷൻ </span></strong> </p>
                        <p class="grey-text">
                            <i class="fas fa-long-arrow-alt-right blue-text mr-2" aria-hidden="true"></i> <strong><span class="mal_xxs indigo-text"> ഡോക്ടർ ഓൺലൈൻ </span> </strong></p>
                        <p class="grey-text">
                            <i class="fas fa-long-arrow-alt-right blue-text mr-2" aria-hidden="true"></i> <strong><span class="mal_xxs indigo-text"> ഹലോ ഡോക്ടർ </span></strong> </p>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </section>
            <!-- Section: About 1-->
        </div>

 
    </main>
    <!-- Main content -->

    <!--Footer-->
    
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
        // new WOW().init();

        // Material Select Initialization
        $(document).ready(function () {
            // $('.mdb-select').material_select();
       
//////////////vivek(start)//////////
        if($('#hiddenselfcheck').val() === 'true'){
                // alert($('#hiddenselfcheck').val());
                $('#resultmodel').modal('show');
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

        $('#userverify').click(function () {
            var mobile = $('#mobile').val();
            var dob = $('#dateofbirth').val();
            console.log(mobile);

            $.ajax({
                url :'/userverifycheck/'+ mobile + '/' + dob,
                dataType:"json",
                type:"post",
                // data: {'mobile': mobile},
                cache: false,

                success:function(data)
                {
                    if(data.success === true){
                        // console.log(data.success);
                        $('#verifyuserlbl').html('<code>Successfully Verified.. <small>Redirecting Please wait.. !</small></code>');
                        window.setTimeout(function() {
                            window.location.href = "selfreporting";
                        }, 2000);

                    }else{
                        $('#verifyuserlbl').html('<code>Mobile Number is Not registered/ No matching date of birth / You are Not in home quarantine</code>');

                    }
                }
            });
        });

        $('#themainmodel').on('hidden.bs.modal', function () {
            $('#mobileenter').show();
            $('#otpdiv').hide();
            $('#mobilereturn').html('');
            $('#dateofbirth').val('');
            $('#mobile').val('');
            $('#verifyotptxt').val('');
        });


        $('#dateofbirth').mask('99-99-9999',{placeholder:"mm-dd-yyyy"});

        //////////////vivek(end)//////////
         });
    </script>

</body>

</html>
