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
                <form method="post" action="{{ route('notice.update',$notice->id) }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-body">
                        <div class="row col-md-12 pr-0">
                    	<div class="col-md-3"></div>
                            <div class="col-md-6 pr-0">
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input name="title" type="text" id="firstName" class="form-control" value="{{$notice->title}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Description</label>
                                    <textarea rows="3" name="description" class="form-control">{{ $notice->description }}</textarea>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Notice Date</label>
                                    <input name="notice_date" type="notice_date" id="firstName" class="form-control" value="{{$notice->notice_date}}">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Attachment</label>
                                    <input name="attachment" type="file" id="firstName" class="form-control">
                                </div>
                                <div class="form-group ">
                                    <label class="control-label">Status</label>
                                    <select class="form-control custom-select" name="status">
                                        @if($notice->status == 'Active')
                                        <option value="{{ '1' }}">Active</option>
                                        <option value="{{ '0' }}">Inactive</option>
                                        @else
                                        <option value="{{ '0' }}">Inactive</option>
                                        <option value="{{ '1' }}">Active</option>
                                        @endif
                                    </select>
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