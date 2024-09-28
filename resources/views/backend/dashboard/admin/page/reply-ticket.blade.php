@extends('backend.dashboard.admin.main')
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
    <div class="col-7">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive">
                    <thead>
                    <tr>
                        <th>Ticket No</th>
                        <th>Priority</th>
                        <th>Department</th>
                        <th>UserType</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($allData as $key=>$channel)
                        <tr>
                            <td>{{$channel->ticket_no}} - <font color="red"> {{$channel->created_at->diffForHumans()}} </font></td>
                            <td>{{$channel->priority->name}}</td>
                            <td>{{$channel->department->name}}</td>
                            <td>User</td>
                            <td>
                                <a type="button" href="{{route('r.edit',$channel->id)}}" class="btn btn-sm btn-primary"> <i class="bx bx-pen"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($editData) ? route('rt', $editData->id) : route('r.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($editData))
                        @method('PUT')
                    @endif
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title mb-4">Comment Reply</h4>
                    </div>
                    @if(isset($editData))
                    <div class="col-md-4">
                        <select class="form-select" id="autoSizingSelect" name="status">
                            <option value="" disabled>Status...</option>
                            <option value="1" {{ isset($editData) && $editData->status == 1 ? 'selected' : '' }}>Open</option>
                            <option value="0" {{ isset($editData) && $editData->status == 0 ? 'selected' : '' }}>Close</option>
                        </select>
                    </div>
                    @endif
                </div>
                
                    <div class="mb-3">
                        <table id="datatable" class="table table-bordered dt-responsive">
                            <thead>
                            <tr>
                                <th>Ticket No</th>
                                <th>Priority</th>
                                <th>Department</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($editData))
                                <tr>
                                    <td>{{$editData->ticket_no}}</td>
                                    <td>{{$editData->priority->name}}</td>
                                    <td>{{$editData->department->name}}</td>
                                    <td><font color="red"> {{$editData->created_at->diffForHumans()}} </font></td>
                                </tr>
                                <tr>
                                    <td colspan="4">Subject: {{$editData->subject}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Details: <br/>{{$editData->details}}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No data available.</td>
                                </tr>
                            @endif
                        
                            </tbody>
                        </table>

                        @if(isset($editData->comments) && $editData->comments->count() > 0)
                        @php
                            $counter = 0;
                        @endphp
                    
                        @foreach ($editData->comments as $comment)
                            @php
                                $counter++;
                            @endphp
                    
                            <table style="border: 1px solid black; padding: 10px; margin-bottom: 10px;">
                                @if($counter % 2 == 1)
                                    <div style="text-align: left;">
                                        <div class="btn btn-sm btn-info">{{ $comment->sender->name }}</div> - 
                                        <font color="red">{{ $comment->created_at->diffForHumans() }}</font>
                                        <br/>{{ \Illuminate\Support\Str::words($comment->comment, 35) }}
                                    </div>
                                @else
                                    <div style="text-align: right;">
                                        <font color="red">{{ $comment->created_at->diffForHumans() }}</font> - 
                                        <div class="btn btn-sm btn-info">{{ $comment->sender->name }}</div>
                                        <br/>{{ \Illuminate\Support\Str::words($comment->comment, 35) }}
                                    </div>
                                @endif
                                </table>
                            
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No comments available.</td>
                                    </tr>
                                @endif


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
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
