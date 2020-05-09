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

 <div class="row p-1 ">
    <div class="col-12 pt-3">
      <div class="alert bg-gray btn-point" role="alert">
         <i class="fas fa-list-alt"></i>&nbsp; Home Quarantine List
      </div> <!-- ./alert -->
    </div> <!-- ./col12 -->
  </div> <!-- ./row -->
  @if(Auth::user()->usertype == 'Data entry operator')
  <form action="{{ route('deo.filterhousevisitlist') }}" name="housevisitlist" method="post">
  @elseif(Auth::user()->usertype == 'Lsg official')  
  <form action="{{ route('lsg.filterhousevisitlist') }}" name="housevisitlist" method="post">
  @elseif(Auth::user()->usertype == 'phcmo')  
  <form action="{{ route('phc.filterhousevisitlist') }}" name="housevisitlist" method="post">  
  @endif
    @csrf
  <div class="row p-1 ">
    <div class="col-12 pt-3">
      <div class="alert bg-gray btn-point" role="alert">
        <div class="row">
         <div class="col-4 pt-3">
          <input type="text" name="fromdate" id="fromdate" placeholder="From Date" value="@if(isset($listdatas)) {{ $frmdt  }} @else {{ Carbon\Carbon::today()->subDays(7)->format('d/m/Y')  }} @endif" class="form-control btn-point dob">
         </div>
         <div class="col-4 pt-3">
          <input type="text" name="todate" id="todate" placeholder="To Date" value="@if(isset($listdatas)) {{ $todt  }} @else {{ Carbon\Carbon::now()->format('d/m/Y')  }} @endif" class="form-control btn-point dob">
         </div>
         <div class="col-4 pt-3">
          <button type="submit" class="btn btn-point btn-flat btn-success" id="searchbutton" name="searchbutton">
          <i class="fas fa-filter"></i>&nbsp;Filter</button>
         </div>
       </div>
      </div> <!-- ./alert -->
    </div> <!-- ./col12 -->
  </div> <!-- ./row -->
</form>
  <div class="row pt-1">
  <div class="col-12">
@if(isset($listdatas))
  <span class="eng_xxs text-darkslategray">
         <font class="text-danger">  Home Quarantine List : From {{ $frmdt }} To {{ $todt }}  </font>
         </span><br/>
    <div class="table-responsive" >
      <table class="table table-sm table-bordered table-striped" id="master_table">
        <thead>
          <th class="eng_xxxxs text-darkslategray"> #</th>
          <th class="eng_xxxxs text-darkslategray"> Name </th>
          <th class="eng_xxxxs text-darkslategray"> Mobile</th>
          <th class="eng_xxxxs text-darkslategray"> </th>
          <th class="eng_xxxxs text-darkslategray"> Ward</th>
          <th class="eng_xxxxs text-darkslategray"> </th>
        </thead> 
       <tbody>
        @php
        $i = 1;
        @endphp
        @foreach($listdatas as $listdata)
        <tr>
        <td class="eng_xxxs text-darkslategray"> {{ $i }}
         </td>
         <td class="eng_xxxs text-darkslategray"> {{ $listdata->name }} 
         </td>
         <td class="eng_xxxs text-darkslategray"> {{ $listdata->mobilenumber }}
         </td>
         <td class="eng_xxxs text-darkslategray"> 
         </td>
         <td class="eng_xxxs text-darkslategray"> {{ $listdata->ward }}
         </td>
         <td class="eng_xxxs text-darkslategray">
         </td>
       </tr>
         @php
         $i++
         @endphp
         @endforeach
       </tbody> 
      </table>
    </div> <!-- ./table-responsive -->
@else
<div class="alert bg-lightsalmon text-navy eng_m" role="alert"> No records found </div>
@endif
 </div> <!-- ./col12 -->
</div> <!-- ./row -->
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

 $('.dob').inputmask("date",{
    mask: "1/2/y",
    placeholder: "dd-mm-yyyy",
    leapday: "-02-29",
    separator: "/",
    alias: "dd/mm/yyyy"
}); 

$('#master_table').DataTable( {
    responsive: true
} );

$('#searchbutton').on('click ', function() {
  var from = $("#fromdate").val();
  var to = $("#todate").val();
  if(from==''){
    alert("From Date is Required!!");
    $("#fromdate").focus();
    return false;
  } else {
    if(to==''){
      alert("To Date is Required!!");
      $("#todate").focus();
       return false;
    }
    else {
      if(from>to){
        $("#fromdate").val('');
        $("#todate").val('');
        alert("From Date Cannot be greater than To Date!!")
         return false;
      }
    }

  }
    
});
/*---------------------------------- End of Document Ready ---------------------------*/
});
</script>
@endsection
