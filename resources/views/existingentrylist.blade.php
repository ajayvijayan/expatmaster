@extends('layouts.app')
@section('content')
<!-- Start of breadcrumb -->
 <nav aria-label="breadcrumb" class="mb-0">
   <ol class="breadcrumb justify-content-end mb-0">
      <li class="breadcrumb-item"><a class="no_link" href="{{ route('deohome') }}"><i class="fas fa-home"></i>&nbsp;Home</a></li>
  </ol>
</nav>
<!-- End of breadcrumb -->
<div class="container ui_innerpage">
  <div class="row p-1">
    
    <div class="col-12 py-1">
      <button type="button" class="btn btn-point btn-flat btn-danger" id="transactionbutton" name="transactionbutton">
      <i class="fas fa-user-plus"></i> &nbsp;Search Existing</button>
    </div> <!-- ./col12 -->
  </div>
  @if(isset($success))

  <div>{{ $success }}</div>
  @endif

    <div class="row pt-1">
  <div class="col-12">
     <div class="card">
        <div class="card-header">
          <span class="eng_xxs text-darkslategray">
         <font class="text-primary"> * </font> NORKA registration ID/Passport Number .  
         </span>
        </div><!-- ./card-header -->
        <div class="card-body">
          <div class="row modalevenrow py-3">
            <div class="col-md-6">
              
              <form action="{{ route('searchdata') }}" name="eventstore" method="post">
              
              @csrf
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="" aria-label="mobile number" aria-describedby="button-addon2" id="number" name="number" maxlength="10" minlength="10" required>&nbsp;
                <p id="mobilenumbererror" style="display:none; color:#FF0000;"> Invalid Mobile Number. </p>
                <div class="input-group-append">
                  <button class="btn btn-success btn-flat" type="submit" id="button-addon2">
                  <i class="fas fa-search"></i>&nbsp;&nbsp;<span class="text-white eng_xxs"> Search  </span>
                  </button> &nbsp;
                </div>
              </div>
              </form>
            </div> <!-- ./col12 -->
            </div> <!-- ./row -->
        </div> <!-- ./card-body -->
      </div><!-- ./card -->
  </div>  <!-- ./col12 -->
</div> <!-- ./row -->

