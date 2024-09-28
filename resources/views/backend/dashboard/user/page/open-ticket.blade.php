@extends('backend.dashboard.user.main')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Open Ticket</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/backend/dashboard/user">Dashboard</a></li>
                    <li class="breadcrumb-item active">Open Ticket</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
           

            <form action="{{route('store.ticket')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="department-select" class="form-label">Department</label>
                            <select class="form-select" id="department-select" name="department_id">
                                <option selected disabled>Choose...</option>
                                @foreach($department as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="priority-select" class="form-label">Priority</label>
                            <select class="form-select" id="priority-select" name="priority_id">
                                <option selected disabled>Choose...</option>
                                @foreach($priority as $pri)
                                    <option value="{{ $pri->id }}">{{ $pri->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="subject" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">File Upload</label>
                            <input type="file" class="form-control" id="formrow-firstname-input" name="images">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="formrow-firstname-input" name="details" placeholder="Enter Desprition"></textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-12" align="right">
                        <input type="submit" class="btn btn-success waves-effect waves-light">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection