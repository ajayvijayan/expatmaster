@extends('layouts.app')
@section('content')
    <!-- Start of breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-0">
        <ol class="breadcrumb justify-content-end mb-0">
            <li class="breadcrumb-item"><a class="no_link" href="{{ route('adminhome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
        </ol>
    </nav>
    <!-- End of breadcrumb -->
    <div class="container ui_innerpage">
        <div class="row p-1">
            <div class="col-12 py-1">
                <div class="alert bg-gray btn-point" role="alert">
                    <i class="fas fa-user-plus"></i>&nbsp;Transit Type Master
                </div> <!-- alert -->
            </div> <!-- ./col12 -->
            <div class="col-12 py-1">
                <button type="button" class="btn btn-point btn-flat btn-danger" id="transactionbutton" name="transactionbutton">
                    <i class="fas fa-user-plus"></i> &nbsp;New Transit Type</button>
            </div> <!-- ./col12 -->
            <div class="col-12 py-1">
                <div class="table-reponsive">
                    <table class="table table-bordered table-striped" id="master_table"> </table>
                </div> <!-- ./table-responsive -->
            </div> <!-- ./col12 -->
        </div> <!-- ./row -->
    </div> <!-- ./container -->
    <div class="modal fade bd-example-modal-lg" role="dialog" id="transactionmodal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modalevenrow">
                <div class="modal-header modalevenrow">
                    <h4 class="modal-title text-primary"><i class="fas fa-users-cog"></i>&nbsp;&nbsp;Custom Ajax Title </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> <!-- ./modal-header -->
                <span id="formresults"></span>
                <form id="ajaxmodalform" method="post" class="form-horizontal">
                    <div class="modal-body modalevenrow text-dark">
                        <div class="row p-2 modalevenrow">
                            <div class="col-4 d-flex justify-content-end"> Transit  Name
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <input type="text" name="transitname" id="transitname" value="" class="form-control col-6 btn-point" required minlength="2" maxlength="30">
                                <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.</p>
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row1 -->
                        <div class="row p-2 modaloffrow">
                            <div class="col-4 d-flex justify-content-end"> Local Name
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <input type="text" name="localname" id="localname" value="" class="form-control col-6 btn-point" required minlength="2" maxlength="30">
                                <p id="fullnameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.</p>
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Confirmation</h2>
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

            $("#master_table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('transitlist') }}",
                },
                columns: [
                    {
                        name: 'transitname',
                        data: 'transitname',
                        title: 'Transit Name'
                    },
                    {
                        name: 'localname',
                        data: 'localname',
                        title: 'Local Name'
                    },

                    {
                        name: 'action',
                        data: 'action',
                        title: 'Action',
                        orderable: false
                    }
                ]
            });

            $("#transactionbutton").click(function(event){
                event.preventDefault();
                $('.modal-title').text('Add New Record');
                $('#actionbutton').val('Save Details');
                $('#action').val('Add');
                $('#ajaxformresults').html('');
                $("#transactionmodal").modal('show');

            });

            $('#transitname').on('change ', function(e) {
                var testval = this.value;
                var tested = new RegExp('^[a-zA-Z]+$');
                if (!tested.test(testval))
                {
                    $('#transitname').val('');
                    $('#nameerror').slideDown("slow");
                }
                else
                {
                    $('#nameerror').hide();
                }

            });

            $('#localname').on('change ', function(e) {
                var testval = this.value;
                var tested = new RegExp('^[a-zA-Z]+$');
                if (!tested.test(testval))
                {
                    $('#localname').val('');
                    $('#fullnameerror').slideDown("slow");
                }
                else
                {
                    $('#fullnameerror').hide();
                }

            });



            $('#ajaxmodalform').on('submit', function(event){
                event.preventDefault();
                var action_url = '';
                if($('#action').val() == 'Add')
                    action_url = "{{ route('transitcreate') }}";

                if($('#action').val() == 'Edit')
                    action_url = "{{ route('transitupdate') }}";

                $.ajax({
                    url: action_url,
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
            });

            $(document).on('click', '.edit', function(){
                var id = $(this).attr('id');
                $('#ajaxformresults').html('');
                $.ajax({
                    url :"/transitedit/"+id,
                    dataType:"json",
                    success:function(data)
                    {
                        $('#transitname').val(data.userdata.transitname);
                        $('#localname').val(data.userdata.localname);


                        $('#hidden_id').val(id);
                        $('.modal-title').text('Edit Details');
                        $('#actionbutton').val('Update Details');
                        $('#action').val('Edit');
                        $('#transactionmodal').modal('show');
                    }
                })
            });

            var element_id;

            $(document).on('click', '.delete', function(){
                element_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){

                $.ajax({
                    url:"/transitdestroy/"+element_id,
                    dataType:"json",

                    success:function(data)
                    {
                        setTimeout(function(){
                            $('#confirmModal').modal('hide');
                            $('#master_table').DataTable().ajax.reload();
                            alert('Data Deleted');
                        }, 200);
                    }
                })
            });

            /*---------------------------------- End of Document Ready ---------------------------*/
        });
    </script>
@endsection