@if(isset($listdata))
  @foreach($listdata as $listdatas)
   <form action="{{ route('healthdatastore') }}" name="eventstore" method="post">
              
              @csrf
  <div class="row mt-2">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row  mt-1">
          <div class="col-12">
            <div class="row ">
                <div class="col-md-3">
                  <span class="eng_xxs text-navy"> <i class="far fa-user"></i>&nbsp;&nbsp;{{ $listdatas->name }}  </span>
                </div>
                <div class="col-md-3">
                  <span class="eng_xxs text-navy"> <i class="far fa-calendar-alt"></i>&nbsp;&nbsp;{{ $listdatas->dateofbirth }}  </span>
                </div>
                <div class="col-md-3">
                  <span class="eng_xxs text-navy"> <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;{{ $listdatas->mobilenumber }}  </span>
                  <hr><span class="eng_xxs text-navy">
                  <i class="far fa-envelope-open"></i>&nbsp;&nbsp;{{ $listdatas->email }}  </span>
                </div>
                <div class="col-md-3">
                  <span class="eng_xxs text-navy"> <i class="fas fa-plane-arrival"></i>&nbsp;&nbsp;{{ $listdatas->flightnumber }}  </span>
                </div>
               </div> 
               <div class="row mt-3 bg-gray text-darkslategray">
               <!-------- ---------------------------------------------------------->
              <div class="col-12 d-flex justify-content-center"> 
                <div class="alert " role="alert">
                  Health Details 
                </div> <!-- ./alert -->
              </div> <!-- ./col12 -->
            </div> <!-- ./row -->
               <div class="row p-4 modaloddrow">
                <div class="col-md-3">Ward</div><div class="col-md-3">
                  <select class="form-control btn-point" name="wardname" id="wardname">
                    @if(isset($warddata))
                      @foreach($warddata as $warddatas)
                    <option value="{{ $warddatas->wardName }}">{{ $warddatas->wardName }}</option>
                    @endforeach
                    @endif
                  </select></div>
                <div class="col-md-3">Pincode</div><div class="col-md-3"><input type="text" name="pincode" id="pincode"></div>
                 
               </div>
                <div class="row p-4 modalevenrow" >
                <div class="col-md-3">Name of PHC nearby</div><div class="col-md-3">
                  <input type="text" name="phcname" id="phcname"></div>
                  <div class="col-md-3">Whether in quarantine?</div><div class="col-md-3">
                    <input type="checkbox" name="whetherquarantine" id="whetherquarantine"></div>
                
                   </div>

                <div class="row p-4 modaloddrow">
                   <div class="col-md-3">Whether coming from high risk place</div>
                <div class="col-md-3">
                  <input type="checkbox"  name="cominghighriskplace" id="cominghighriskplace" value="yes">
                </div>
               <div class="col-md-3">If yes, name of the place</div>
                <div class="col-md-3">
                  <input type="text" name="quarantinelocation" id="quarantinelocation" >
                </div>
                 
               </div>

                <div class="row p-4 modalevenrow">
                   <div class="col-md-3">Disease types - list</div>
                   <div class="col-md-3">
                    @if(isset($listdata))
                      @foreach($diseaselist as $diseaselists)
                    <input type="checkbox" name="ailmentdetails[]" id="{{ $diseaselists->name }}" value="{{ $diseaselists->name }}">
                    <label for="{{ $diseaselists->name }}">{{ $diseaselists->name }}</label><br>
                    @endforeach
                    @endif
                  </div>
                                
                <div class="col-md-6">   <label class="checkboxcontainer">
                    <input type="checkbox"  id="medicinestatus" name="medicinestatus" >
                    <span class="checkmark"></span>
                     <span class="pl-5"> Whether continuing regular medicine  </span>
                </label></div>
                 
               </div>
                <div class="row p-4 modaloddrow">
                <div class="col-md-6"> <label class="checkboxcontainer">
                    <input type="checkbox"  id="medicineavailability" name="medicineavailability" >
                    <span class="checkmark"></span>
                     <span class="pl-5">If yes, whether available ?</span>
                </label></div>
                <div class="col-md-3">If yes, list of medicines</div><div class="col-md-3">
                  <textarea name="medicinedetails" id="medicinedetails"></textarea>
                </div>
                 
               </div>
                <div class="row p-4 modalevenrow" >
                <div class="col-md-3">Symptoms - list</div>
                <div class="col-md-3">
                  @if(isset($symtomlist))
                      @foreach($symtomlist as $symtomlists)
                    <input type="checkbox" name="symptomsdetails[]" id="{{ $symtomlists->name }}" value="{{ $symtomlists->name }}">
                    <label for="{{ $symtomlists->name }}">{{ $symtomlists->name }}</label><br>
                    @endforeach
                    @endif
                </div>
                <div class="col-md-6"> <label class="checkboxcontainer">
                    <input type="checkbox"  id="medicheckup" name="medicheckup">
                    <span class="checkmark"></span>
                     <span class="pl-5">Medical checkup at airport Y/N </span>
                </label></div>
                 

                 <div class="row p-4 modaloddrow">
                <div class="col-md-3"> 
                  <label class="radiocontainer eng_xsm"> <span class="text-darkslategray"> Home Quarantine </span>
                <input type="radio" name="type" value="2" class="typeradio">
                <span class="radiocheckmark"></span>
              </label> 

               </div>
               <div class="col-md-3"> 
                  <label class="radiocontainer eng_xsm"> <span class="text-darkslategray"> Govt. Quarantine </span>
                <input type="radio" name="type" value="2" class="typeradio">
                <span class="radiocheckmark"></span>
              </label> 

               </div>
                <div class="col-md-3">Recommended number of days in quarantine</div>
                <div class="col-md-3 ">
                  <input type="text" name="cominghighriskplace" id="cominghighriskplace">
                </div>
               </div>
               <div class="row p-4 modalevenrow " >
                <div class="col-12 d-flex justify-content-end">
                   <input type="hidden" name="hidden_id" id="hidden_id" value="{{ $listdatas->_id }}" />
                  <button class="btn btn-primary btn-flat" type="submit" id="button-addon2">
                  &nbsp;&nbsp;<span class="text-white eng_xxs"> ADD  </span>
                  </button>
                </div></div>
               <!------------------------------------------------------------------>
          </div> <!-- ./col12 -->
       

        </div> <!-- ./row -->
      </div> <!-- ./cardbody -->
    </div> <!-- ./card -->
  </div> <!-- ./col12 -->
  </div> <!-- ./row -->
</div>
  @endforeach
@endif

   </form>
</div> <!-- ./container -->




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
        url: "{{ route('searchdata') }}",
    },
    columns: [
        
      {
          name: 'name',
          defaultContent: '',
          data: 'name',
          title: 'name'
      },
      
      {
          name: 'action',
          defaultContent: '',
          data: 'action',
          title: '',
          orderable: false
      }
    ]
    });

    $("#transactionbutton").click(function(event){ 
      event.preventDefault();
      $('.modal-title').text('Search Entry');
      $('#actionbutton').val('Search');
      $('#action').val('Add');
      $('#ajaxformresults').html('');
      $("#transactionmodal").modal('show');
      

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

     $('#ajaxmodalform').on('submit', function(event){
      event.preventDefault();
      var action_url = '';

      if($('#passportnumber').val() == ''){
        alert("Name id Required!")
        $('#passportnumber').focus();
      } else {
          if($('#action').val() == 'Add')
              action_url = "{{ route('searchdata') }}";

          if($('#action').val() == 'Edit')
              action_url = "";

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
        }    
  }); 

     $(document).on('click', '.edit', function(){
      var id = $(this).attr('id');
      $('#ajaxformresults').html('');
      $.ajax({
       url :""+id,
       dataType:"json",
       success:function(data)
        {
            $('#name').val(data.userdata.name);
            

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
            url:""+element_id,
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
      
  });/*--end of document.ready--*/
  </script>
@endsection
