@extends('layouts.app')
@section('content')
    <!-- Start of breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-0">
        <ol class="breadcrumb justify-content-end mb-0">
            @if(Auth::user()->usertype == 'Data entry operator')
                <li class="breadcrumb-item"><a class="no_link" href="{{ route('deohome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
            @elseif(Auth::user()->usertype == 'Lsg official')
                <li class="breadcrumb-item"><a class="no_link" href="{{ route('lsghome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
            @elseif(Auth::user()->usertype == 'phcmo')
                <li class="breadcrumb-item"><a class="no_link" href="{{ route('phchome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>        
            @endif
        </ol>
    </nav>
    <!-- End of breadcrumb -->
    <div class="container ui_innerpage">
        <div class="row p-1">
            <div class="col-12 py-1">
                <div class="alert bg-gray btn-point" role="alert">
                    <i class="fas fa-plus-circle"></i>&nbsp;Move to Home Quarantine
                </div> <!-- alert -->
            </div> <!-- ./col12 -->
            <div class="col-12 py-1">
                
            </div> <!-- ./col12 -->
            <div class="col-12 py-1">
                <div class="table-reponsive">
                    <input  type="hidden" name="usertype" id="usertype" value="{{ Auth::user()->usertype }}">
                    <table class="table table-bordered table-striped" id="master_table"> </table>
                </div> <!-- ./table-responsive -->
            </div> <!-- ./col12 -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
    <div class="modal fade bd-example-modal-lg" role="dialog" id="transactionmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modalevenrow">
                <div class="modal-header modalevenrow">
                    <h4 class="modal-title text-primary"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Custom Ajax Title </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> <!-- ./modal-header -->
                <span id="formresults"></span>
                <form id="ajaxmodalform" method="post" class="form-horizontal">
                    <div class="modal-body modalevenrow text-dark">
                        <div class="row p-2 modalevenrow">
                            <div class="col-4 d-flex justify-content-end">Name
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <input type="text" name="name" id="name" value="" class="form-control col-6 btn-point" required minlength="2" maxlength="30">
                                <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.
                                </p>
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row1 -->
                         <div class="row p-2 modalevenrow">
                            <div class="col-4 d-flex justify-content-end">Disease Details
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                            <textarea name="ailmentdetails" id="ailmentdetails" ></textarea> 
                                <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.
                                </p>
                   
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row1 -->
                         <div class="row p-2 modalevenrow">
                            <div class="col-4 d-flex justify-content-end">Symtoms   
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <textarea   name="symtomdet" id="symtomdet"></textarea>
                                <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.
                                </p>
                                
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row1 -->

                         <div class="row p-2 modalevenrow">
                            <div class="col-4 d-flex justify-content-end">Hospital Name
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <input type="text" name="hospitalname" id="hospitalname" value="" class="form-control col-6 btn-point" required minlength="2" maxlength="30">
                                <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.
                                </p>
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row1 -->
                        <div class="row p-2 modalevenrow">
                            <div class="col-4 d-flex justify-content-end">Remarks
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <textarea name="movehomeremark" id="movehomeremark" lass="form-control col-6 btn-point"></textarea>
                                
                                <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.
                                </p>
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row1 -->


                    </div> <!-- ./modal-body -->
                    <div class="modal-footer modalevenrow">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" class="btn btn-flat btn-point btn-secondary" name="actionbutton" id="actionbutton" value="DynamicValue">
                    </div> <!-- ./modal-footer -->
                </form> <!-- ./form -->
            </div> <!-- ./modal-content -->
        </div> <!-- ./modal-dialog -->
    </div> <!-- ./transaction_modal -->

    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h3 class="modal-title1 text-primary">Confirmation</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> <!-- ./modal-header -->
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                </div> <!-- ./modal-body -->
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div> <!-- ./modal-footer -->
            </div> <!-- ./modal-content -->
        </div> <!-- ./modal-dialog -->
    </div> <!-- ./confirm modal dialog -->

