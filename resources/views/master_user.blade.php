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
       <i class="fas fa-user-plus"></i>&nbsp; User Master
      </div> <!-- alert -->
    </div> <!-- ./col12 -->
    <div class="col-12 py-1">
      <button type="button" class="btn btn-point btn-flat btn-danger" id="transactionbutton" name="transactionbutton">
      <i class="fas fa-user-plus"></i> &nbsp;New User</button>
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
                    <div class="col-4 d-flex justify-content-end"> Name
                    </div> <!-- ./col4 -->
                    <div class="col-8">
                        <input type="text" name="name" id="name" value="" class="form-control col-6 btn-point" required minlength="2" maxlength="30">
                        <p id="nameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.</p>
                    </div> <!-- ./col6 -->
                </div> <!-- ./row1 -->
                <div class="row p-2 modaloffrow">
                    <div class="col-4 d-flex justify-content-end"> Full Name
                    </div> <!-- ./col4 -->
                    <div class="col-8">
                        <input type="text" name="fullname" id="fullname" value="" class="form-control col-6 btn-point" required minlength="2" maxlength="30">
                        <p id="fullnameerror" style="display:none; color:#FF0000;">Only A -Z a-z characters are allowed.</p>
                    </div> <!-- ./col6 -->
                </div> <!-- ./row1 -->
                <div class="row p-2 modalevenrow">
                    <div class="col-4 d-flex justify-content-end"> Email
                    </div> <!-- ./col4 -->
                    <div class="col-8">
                        <input type="text" name="email" id="email" value="" class="form-control col-6 btn-point" autocomplete="off" required>
                        <p id="emailerror" style="display:none; color:#FF0000;">Invalid Email.</p>
                    </div> <!-- ./col6 -->
                </div> <!-- ./row1 -->
                <div class="row p-2 modaloffrow">
                    <div class="col-4 d-flex justify-content-end"> Mobile
                    </div> <!-- ./col4 -->
                    <div class="col-8">
                        <input type="text" name="mobile" id="mobile" value="" class="form-control col-6 btn-point" autocomplete="off" required maxlength="10" min="10">
                        <p id="mobilenumbererror" style="display:none; color:#FF0000;" > Invalid Mobile Number.</p>
                    </div> <!-- ./col6 -->
                </div> <!-- ./row1 -->
                <div class="row p-2 modalevenrow">
                    <div class="col-4 d-flex justify-content-end"> Password
                    </div> <!-- ./col4 -->
                    <div class="col-8">
                        <input type="password" name="password" id="password" value="" class="form-control col-6 btn-point" required minlength="8">
                    </div> <!-- ./col6 -->
                </div> <!-- ./row1 -->
                <div class="row p-2 modaloffrow">
                    <div class="col-4 d-flex justify-content-end"> User Type
                    </div> <!-- ./col4 -->
                    <div class="col-8">
                        <select name="usertype" id="usertype" class="form-control col-6  btn-point" required>
                        </select>
                    </div> <!-- ./col6 -->
                </div> <!-- ./row4 -->
                <div class="row p-2 modaloffrow">
                    <div class="col-4 d-flex justify-content-end"> Transit Points
                    </div> <!-- ./col4 -->
                    <div class="col-8">
                        <select name="transitpoint" id="transitpoint" class="form-control col-6  btn-point" required>
                        </select>
                    </div> <!-- ./col6 -->
                </div> <!-- ./row4 -->
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
        url: "{{ route('admin.userlist') }}",
    },
    columns: [
      {
          name: 'name',
          defaultContent: '',
          data: 'name',
          title: 'Name'
      },
      {
          name: 'email',
          defaultContent: '',
          data: 'email',
          title: 'Email'
      },
      {
          name: 'mobile',
          defaultContent: '',
          data: 'mobile',
          title: 'Mobile'
      },
      {
          name: 'usertype',
          defaultContent: '',
          data: 'usertype',
          title: 'Type'
      },
      {
          name: 'transitpoint',
          defaultContent: '',
          data: 'transitpoint',
          title: 'Transit'
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
      $('.modal-title').text('Add New Record');
      $('#actionbutton').val('Save Details');
      $('#action').val('Add');
      $('#ajaxformresults').html('');
      $("#transactionmodal").modal('show');
      $.ajax({
       url: "{{ route('admin.usercreate') }}",
       dataType:"json",
       success:function(data)
        {
            $('#usertype').empty();
            $('#usertype').append($('<option></option>').val('0').html('Select'));
            $.each(data.usertype, function(index, element) {
                $('#usertype').append(
                    $('<option></option>').val(element.name).html(element.name)
                );
            });
            $('#transitpoint').empty();
            $('#transitpoint').append($('<option></option>').val('0').html('Select'));
            $.each(data.transitpoint, function(index, element) {
                $('#transitpoint').append(
                    $('<option></option>').val(element.name).html(element.name)
                );
            });
            $('.modal-title').text('Add New UserType');
            $('#actionbutton').val('Save Details');
            $('#action').val('Add');
            $('#ajaxformresults').html('');
            $("#transactionmodal").modal('show');
        }
       })
  });

  $('#name').on('change ', function(e) {
      var testval = this.value;
      var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
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

  $('#fullname').on('change ', function(e) {
      var testval = this.value;
      var tested = new RegExp('^[a-zA-Z0-9 \s]+$');
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

  $('#email').on('change ', function(e) {
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
          action_url = "{{ route('admin.userstore') }}";

      if($('#action').val() == 'Edit')
          action_url = "{{ route('admin.userupdate') }}";

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
       url :"/admin/useredit/"+id,
       dataType:"json",
       success:function(data)
        {
            $('#name').val(data.userdata.name);
            $('#fullname').val(data.userdata.fullname);
            $('#email').val(data.userdata.email);
            $('#mobile').val(data.userdata.mobile);
            $('#password').val('');
            $('#usertype').html('');
            $.each(data.usertype, function(index, element) {
            $('#usertype').append(
                $('<option></option>').val(element.name).html(element.name)
            );
            element.name == data.userdata.usertype ? $('#usertype').val(element.name).prop('selected', true) : '';
            });
            $('#transitpoint').html('');
            $.each(data.transitpoint, function(index, element1) {
            $('#transitpoint').append(
                $('<option></option>').val(element1.name).html(element1.name)
            );
            element1.name == data.userdata.transitpoint ? $('#transitpoint').val(element1.name).prop('selected', true) : '';
            });

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
            url:"/admin/userdestroy/"+element_id,
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
