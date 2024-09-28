@extends('backend.dashboard.admin.main')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Via Ticket</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/backend/dashboard/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Via Ticket</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               {{-- <div class="col-12" align="right">
                <a class="btn btn-primary" href="{{route('add.priority')}}">Add Priority</a>
               </div><br/> --}}
                <table id="datatable" class="table table-bordered dt-responsive">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Ticket No</th>
                        <th>Subject</th>
                        <th>Priority</th>
                        <th>Departemt</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    @foreach ($allData as $key=>$channel)
                    <tbody>
                        <tr>
                            <td>#{{$key+1}}</td>
                            <td>{{$channel->ticket_no}}</td>
                            <td>{{$channel->subject}}</td>
                            <td>{{$channel->priority->name}}</td>
                            <td>{{$channel->department->name}}</td>
                            <td>{{$channel->created_at}}</td>
                            <td>
                                @if($channel->status == 1)
                                <span class="btn btn-sm btn-primary">Open</span>
                                @elseif($channel->status == 0)
                                    <span class="btn btn-sm btn-secondary">Closed</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>

@endsection