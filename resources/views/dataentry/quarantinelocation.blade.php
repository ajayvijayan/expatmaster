@extends('layouts.app')
@section('content')
    <div class="container ui_innerpage">
        <div class="row p-1">
            <div class="col-12 py-1">
                <div class="alert bg-gray btn-point" role="alert">
                    <i class="fas fa-user-plus"></i>&nbsp; Quarantine Location
                </div> <!-- alert -->
            </div> <!-- ./col12 -->
            <div class="col-12 py-1">
                <button type="button" class="btn btn-point btn-flat btn-danger" id="transactionbutton" name="transactionbutton">
                    <i class="fas fa-user-plus"></i> &nbsp;New Quarantine Location</button>
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
                            <div class="col-4 d-flex justify-content-end"> Quarantine Location Name
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <input type="text" name="name" id="name" value="" class="form-control col-6 btn-point" required>
                                <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.</p>
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row1 -->
                               <!-- ./row1 -->
                               <!-- ./row1 -->
                               <!-- ./row1 -->
                               <!-- ./row1 -->
                        <div class="row p-2 modaloffrow">
                            <div class="col-4 d-flex justify-content-end"> Transit Type
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <select name="transittype" id="transittype" class="form-control col-6  btn-point" required>
                                </select>
                            </div> <!-- ./col6 -->
                        </div> <!-- ./row4 -->
                        <div  class="row p-2 modalevenrow">
                            <div class="col-4 d-flex justify-content-end"> District Name
                            </div> <!-- ./col4 -->
                            <div class="col-8">
                                <select name="district" id="district" class="form-control col-6  btn-point" required>
                                </select>
                            </div> <!-- ./col6 -->
                        </div>
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
                    url: "{{ route('quarantinelist') }}",
                },
                columns: [
                    {
                        name: 'name',
                        data: 'name',
                        title: 'Quarantine Location Name'
                    },
                    {
                        name: 'transittype',
                        data: 'transittype',
                        title: 'Transit Type'
                    },
                    {
                        name: 'districtname',
                        data: 'districtname',
                        title: 'District Name'
                    },
                    {
                        name: 'action',
                        data: 'action',
                        title: 'Action',
                        orderable : false,
                        searchable : false
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
                $.ajax({
                    url: "{{ route('quarantinecreate') }}",
                    dataType:"json",
                    success:function(data)
                    {
                        $('#transittype').html('');
                        $('#transittype').append($('<option></option>').val('0').html('Select'));
                        $.each(data.transittype, function(index, element) {
                            $('#transittype').append(
                                $('<option></option>').val(element.transitname).html(element.transitname)
                            );
                        });
                        $('#district').html('');
                        $('#district').append($('<option></option>').val('0').html('Select'));
                        $.each(data.district, function(index, element) {
                            $.each(element.districts, function(index, element1) {
                                $('#district').append(
                                    $('<option></option>').val(element1).html(element1)
                                );
                            });
                        });
                        ///////start
                        // $.each(data.district, function(index, element) {
                        //     $.each(element.districts, function(index, element1) {
                        //         $('#district').append(
                        //             $('<option>Select</option>').val(element1).html(element1)
                        //         );
                        //        // element1 == data.userdata.districtname ? $('#district').val(element1).prop('selected', true) : '';
                        //     });
                        // });
                        /////////////end

                        $('.modal-title').text('Add New Quarantine Location');
                        $('#actionbutton').val('Save Details');
                        $('#action').val('Add');
                        $('#ajaxformresults').html('');
                        $("#transactionmodal").modal('show');
                    }
                })
            });

            $('#name').on('change ', function(e) {
                var testval = this.value;
                var tested = new RegExp('^[a-zA-Z]+$');
                if (!tested.test(testval))
                {
                    $('#name').val('');
                    $('#nameerror').slideDown("slow");
                }
                else
                {
                    $('#nameerror').hide();
                }

            });

            $('#transittype').on('change ', function(e) {
                var testval = this.value;
                var tested = new RegExp('^[a-zA-Z]+$');
                if (!tested.test(testval))
                {
                    $('#fullname').val('');
                    $('#fullnameerror').slideDown("slow");
                }
                else
                {
                    $('#fullnameerror').hide();
                }

            });

            $('#district').on('change ', function(e) {
                var testval = this.value;
                var tested = new RegExp('^[a-zA-Z0-9\@\.]+$');
                if (!tested.test(testval))
                {
                    $('#email').val('');
                    $('#emailerror').slideDown("slow");
                }
                else
                {
                    $('#emailerror').hide();
                }

            });

            $('#mobile').on('change ', function() {
                $('#mobilenumbererror').hide();
                var mobile = $("#mobile").val();
                var tested = new RegExp('^[0-9]+$');

                if(mobile.length!=10 || !tested.test(mobile)){
                    $("#mobile").val('');
                    $('#mobilenumbererror').slideDown("slow");

                }
                else
                {
                    $('#mobilenumbererror').hide();
                }
            });

            $("#mobile").keypress(function(e){
                var keyCode = e.which;
                if(keyCode == 69 || keyCode == 101)
                {
                    e.preventDefault();
                    $("#mobile").val('');
                }
            })

            $('#ajaxmodalform').on('submit', function(event){
                event.preventDefault();
                var action_url = '';
                if($('#action').val() == 'Add')
                    action_url = "{{ route('quarantinecreate') }}";

                if($('#action').val() == 'Edit')
                    action_url = "{{ route('quarantineupdate') }}";

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
                    url :"/quarantineedit/"+id,
                    dataType:"json",
                    success:function(data)
                    {
                        $('#name').val(data.userdata.name);
                        $('#transittype').val(data.transittype);
                        $('#district').val(data.district);
                        $('#transittype').html('');
                        $.each(data.transittype, function(index, element) {
                            $('#transittype').append(
                                $('<option></option>').val(element.transitname).html(element.transitname)
                            );
                            element.transitname == data.userdata.transittype ? $('#transittype').val(element.transitname).prop('selected', true) : '';

                           
                            //element.transitname == data.userdata.transitname ? $('#transittype').val(element.transitname).prop('selected', true) : '';
                        });
                        $('#district').html('');
                        $('#district').append($('<option></option>').val('0').html('Select'));
                        $.each(data.district, function(index, element) {
                            $.each(element.districts, function(index, element1) {
                                $('#district').append(
                                    $('<option></option>').val(element1).html(element1)
                                );
                                element1 == data.userdata.districtname ? $('#district').val(element1).prop('selected', true) : '';
                            });
                        });
                            // $.each(data.district, function(index, element) {
                            //     $.each(element.districts, function(index, element1) {
                            //         $('#district').append(
                            //             $('<option></option>').val(element1).html(element1)
                            //         );
                            //         element1 == data.userdata.districtname ? $('#district').val(element1).prop('selected', true) : '';
                            //     });
                            // });
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
                    url:"/quarantinedestroy/"+element_id,
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
