<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Priority;
use App\Models\Department;
use App\Models\ViaTicket;
use App\Models\Ticket;
use App\Models\User;
use App\Mail\sendMail;
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
        $userId = Auth::id();
        $allData = Ticket::with(['via.sender', 'user']) ->where('user_id', $userId)->latest()->paginate(5);
        // $reply = $allData->first() ? $allData->first()->via()->with('sender')->latest()->limit(10)->get() : [];
        return view('backend.dashboard.user.page.ticket', compact('allData'));
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

    public function reEdit($ticket_no)
    {
        $allData = Ticket::with(['comments'])->where('ticket_no', $ticket_no)->first();

        // dd($allData->ticket_no);
    
        return view('backend.dashboard.user.page.reply', compact('allData'));
    }

    public function reUpdate(Request $request,$ticket_no)
    {
        $ticket = Ticket::where('ticket_no', $ticket_no)->first();

        $data = new ViaTicket();
        $data->type = 1;
        $data->comment = $request->comment;
        $data->ticket_id = $ticket->ticket_no;
        $data->sender_id = Auth::id();

        $data->save();

        // dd($data); 

        $emailData = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'comment' => $request->comment
        ];
        Mail::to(Auth::user()->email)->send(new sendMail($emailData));

        $notification = array(
            'message' => 'Reply Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('res', $ticket->ticket_no)->with($notification);
    }

    public function indexProfile()
    {
        $userId = Auth::id();
        return view('backend.dashboard.user.page.profile')->with('users',User::where('role',0)->where('id', $userId)->first());
    }

    public function ProfileUpdate(Request $request)
    {
            $settings = Auth::user();
            $settings->name = $request->name;
            $settings->email = $request->email;
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                if ($settings->image && file_exists(public_path('backend/all-images/web/logo/'.$settings->image))) {
                    @unlink(public_path('backend/all-images/web/logo/'.$settings->image));
                }
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('backend/all-images/web/logo/'), $filename);
                $settings->image = $filename;
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
