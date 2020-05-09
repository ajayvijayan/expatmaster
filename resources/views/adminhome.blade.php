@extends('layouts.app')
@section('content')
<div class="container ui_innerpage">
    <div class="row p-1">
        <div class="col-12">
            <div class="card">
                  <div class="card-header h4  text-sienna">
                     <i class="fas fa-sliders-h "></i> &nbsp;&nbsp; Master settings
                  </div> <!-- ./card-header -->
                  <div class="card-body">
                    <div class="row">

                       <!-- -------------------------------- Start of Widget Item --------------------------------- -->
                        <div class="col-md-4 p-2">
                        <!-- ---------------- start of card --- ------------------------ -->
                          <div class="card ">
                            <div class="row no-gutters">
                            <div class="col-md-4 d-flex justify-content-center py-4 rightbordercard text-sienna">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('admin.usertypelistpage') !!}"> User Type </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('admin.userlistpage') !!}"> Users </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('admin.ailmentlistpage') !!}"> Ailment </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('admin.transitpointlistpage') !!}"> Transit Points </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('qlocation') !!}"> Quarantine Location Type </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('symptom') !!}"> Symtoms </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('quarantinelocation') !!}"> Quarantine Location </a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('usertypelist') !!}"> Transit Type</a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="col-8 leftbordercard">
                            <div class="card-body">
                                  <h5 class="card-title">
                                   <a class="no_link  text-sienna" href="{!! route('reportlistpage') !!}"> User Transit List</a>
                                  </h5>
                                  <p class="card-text"><small class="text-muted"> NUMBER </small></p>
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