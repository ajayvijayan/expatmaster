@extends('layouts.app')
@section('content')
    <!-- Start of breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-0">
        <ol class="breadcrumb justify-content-end mb-0">
            <li class="breadcrumb-item"><a class="no_link" href="{{ route('deohome') }}"><i class="fas fa-home"></i>&nbsp;Home</a>
            </li>
        </ol>
    </nav>
    <!-- End of breadcrumb -->
    <div class="container ui_innerpage">

        @if(isset($success))

            <div>{{ $success }}</div>
        @endif

        @if(isset($listdata))
            @foreach($listdata as $listdatas)
                <form action="{{ route('selfhealthdatastore') }}" name="eventstore" method="post">

                    @csrf
                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    @if($errors->any())
                                    @endif
                                        <div class="row  mt-1">
                                            <code>{{ implode('', $errors->all(':message')) }}</code>
                                            <div class="col-12">
                                            <div class="row ">
                                                <div class="col-md-4">
                                                    <span class="eng_xxs text-navy"> <i class="far fa-user"></i>&nbsp;&nbsp;{{ $listdatas['name'] }}  </span>
                                                    <hr/>
                                                    <span class="eng_xxs text-navy"> <i class="far fa-address-card"></i>&nbsp;&nbsp;{{ $listdatas['presentaddress'] }}  </span>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="eng_xxs text-navy"> <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{{ $listdatas['dateofbirth'] }}  </span>
                                                </div>
                                                <div class="col-md-4">

                                                    <span class="eng_xxs text-navy"> <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;{{ $listdatas['mobilenumber'] }}
                                                        <div id="cngdiv"><input type="button" class="btn btn-sm btn-primary" id="mbtn" value="Change" name = "mbtn" /></div>
                                                        <div id="clsdiv"><input type="button" class="btn btn-sm btn-primary" id="clsbtn" value="Close" name = "clsbtn" /></div>
                                                        <div id="mobdiv" style="display: none">
                                                            <input type="text" id="mobnumber" class="form-control" name="mobnumber" placeholder="New Mobile Number" maxlength="10" size="10" pattern="\d{3}[\-]\d{3}[\-]\d{4}" />
                                                            <input type="button" id="savebtn" value="Save" class="btn btn-sm btn-primary" name = "savebtn" /></div> <div id="result" style="color: red;"></div>
                                                    </span>

                                                </div>
                                                <div class="col-md-4">
                                                    <span class="eng_xxs text-navy"> <i
                                                            class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;{{ $listdatas['district'] }}  </span>
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="eng_xxs text-navy"> <i class="fas fa-map-pin"></i>&nbsp;&nbsp;{{ $listdatas['lsg'] }}  </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3 bg-gray text-darkslategray">
                                                <!-------- ---------------------------------------------------------->
                                                <div class="col-12 d-flex justify-content-center">
                                                    <div class="alert " role="alert">
                                                        House Visit Details
                                                    </div> <!-- ./alert -->
                                                </div> <!-- ./col12 -->
                                            </div> <!-- ./row -->
                                            <div class="row p-4 modaloddrow">

                                                <div class="col-md-6">ഏതൊക്കെ രോഗങ്ങള്‍ക്ക് ചികിത്സ എടുക്കുന്നു
                                                </div>

                                                <div class="col-md-3">
                                                    @if(isset($listdata))
                                                        @foreach($diseaselist as $diseaselists)
                                                            <input class="ailment" type="checkbox"
                                                                   name="ailmentdetails[]"
                                                                   id="{{ $diseaselists->name }}"
                                                                   value="{{ $diseaselists->name }}">
                                                            <label
                                                                for="{{ $diseaselists->name }}">{{ $diseaselists->name }}</label>
                                                            <br>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row p-4 modaloddrow">
                                                <div class="col-md-4"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="oldagestatus" name="oldagestatus"
                                                               value="yes">
                                                        <span class="checkmark"></span>
                                                        <span class="pl-5">വയോജനങ്ങള്‍ വീട്ടിലുണ്ടോ ?  </span>
                                                    </label>
                                                </div>

                                                <div class="col-md-4"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="pregnantwomenstatus"
                                                               name="pregnantwomenstatus" value="yes">
                                                        <span class="checkmark"></span>
                                                        <span class="pl-5">ഗർഭിണികൾ വീട്ടിലുണ്ടോ ?  </span>
                                                    </label>
                                                </div>

                                                <div class="col-md-4"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="feedingwomenstatus"
                                                               name="feedingwomenstatus" value="yes">
                                                        <span class="checkmark"></span>
                                                        <span class="pl-5">മുലയൂട്ടുന്ന അമ്മമാരുണ്ടോ ?  </span>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="row p-4 modalevenrow">


                                                <div class="col-md-12"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="closecontactstatus"
                                                               name="closecontactstatus" value="yes">
                                                        <span class="checkmark"></span>
                                                        <span class="pl-5"> നിങ്ങളുമായി അടുത്ത് ഇടപഴകിയ വരുടെ വിവരങ്ങള്‍ പങ്കുവയ്ക്കുക</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row p-4 modalevenrow" id="closecontact_div">
                                                <div class="row col-lg-12">
                                                    <div class="col-lg-5"><input type="text" name="closecontactname[0]"
                                                                                 id="closecontactname"
                                                                                 placeholder="പേര്"
                                                                                 class="form-control"></div>
                                                    <div class="col-lg-2"><input type="text" class="form-control"
                                                                                 name="age[0]"
                                                                                 id="closecontactmobile"
                                                                                 placeholder="വയസ്"></div>
                                                    <div class="col-lg-2">
                                                        <select class="form-control btn-point"
                                                                name="closecontactgender[0]" id="closecontactgender">
                                                            <option value="">ലിംഗഭേദം</option>

                                                            <option value="male">Male</option>

                                                            <option value="female">Female</option>

                                                            <option value="transgender">transgender</option>

                                                        </select>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <button type="button" name="add" id="add"
                                                                class="btn btn-sm btn-success">Add More
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="closecontact_div"></div>

                                            </div>

                                            <div class="row p-4 modalevenrow">
                                                <div class="col-md-6"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="closecontactdiseasestatus"
                                                               name="closecontactdiseasestatus" value="yes">
                                                        <span class="checkmark"></span>
                                                        <span class="pl-5">അവരിലാരെങ്കിലും ഏതെങ്കിലും രോഗങ്ങൾക്ക് ചികിത്സയെടുക്കുന്നുണ്ടോ ?  </span>
                                                    </label></div>
                                                <div class="col-md-3" id="closecontactdisease_div">ഉണ്ടെങ്കില്‍
                                                    ഏതൊക്കെ
                                                </div>
                                                <div class="col-md-3" id="closecontactdisease_div1">
                                                    @if(isset($listdata))
                                                        @foreach($diseaselist as $diseaselists)
                                                            <input class="ailmentone" type="checkbox"
                                                                   name="closecontactdisease[]"
                                                                   id="{{ $diseaselists->_id }}"
                                                                   value="{{ $diseaselists->name }}">
                                                            <label
                                                                for="{{ $diseaselists->_id }}">{{ $diseaselists->name }}</label>
                                                            <br>
                                                        @endforeach
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="row p-4 modaloddrow">
                                                <div class="col-md-3">സമ്പർക്ക വിലക്ക് തുടങ്ങിയ ദിവസം</div>
                                                <div class="col-md-3">
                                                    <input type="text" name="quarantinestarteddate"
                                                           id="quarantinestarteddate"
                                                           value="{{ Carbon\Carbon::today()->subDays(7)->format('d/m/Y')  }}"
                                                           class="form-control btn-point dob">
                                                </div>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <!------------------------------------daily ask questions-------------------->
                                            <div class="row p-4 modalevenrow">
                                                <div class="col-md-6"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="symptomsstatus" name="symptomsstatus"
                                                               value="yes">
                                                        <span class="checkmark"></span>
                                                        <span
                                                            class="pl-5">രോഗലക്ഷണങ്ങള്‍ എന്തെകിലും പ്രകടമായിട്ടുണ്ടോ ?  </span>
                                                    </label></div>
                                                <div class="col-md-3" id="symptoms_div">ഉണ്ടെങ്കില്‍ ഏതൊക്കെ</div>
                                                <div class="col-md-3" id="symptoms_div1">
                                                    @if(isset($symtomlist))
                                                        @foreach($symtomlist as $symtomlists)
                                                            <input type="checkbox" name="symptomsdetails[]"
                                                                   id="{{ $symtomlists->name }}"
                                                                   value=" {{ $symtomlists->name }}">
                                                            <label
                                                                for="{{ $symtomlists->name }}">{{ $symtomlists->name }}</label>
                                                            <br>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <!------------------------------------daily ask questions------------------->
                                            <!------------------------------------Questions to be asked every third day------------------->
                                            <div class="row p-4 modalevenrow">
                                                <div class="col-md-6"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="lsgfoodavailability"
                                                               name="lsgfoodavailability" value="yes">
                                                        <span class="checkmark"></span>
                                                        <span class="pl-5"> തദ്ദേശ ഭരണ സ്ഥാപനങ്ങൾ ഭക്ഷണം ലഭ്യമാക്കിട്ടുണ്ടോ</span></label>
                                                </div>
                                                <div class="col-md-6"><label class="checkboxcontainer">
                                                        <label class="checkboxcontainer">
                                                            <input type="checkbox" id="medicineavailability"
                                                                   name="medicineavailability" value="yes">
                                                            <span class="checkmark"></span>
                                                            <span class="pl-5"> ചികിത്സയിലുള്ളവർക്ക് മരുന്നുകൾ ലഭ്യമാണോ ?</span>
                                                        </label>
                                                </div>
                                            </div>

                                            <div class="row p-4 modalevenrow">
                                                <div class="col-md-6"><label class="checkboxcontainer">
                                                        <input type="checkbox" id="mentalstressstatus"
                                                               name="mentalstressstatus" value="yes">
                                                        <span class="checkmark"></span>
                                                        <span class="pl-5">മാനസിക പിരിമുറുക്കം , വിഷാദം ഇങ്ങനെ എന്തെങ്കിലും അനുഭവപ്പെടുന്നുണ്ടോ ?</span></label>
                                                </div>
                                                <div class="col-md-6"><label class="checkboxcontainer">
                                                        <label class="checkboxcontainer">
                                                            <input type="checkbox" id="telemedicinestatus"
                                                                   name="telemedicinestatus" value="yes">
                                                            <span class="checkmark"></span>
                                                            <span
                                                                class="pl-5"> ടെലി മെഡിസിൻ സൗകര്യം ആവശ്യമുണ്ടോ ? </span>
                                                        </label>
                                                </div>
                                            </div>

                                            <!------------------------------------Questions to be asked every third day------------------->


                                            <div class="row p-4 modalevenrow ">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input type="hidden" name="hidden_id" id="hidden_id"
                                                           value="{{ $listdatas['_id'] }}"/>
                                                    <input type="hidden" name="hidden_name" id="hidden_name"
                                                           value="{{ $listdatas['name'] }}"/>
                                                    <button class="btn btn-primary btn-flat" type="submit"
                                                            id="button-addon2">
                                                        &nbsp;&nbsp;<span class="text-white eng_xxs"> ADD  </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!------------------------------------------------------------------>
                                        </div> <!-- ./col12 -->


                                    </div>
                        </div> <!-- ./col12 -->
                    </div> <!-- ./row -->
    </div>

    @endforeach
    @endif

    </form>
    </div>
    <!-- ./container -->




