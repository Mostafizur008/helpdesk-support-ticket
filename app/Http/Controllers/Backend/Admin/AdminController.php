<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Priority;
use App\Models\Department;
use App\Models\Ticket;
use App\Models\ViaTicket;
use App\Mail\sendMail;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pending = Ticket::where('status', 1)->count();
        $close = Ticket::where('status', 0)->count();
        $all = Ticket::count();
        return view('backend.dashboard.admin.index', compact('user','pending','close','all'));
    }

    public function indexPriority()
    {
        $allData = Priority::all();
        return view('backend.dashboard.admin.page.priority',compact('allData'));
    }

    public function pStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $data = new Priority();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('priority');
    }

    public function pEdit($id)
    {
        $allData = Priority::all();
        $editData = Priority::find($id);
    
        return view('backend.dashboard.admin.page.priority', compact('allData', 'editData'));
    }

    public function pUpdate(Request $request,$id)
    {
        $data = Priority::find($id);
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Priority Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('priority')->with($notification);
    }

    public function destroy($id)
    {
        $all = Priority::find($id);
    
        if ($all) {
            $all->delete();
            session()->flash('message', 'Priority deleted successfully!');
            session()->flash('alert-type', 'success');
    
            return redirect()->route('priority');
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Priority Found.'
            ]);
        }
    }
    

    public function indexDepartment()
    {
        $allData = Department::all();
        return view('backend.dashboard.admin.page.department',compact('allData'));
    }

    public function dStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $data = new Department();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('department');
    }

    public function dEdit($id)
    {
        $allData = Department::all();
        $editData = Department::find($id);
    
        return view('backend.dashboard.admin.page.department', compact('allData', 'editData'));
    }

    public function dUpdate(Request $request,$id)
    {
        $data = Department::find($id);
        $data->name = $request->name;

        $data->save();
        $notification = array(
            'message' => 'Department Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('department')->with($notification);
    }

    public function destroy2($id)
    {
        $all = Department::find($id);
    
        if ($all) {
            $all->delete();
            session()->flash('message', 'Department deleted successfully!');
            session()->flash('alert-type', 'success');
    
            return redirect()->route('department');
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No department Found.'
            ]);
        }
    }


    public function indexTicket()
    {
        $allData = Ticket::with(['via.sender', 'user'])->where('status', 1)->latest()->paginate(5);
        return view('backend.dashboard.admin.page.ticket', compact('allData'));
    }

    public function indexCloseTicket()
    {
        $allData = Ticket::with(['via.sender', 'user'])->where('status', 0)->latest()->paginate(5);
        return view('backend.dashboard.admin.page.close-ticket', compact('allData'));
    } 

    public function indexSetting()
    {
        return view('backend.dashboard.admin.page.setting')->with('settings',Setting::first());
    } 

    public function indexProfile()
    {
        $userId = Auth::id();
        return view('backend.dashboard.admin.page.profile')->with('users',User::where('role',1)->where('id', $userId)->first());
    }

    public function replyTicket()
    {
        $allData = Ticket::with(['via.sender', 'user'])->where('status', 1)->latest()->paginate(5);
        return view('backend.dashboard.admin.page.reply-ticket', compact('allData'));
    }

    public function rEdit($ticket_no)
    {
        $allData = Ticket::where('status', 1)->get();

        $editData = Ticket::with(['comments'])->where('ticket_no', $ticket_no)->first();
        // dd($editData);
        return view('backend.dashboard.admin.page.reply-ticket', compact('allData', 'editData'));
    }

    public function rUpdate(Request $request,$ticket_no)
    {
        $ticket = Ticket::where('ticket_no', $ticket_no)->first();
        $ticket->status = $request->status;
        $ticket->save();

        $data = new ViaTicket();
        $data->type = 1;
        $data->comment = $request->comment;
        $data->ticket_id = $ticket->ticket_no;
        $data->sender_id = Auth::id();

        $data->save();

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
        return redirect()->route('r.ticket')->with($notification);
    }


    public function SettingUpdate(Request $request)
    {
            $settings = Setting::first();
            $settings->name = $request->name;
            $settings->phone = $request->phone;
            $settings->address = $request->address;
            $settings->email = $request->email;
            
            if($request->file('images')){
                $file= $request->file('images');
                @unlink(public_path('backend/all-images/web/logo/'.$settings->images));
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/all-images/web/logo/'), $filename);
                $settings['images']= $filename;
            }

            if($request->file('icon')){
                $file= $request->file('icon');
                @unlink(public_path('backend/all-images/web/logo/icon/'.$settings->icon));
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/all-images/web/logo/icon/'), $filename);
                $settings['icon']= $filename;
            }

            $settings->save();

        return redirect()->route('setting.update');
    }

    public function ProfileUpdateAdmin(Request $request)
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

        return redirect()->route('profile.view_admin');
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
    public function destroy1(string $id)
    {
        //
    }
}
