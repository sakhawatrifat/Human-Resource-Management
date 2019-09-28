@extends('home')

@section('content')
    
    <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-lg-6">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Other Sample form</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('designation.update',$designation->id) }}">
                        @method('patch')
                        @csrf
                        <div class="form-body">
                            <h3 class="card-title">Person Info</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Designation</label>
                                        <input name="designation_name" type="text" id="firstName" class="form-control" placeholder="John doe" value="{{$designation->designation_name}}">
                                    </div>
                                </div>
                                <!--/span-->
                        </div>
                        <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>

                            <a href="{{ route('designation.index') }}">
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