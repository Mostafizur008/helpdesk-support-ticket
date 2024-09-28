@extends('backend.dashboard.admin.main')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Site Setting</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/backend/dashboard/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Site Setting</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
           

            <form action="{{route('setting.updated')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Site Title</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="name" value="{{$settings->name}}" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Address</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="address" value="{{$settings->address}}" placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="phone" value="{{$settings->phone}}" placeholder="Enter Phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Email</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="email" value="{{$settings->email}}" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Logo Upload</label>
                            <input type="file" class="form-control" id="formrow-firstname-input" name="images" value="{{$settings->images}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Icon Upload</label>
                            <input type="file" class="form-control" id="formrow-firstname-input" name="icon" value="{{$settings->icon}}">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-12" align="right">
                        <input type="submit" class="btn btn-success waves-effect waves-light" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
