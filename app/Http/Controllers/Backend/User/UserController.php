<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Priority;
use App\Models\Department;
use App\Models\ViaTicket;
use App\Models\Ticket;
use App\Models\User;
use App\Mail\TicketReplyMail;
use Illuminate\Support\Facades\Mail;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pending = Ticket::where('status', 1)->where('user_id', $userId)->count();
        $close = Ticket::where('status', 0)->where('user_id', $userId)->count();
        $all = Ticket::where('user_id', $userId)->count();
        return view('backend.dashboard.user.index', compact('pending', 'close', 'all'));
    }


    public function ticket()
    {
        $allData = Ticket::with(['via.sender', 'user'])->latest()->paginate(5);
        $reply = $allData->first() ? $allData->first()->via()->with('sender')->latest()->limit(10)->get() : [];
        return view('backend.dashboard.user.page.ticket', compact('allData', 'reply'));
    }

    public function openTicket()
    {
        $department = Department::all();
        $priority = Priority::all();
        return view('backend.dashboard.user.page.open-ticket', compact('department', 'priority'));
    }

    public function storeTicket(Request $request)
    {
        $validatedData = $request->validate([
            'department_id' => 'required',
            'priority_id' => 'required',
            'subject' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'details' => 'required',
        ]);

        $data = new Ticket();
        $data->department_id = $request->department_id;
        $data->priority_id = $request->priority_id;
        $data->subject = $request->subject;
        $data->images = $request->images;
        $data->details = $request->details;
        $data->user_id = Auth::id();
        $data->save();

        return redirect()->route('ticket')->with('success', 'Ticket created successfully!');
    }

    public function reEdit($id)
    {
        $allData = Ticket::with('comments')->leftJoin('via_tickets','tickets.id','via_tickets.ticket_id')
        ->select('via_tickets.*','tickets.*')
        ->where('tickets.status', 1)
        ->where('tickets.id', $id)
        ->first();

        // Mail::to('mostafizur.rahman0888@gmail.com.com')->send(new TicketReplyMail($editData));
    
        return view('backend.dashboard.user.page.reply', compact('allData'));
    }

    public function reUpdate(Request $request,$id)
    {
        $ticket = Ticket::find($id);

        $data = new ViaTicket();
        $data->type = 1;
        $data->comment = $request->comment;
        $data->ticket_id = $ticket->id;;
        $data->sender_id = Auth::id();

        $data->save();
        $notification = array(
            'message' => 'Reply Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('reEdit', $ticket->id)->with($notification);
    }

    public function indexProfile()
    {
        return view('backend.dashboard.user.page.profile')->with('users',User::where('role',0)->first());
    }

    public function ProfileUpdate(Request $request)
    {
            $settings = Auth::user();
            $settings->name = $request->name;
            $settings->email = $request->email;
            
            if($request->file('image')){
                $file= $request->file('image');
                @unlink(public_path('backend/all-images/web/logo/'.$settings->image));
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/all-images/web/logo/'), $filename);
                $settings['image']= $filename;
            }

            $settings->save();

        return redirect()->route('profile.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
