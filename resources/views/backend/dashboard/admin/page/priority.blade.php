@extends('backend.dashboard.admin.main')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Priority</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/backend/dashboard/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Priority</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
               {{-- <div class="col-12" align="right">
                <a class="btn btn-primary" href="{{route('add.priority')}}">Add Priority</a>
               </div><br/> --}}
                <table id="datatable" class="table table-bordered dt-responsive">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    @foreach ($allData as $key=>$channel)
                    <tbody>
                        <tr>
                            <td>#{{$key+1}}</td>
                            <td>{{$channel->name}}</td>
                            <td>
                                <a type="button" href="{{route('p.edit',$channel->id)}}" class="btn btn-sm btn-primary"> <i class="bx bx-pen"></i></a>
                                <a type="button" href="{{route('p.delete',$channel->id)}}" class="btn btn-sm btn-danger deletebtn"><i class="bx bx-x"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    @if(isset($editData))
                        Edit Priority
                    @else
                        Add Priority
                    @endif
                </h4>

                <form action="{{ isset($editData) ? route('pt', $editData->id) : route('p.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($editData))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Name</label>
                        <input type="text" class="form-control" id="formrow-firstname-input" name="name" placeholder="Enter Name" value="{{ isset($editData) ? $editData->name : '' }}">
                    </div>
                    <div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="{{ isset($editData) ? 'Update' : 'Save' }}">
                            @if(isset($editData))
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection