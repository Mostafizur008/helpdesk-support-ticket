@extends('backend.dashboard.user.main')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Profile</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/backend/dashboard/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-body">
           

            <form action="{{route('profile.updated')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Name</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="name" value="{{$users->name}}" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Email</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="email" value="{{$users->email}}" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Logo Upload</label>
                            <input type="file" class="form-control" id="formrow-firstname-input" name="images" value="{{$users->image}}">
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