@endsection
@section('customscripts')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var usertype = $('#usertype').val();
            if(($('#usertype').val()) =='Lsg official')
            {
                  var action_url = "{{ route('lsg.movetoHQlist') }}";   
            }
            
            if(($('#usertype').val()) =='phcmo')
            {
                  var action_url = "{{ route('phc.movetoHQlist') }}";   
            }
            $("#master_table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: action_url,
                },
                columns: [


                    {
                       
                        defaultContent: "",
                        data: 'DT_RowIndex',
                        title: 'Slno'
                    },

                    {
                        name: 'name',
                        defaultContent: "",
                        data: 'name',
                        title: 'Name'
                    },
                     
                    {
                        name: 'ailmentdetails',
                        defaultContent: "",
                        data: 'ailmentdetails',
                        title: 'Disease'
                    },
                     {
                        name: 'symtomdet',
                        defaultContent: "",
                        data: 'symptomsdetails',
                        title: 'Symptoms'
                    },
                     

                    {
                        name: 'action',
                        data: 'action',
                        title: '',
                        orderable: false
                    }
                ]
            });

            $("#transactionbutton").click(function(event){
                event.preventDefault();
                $('.modal-title').text('Add New Symptom');
                $('#actionbutton').val('Save Details');
                $('#action').val('Add');
                $('#ajaxformresults').html('');
                $("#transactionmodal").modal('show');


            });

            $('#name').on('keydown ', function(e) {

                var testval = this.value;
                var tested = new RegExp('^[a-zA-Z ]+$');
                if (!tested.test(testval))
                {
                    // $('#name').val('');
                    $('#nameerror').slideDown("slow");
                }
                else
                {
                    $('#nameerror').hide();
                }

            });

            $('#ajaxmodalform').on('submit', function(event){
                event.preventDefault();
                var action_url = '';

                if($('#name').val() == '')
                {
                    alert("Name id Required!")
                    $('#name').focus();
                } 
                else 
                {
                    
                    if($('#action').val() == 'Edit')

                        if(($('#usertype').val()) =='Lsg official')
                        {
                              var action_url1 = "{{ route('lsg.movetoHQupdate') }}";   
                        }
                        
                        if(($('#usertype').val()) =='phcmo')
                        {
                              var action_url1 = "{{ route('phc.movetoHQupdate') }}";   
                        }
                        /*action_url = "{{ route('lsg.movetoHQupdate') }}";*/

                    $.ajax({
                        url: action_url1,
                        method:"post",
                        data:$(this).serialize(),
                        dataType:"json",
                        success:function(data)
                        {
                            var html = '';
                            if(data.errors)
                            {
                                html = '<div class="alert alert-danger">';
                                for(var count = 0; count < data.errors.length; count++)
                                {
                                    html += '<p>' + data.errors[count] + '</p>';
                                }
                                html += '</div>';
                            }
                            if(data.success)
                            {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#ajaxmodalform')[0].reset();
                                $('#master_table').DataTable().ajax.reload();
                                $('#transactionmodal').modal('hide');
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.edit', function(){

                var id = $(this).attr('id');
                if(($('#usertype').val()) =='Lsg official')
                        {
                              var action_url2 = "/lsg/movetoHQ/";   
                        }
                        
                        if(($('#usertype').val()) =='phcmo')
                        {
                              var action_url2 = "/phc/movetoHQ/";   
                        }
                //alert(id);
                $('#ajaxformresults').html('');
                $.ajax({

                    url :action_url2+id,
                    dataType:"json",
                    success:function(data)
                    {
                        $('#name').val(data.userdata.name);
                        $('#ailmentdetails').val(data.userdata.ailmentdetails);
                        $('#symtomdet').val(data.userdata.symptomsdetails);
                        $('#hospitalname').val(data.userdata.hospitalname);


                        $('#hidden_id').val(id);
                        $('.modal-title').text('Move to Home');
                        $('#actionbutton').val('Move');
                        $('#action').val('Edit');
                        $('#transactionmodal').modal('show');
                    }
                })
            });

                                  

        });/*--end of document.ready--*/
    </script>
@endsection
