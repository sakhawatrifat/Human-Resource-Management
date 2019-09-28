@extends('home')

@section('content')
<div class="row">
	<div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">New Holiday Form</h4>
            </div>
            <div class="card-body">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        
                        <hr class="m-t-0 m-b-40">
                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Holiday Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="" autofocus="">
                                    </div>
                                </div>
                            </div>

                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3"> </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-success">Submit</button>

                                        <a href="{{ route('holiday.index') }}">
                                        	<button type="button" class="btn btn-inverse">Holiday List</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<div class="col-lg-3"></div>

</div>
@endsection