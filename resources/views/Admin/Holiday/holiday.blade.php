@extends('home')

@section('content')

@include('_partial.message')
    <div class="card">
    <div class="card-body">
        {{-- Left Content --}}
        <div class="col-xlg-2 col-lg-4 col-md-12">
            <div class="card-body inbox-panel text-white text-center"><a class="btn btn-info m-b-20 p-10 btn-block waves-effect waves-light">Select Month</a>
                <ul class="list-group list-group-full nav">
                    <li class="list-group-item active"> 
                        <a href="1" class="month">January </a>
                    </li>
                    <li class="list-group-item">
                        <a href="2" class="month">February </a>
                    </li>
                    <li class="list-group-item">
                        <a href="3" class="month">March </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="4" class="month">April </a>
                    </li>
                    <li class="list-group-item">
                        <a href="5" class="month">May </a>
                    </li>
                    <li class="list-group-item">
                        <a href="6" class="month">June </a>
                    </li>
                    <li class="list-group-item">
                        <a href="7" class="month">July </a>
                    </li>
                    <li class="list-group-item">
                        <a href="8" class="month">August </a>
                    </li>
                    <li class="list-group-item">
                        <a href="9" class="month">September </a>
                    </li>
                    <li class="list-group-item">
                        <a href="10" class="month">October </a>
                    </li>
                    <li class="list-group-item">
                        <a href="11" class="month">November </a>
                    </li>
                    <li class="list-group-item">
                        <a href="12" class="month">December </a>
                    </li>
                </ul>
            </div>
        </div> 
        {{-- End Left Content --}}
        <div class="table-responsive m-t-40 col-xlg-10 col-lg-8 col-md-8">
            <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#myModal">+ Add New Holiday</button>

        <h4 class="card-title">Monthly Holiday List</h4>
            <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>SL.NO</th>
                        <th>Holidays Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="holiday_table">
                        
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title float-left">Holidays Form</h4>
        </div>
        <div class="modal-body">
          <div class="card-body">
                <form method="post" action="{{ route('holiday.store') }}" class="form-horizontal">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Holiday Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="holiday_name" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date</label>
                                    <div class="col-md-9">
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-offset-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $( '.nav li' ).removeClass( 'active' );
        
        $(function() {
            $( '.nav li' ).on( 'click', function() {
                $( this ).parent().find( 'li.active' ).removeClass( 'active' );
                $( this ).addClass( 'active' );
            });
        });
    });

    $(document).ready(function(){
        $('.list-group-item').on("click",".month",function(event){
           event.preventDefault();
            var allmonth = $(this).attr('href');
        
            $.ajax({
                url:'/holiday_data',
                type:'post',
                data:{
                    "_token": "{{ csrf_token() }}",
                    "allmonth":allmonth
                },
                success:function(data){
                    $("#holiday_table").html(data);
                }
            });
        });
    });
</script>
@endsection