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
                <form method="post" action="{{ route('award.update',$award->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-body">
                        <div class="row col-md-12 pr-0">
                        <div class="col-md-3"></div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label>
                                    <select class="form-control custom-select" required name="employee_name">
                                        <option value="{{ $award->emp_id }}">{{ $award->emp_name }}</option>
                                        <hr>
                                        @php $employee = DB::table('employee')->get() @endphp
                                        @foreach($employee as $employee_data)
                                        <option value="{{ $employee_data->employee_id }}">{{ $employee_data->employee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                   <label class="control-label">Award Name</label>
                                    <input name="award_name" type="text" id="firstName" class="form-control" value="{{$award->award_name}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Gift Item</label>
                                    <input name="gift_item" type="text" id="firstName" class="form-control" value="{{$award->gift_item}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Cash Price</label>
                                    <input name="cash_price" type="text" id="firstName" class="form-control" value="{{$award->cash_price}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Month</label>
                                    <input name="month" type="text" id="firstName" class="form-control" value="{{$award->month}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Year</label>
                                    <input name="year" type="text" id="firstName" class="form-control" value="{{$award->year}}">
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