@extends('backend.dashboard.user.main')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Ticket Reply</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/backend/dashboard/admin">Dashboard</a></li>
                    <li class="breadcrumb-item active">Ticket Reply</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('ret', $allData->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($editData))
                        @method('PUT')
                    @endif
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="card-title mb-4">Comment Reply</h4>
                    </div>
                </div>
                
                    <div class="mb-3">
                        <table  class="table table-bordered dt-responsive">
                            <thead>
                            <tr>
                                <th>Ticket No</th>
                                <th>Priority</th>
                                <th>Department</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    @if(isset($allData) && $allData)
                                        <tr>
                                            <td>{{ $allData->ticket_no }}</td>
                                            <td>{{ $allData->priority->name }}</td>
                                            <td>{{ $allData->department->name }}</td>
                                            <td><font color="red">{{ $allData->created_at->diffForHumans() }}</font></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Subject: {{ $allData->subject }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Details: <br/>{{ $allData->details }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No data available.</td>
                                        </tr>
                                    @endif
                                    @php
                                    $counter = 0;
                                @endphp
                                
                                @foreach ($allData->comments as $item)
                                    @php
                                        $counter++;
                                    @endphp
                                    <tr>
                                        @if($counter % 2 == 1)
                                            <td colspan="4" style="text-align: left;">
                                                <div class="btn btn-sm btn-info">{{ $item->sender->name }}</div> - 
                                                <font color="red">{{ $item->created_at->diffForHumans() }}</font> 
                                                <br/>{{ $item->comment }}
                                            </td>
                                        @else
                                            <td colspan="4" style="text-align: right;">
                                                <font color="red">{{ $item->created_at->diffForHumans() }}</font> - <div class="btn btn-sm btn-info">{{ $item->sender->name }}</div>
                                                <br/>{{ $item->comment }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                
                                    </tbody>
                                    
                            </tbody>
                        
                        </table>
                    </div>

                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Comment</label>
                        <textarea class="form-control" id="formrow-firstname-input" required name="comment" placeholder="Enter Comment"></textarea>
                    </div>

                    <div>
                        <div class="col-12" align="right">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="{{ isset($editData) ? 'Reply' : 'Reply' }}">
                        </div>
                    </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
