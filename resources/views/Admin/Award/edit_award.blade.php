@extends('home')

@section('content')

<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Employee Information Form</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('award.update',$award->id) }}">
                    @method('patch')
                    @csrf
                    <div class="form-body">
                        <h3 class="card-title">Person Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Employee Name</label>
                                    <select class="form-control custom-select" required name="employee_name">
                                        <option>{{ $award->employee_name }}</option>
                                        <hr>
                                        @php $employee = DB::table('employee')->get() @endphp
                                        @foreach($employee as $employee_data)
                                        <option>{{ $employee_data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Award Name</label>
                                    <input name="award_name" type="text" id="firstName" class="form-control" placeholder="John doe" value="{{$award->award_name}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Gift Item</label>
                                    <input name="gift_item" type="text" id="firstName" class="form-control" placeholder="John doe" value="{{$award->gift_item}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Cash Price</label>
                                    <input name="cash_price" type="text" id="firstName" class="form-control" placeholder="John doe" value="{{$award->cash_price}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Month</label>
                                    <input name="month" type="text" id="firstName" class="form-control" placeholder="John doe" value="{{$award->month}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Year</label>
                                    <input name="year" type="text" id="firstName" class="form-control" placeholder="John doe" value="{{$award->year}}">
                                </div>
                            </div>
                            <!--/span-->
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
    <div class="col-lg-3"></div>
</div>

@endsection