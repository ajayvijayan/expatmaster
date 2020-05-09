@extends('layouts.app')
@section('content')
<div class="container ui_innerpage">
    <div class="row p-1">
        <div class="col-12">
            <div class="card">
                  <div class="card-header h4  text-sienna">
                     <i class="fas fa-sliders-h "></i> &nbsp;&nbsp; 
                  </div> <!-- ./card-header -->
                  <div class="card-body">
                    <div class="row">

                       <!-- -------------------------------- Start of Widget Item --------------------------------- -->
                        <div class="col-md-4 p-2">
                        <!-- ---------------- start of card --- ------------------------ -->
                          <div class="card ">
                            <div class="row no-gutters">
                            <div class="col-md-4 d-flex justify-content-center py-4 rightbordercard text-sienna">
                                <i class="fas fa-plus-square"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('deo.movetohospitalpage') !!}"> Move to Institution Quarantine </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> FORM </small></p>
                            </div> <!-- end of card-body -->
                            </div> <!-- end of col8 -->
                            </div> <!-- end of row -->
                          </div>  <!-- end of card -->
                          <!-- ---------------- start of card --- ------------------------ -->
                      </div> <!-- end of col3/4 -->
                    <!-- -------------------------------- End of Widget Item --------------------------------- -->
                      <!-- -------------------------------- Start of Widget Item --------------------------------- -->
                      <div class="col-md-4 p-2">
                        <!-- ---------------- start of card --- ------------------------ -->
                          <div class="card ">
                            <div class="row no-gutters">
                            <div class="col-md-4 d-flex justify-content-center py-4 rightbordercard text-sienna">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('deo.updateexistingentry') !!}"> Update Existing Entry </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> FORM </small></p>
                            </div> <!-- end of card-body -->
                            </div> <!-- end of col8 -->
                            </div> <!-- end of row -->
                          </div>  <!-- end of card -->
                          <!-- ---------------- start of card --- ------------------------ -->
                      </div> <!-- end of col3/4 -->
                      <!-- -------------------------------- End of Widget Item --------------------------------- -->
                      <!-- -------------------------------- Start of Widget Item --------------------------------- -->
                      <div class="col-md-4 p-2">
                        <!-- ---------------- start of card --- ------------------------ -->
                          <div class="card ">
                            <div class="row no-gutters">
                            <div class="col-md-4 d-flex justify-content-center py-4 rightbordercard text-sienna">
                                <i class="fas fa-list-alt"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('deo.institutionlist') !!}"> Institution Quarantine List </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> LIST </small></p>
                            </div> <!-- end of card-body -->
                            </div> <!-- end of col8 -->
                            </div> <!-- end of row -->
                          </div>  <!-- end of card -->
                          <!-- ---------------- start of card --- ------------------------ -->
                      </div> <!-- end of col3/4 -->
                      <!-- -------------------------------- End of Widget Item --------------------------------- -->
                      <!-- -------------------------------- Start of Widget Item --------------------------------- -->
                      <div class="col-md-4 p-2">
                        <!-- ---------------- start of card --- ------------------------ -->
                          <div class="card ">
                            <div class="row no-gutters">
                            <div class="col-md-4 d-flex justify-content-center py-4 rightbordercard text-sienna">
                                <i class="fas fa-list-alt"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('deo.inhouselist') !!}">Home Quarantine List</a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> LIST </small></p>
                            </div> <!-- end of card-body -->
                            </div> <!-- end of col8 -->
                            </div> <!-- end of row -->
                          </div>  <!-- end of card -->
                          <!-- ---------------- start of card --- ------------------------ -->
                      </div> <!-- end of col3/4 -->
                      <!-- -------------------------------- End of Widget Item --------------------------------- -->
                       <!-- -------------------------------- Start of Widget Item --------------------------------- -->
                      <div class="col-md-4 p-2">
                        <!-- ---------------- start of card --- ------------------------ -->
                          <div class="card ">
                            <div class="row no-gutters">
                            <div class="col-md-4 d-flex justify-content-center py-4 rightbordercard text-sienna">
                                <i class="fas fa-list-alt"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('deo.movedHQtoIQ') !!}">Moved Expats <br/>HQ To IQ</a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> LIST </small></p>
                            </div> <!-- end of card-body -->
                            </div> <!-- end of col8 -->
                            </div> <!-- end of row -->
                          </div>  <!-- end of card -->
                          <!-- ---------------- start of card --- ------------------------ -->
                      </div> <!-- end of col3/4 -->
                      <!-- -------------------------------- End of Widget Item --------------------------------- -->
                       <!-- -------------------------------- Start of Widget Item --------------------------------- -->
                      <div class="col-md-4 p-2">
                        <!-- ---------------- start of card --- ------------------------ -->
                          <div class="card ">
                            <div class="row no-gutters">
                            <div class="col-md-4 d-flex justify-content-center py-4 rightbordercard text-sienna">
                                <i class="fas fa-list-alt"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('deo.movedIQtoHQ') !!}">Moved Expats <br/>IQ To HQ</a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> LIST </small></p>
                            </div> <!-- end of card-body -->
                            </div> <!-- end of col8 -->
                            </div> <!-- end of row -->
                          </div>  <!-- end of card -->
                          <!-- ---------------- start of card --- ------------------------ -->
                      </div> <!-- end of col3/4 -->
                      <!-- -------------------------------- End of Widget Item --------------------------------- -->
                   
                                    
                    </div> <!-- ./row -->
                  </div> <!-- ./card-body -->
            </div> <!-- ./card -->
        </div> <!-- ./col12 -->
    </div> <!-- ./row -->
</div> <!-- ./container -->
@endsection