@endsection
@section('customscripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#clsdiv").hide();
            $("#mbtn").click(function(){
                $("#mobdiv").show();
                $("#clsdiv").show();
                $("#cngdiv").hide();
            });
            $("#clsbtn").click(function(){
                $("#mobdiv").hide();
                $("#clsdiv").hide();
                $("#cngdiv").show();
            });

            $('.select2').select2({
                dropdownAutoWidth: true,

            });
            $("#diseases_div").hide();
            $("#symptoms_div").hide();
            $("#symptoms_div1").hide();
            $("#closecontactdisease_div").hide();
            $("#closecontactdisease_div1").hide();
            $("#illness_div").hide();
            $("#illness_div1").hide();
            $("#neighbourillness_div").hide();
            $("#neighbourillness_div1").hide();
            $("#functionattended_div").hide();
            $("#functionattended_div1").hide();
            $("#closecontact_div").hide();

            $('.ailment').on('change ', function (e) {
                var checkedNum = $('input[name="ailmentdetails[]"]:checked').length;
                if (!checkedNum) {
                    $("#diseases_div").hide();
                } else {
                    $("#diseases_div").show();
                }


            });

            $('.ailmentone').on('change ', function (e) {
                var checkedNum = $('input[name="closecontactdisease[]"]:checked').length;
                if (!checkedNum) {
                    $("#diseases_div").hide();
                } else {
                    $("#diseases_div").show();
                }
            });


            $('#symptomsstatus').on('change ', function (e) {
                var checkedNum1 = $('input[name="symptomsstatus"]:checked').length;
                if (!checkedNum1) {
                    $("#symptoms_div").hide();
                    $("#symptoms_div1").hide();
                } else {
                    $("#symptoms_div").show();
                    $("#symptoms_div1").show();
                }


            });
            $('#closecontactdiseasestatus').on('change ', function (e) {
                var checkedNum1 = $('input[name="closecontactdiseasestatus"]:checked').length;
                if (!checkedNum1) {
                    $("#closecontactdisease_div").hide();
                    $("#closecontactdisease_div1").hide();
                } else {
                    $("#closecontactdisease_div").show();
                    $("#closecontactdisease_div1").show();
                }


            });


            $('#anyillnessstatus').on('change ', function (e) {
                var checkedNum1 = $('input[name="anyillnessstatus"]:checked').length;
                if (!checkedNum1) {
                    $("#illness_div").hide();
                    $("#illness_div1").hide();
                } else {
                    $("#illness_div").show();
                    $("#illness_div1").show();
                }


            });
            $('#neighbourillnessstatus').on('change ', function (e) {
                var checkedNum1 = $('input[name="neighbourillnessstatus"]:checked').length;
                if (!checkedNum1) {
                    $("#neighbourillness_div").hide();
                    $("#neighbourillness_div1").hide();
                } else {
                    $("#neighbourillness_div").show();
                    $("#neighbourillness_div1").show();
                }


            });

            $('#functionattendedstatus').on('change ', function (e) {
                var checkedNum1 = $('input[name="functionattendedstatus"]:checked').length;
                if (!checkedNum1) {
                    $("#functionattended_div").hide();
                    $("#functionattended_div1").hide();
                } else {
                    $("#functionattended_div").show();
                    $("#functionattended_div1").show();
                }


            });

            $('#closecontactstatus').on('change ', function (e) {
                var checkedNum1 = $('input[name="closecontactstatus"]:checked').length;
                if (!checkedNum1) {
                    $("#closecontact_div").hide();

                } else {
                    $("#closecontact_div").show();

                }
            });
            $("#savebtn").click(function()
            {
                var textboxvalue = $('input[name="mobnumber"]').val();
                var expid =$('input[name="hidden_id"]').val();
                $.ajax(
                    {
                        type: "POST",
                        url: '{{ route('mobupdate') }}',
                        data: {mobilenumber: textboxvalue,hidden_id:expid},
                        success: function(result)
                        {

                            if(result.success == 'true')
                            {
                                $("#result").html('Mobile Number Updating please wait... ');
                                window.setTimeout(function(){
                                    window.location.href = "/";
                                }, 1000);
                            }
                            if(result.success == 'false')
                            {
                                $("#result").html('Mobile Number Not Updated');
                            }
                            //$("#result").html(result.success);
                        }
                    });
            });

            /*$('#passportnumber').on('change ', function() {
           $('#passportnumbererror').hide();
             var passportnumber = $("#passportnumber").val();
             var tested = new RegExp('^[0-9]+$');

               if(passportnumber.length!=10 || !tested.test(passportnumber)){
                 $("#passportnumber").val('');
                 $('#passportnumbererror').slideDown("slow");

               }
               else
             {
                $('#passportnumbererror').hide();
             }
         });*/

            $('#closecontactname').on('change ', function(e) {
                var testval = this.value;
                var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
                if (!tested.test(testval))
                {
                    $('#closecontactname').val('');
                    $('#closecontactnameerror').slideDown("slow");
                }
                else
                {
                    $('#closecontactnameerror').hide();
                }

            });
            $('#age').on('change ', function(e) {
                var testval = this.value;
                var tested = new RegExp('^[0-9]+$');
                if (!tested.test(testval))
                {
                    $('#age').val('');
                    $('#closecontactageerror').slideDown("slow");
                }
                else
                {
                    $('#closecontactageerror').hide();
                }

            });



        });/*--end of document.ready--*/
    </script>

    <script type="text/javascript">


        var i = 0;


        $("#add").click(function () {
            // alert("hghghghg");


            ++i;

            $("#closecontact_div").append('<div class="row col-lg-12" id="divs"><div class="col-lg-5"><input type="text" name="closecontactname[' + i + ']" id="closecontactname" placeholder="പേര്" class="form-control" /></div>&nbsp;<div class="col-lg-2"><input type="text" maxlength="3" name="age[' + i + ']" id="age" placeholder="വയസ്" class="form-control" /></div>&nbsp;<div class="col-lg-2"><select name="closecontactgender[' + i + ']" class="form-control"><option value="">ലിംഗഭേദം</option><option value="male">Male</option><option value="female">Female</option><option value="transgender">Transgender</option></select></div>&nbsp;<div class="col-md-2"><button type="button" class="btn btn-sm btn-danger remove-tr">Remove</button></div></div><hr />');


            //$("#closecontact_div").append('<div class="row p-4" id="divs"><div class="col-md-3"><input type="text" name="addmore['+i+'][closecontactname]" placeholder="പേര്" class="form-control" /></div>&nbsp;<div class="col-md-3"><input type="text" name="addmore['+i+'][closecontactmobile]" placeholder="മൊബൈൽ" class="form-control" /></div>&nbsp;<div class="col-md-3"><textarea name="addmore['+i+'][closecontactaddress]" placeholder="വിലാസം" class="form-control" ></textarea></div>&nbsp;<div class="col-md-3"><button type="button" class="btn btn-danger remove-tr">Remove</button></div>&nbsp;</div>');

        });


        $(document).on('click', '.remove-tr', function () {

            $(this).parents('#divs').remove();

        });


    </script>
@endsection
