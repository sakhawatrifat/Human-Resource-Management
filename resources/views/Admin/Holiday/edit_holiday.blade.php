@extends('home')

@section('content')
@include('_partial.message')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Employee Information Form</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('holiday.update',$holiday->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-body">
                        <div class="row col-md-12 pr-0">
                    	<div class="col-md-3"></div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label class="control-label">Holiday Name</label>
                                    <input name="holiday_name" type="text" id="firstName" class="form-control" placeholder="John doe" value="{{$holiday->holiday_name}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Date</label>
                                    <input name="date" type="date" id="firstName" class="form-control" placeholder="John doe" value="{{$holiday->date}}">
                                </div>
                            </div>
                           <div class="col-md-3 pr-0"></div>
                    	</div>
                    </div>

                    <div class="form-actions text-center">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                        <a href="{{ route('award.index') }}">
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection