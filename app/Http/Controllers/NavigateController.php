<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class NavigateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $appointments = Appointment::where('preferred_date',Carbon::now()->format('Y-m-d'))->take(4)->get();
        $count1 = Appointment::where('preferred_date',Carbon::now()->format('Y-m-d'))->count();
        $count2 = Staff::count();
        return view('dashboard',['appointments' => $appointments,'count1'=> $count1, 'count2' => $count2]);
    }

    public function all_staff(){
        $staffs = Staff::latest()->paginate(15);
        return view('all-staff',['staffs' => $staffs]);
    }

    public function add_staff(Request $request){
        $request->validate([
            'passport' => ['required','mimes:png,jpg,jpeg'],
            'staff_id' => 'required|numeric',
            'full_name' => 'required',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'date_of_birth' => 'date|required',
            'gender' => 'required',
            'department' => 'required',
            'top_admin' => 'required'
        ]);

        $destination = 'public/staffs';

        $path = $request->file('passport')->store($destination);

        $staff = new Staff;
        $staff->full_name = $request->full_name ;
        $staff->email = $request->email ;
        $staff->phone = $request->phone ;
        $staff->next_reminder = Carbon::now()->addMonthsWithoutOverflow(3) ;
        $staff->gender = $request->gender ;
        $staff->department = $request->department ;
        $staff->date_of_birth = $request->date_of_birth ;
        $staff->staff_id = $request->staff_id ;
        $staff->passport = str_replace('public/staffs/','',$path);
        $staff->appointment_token = Str::random(64);

        $staff->save();

        return redirect('/all/staffs');
    }

    public function appointments($status){
        if($status == 'Reserved'){
            $statuss = array("Reserved","End");
            $date = Carbon::now()->format('Y-m-d');
        $appointments = Appointment::where('status','Reserved')->where('preferred_date','=',$date)->get();
        // dd($appointments);
        return view('appointments',['appointments' => $appointments,'statuss' => $statuss]);
        }else{
            abort(404);
        }
    }

    public function end_appointments($status){
        if($status == 'end'){
            $statuss = array("Reserved","End");
            $appointments = Appointment::where('preferred_date',Carbon::now()->format('Y-m-d'))->where('status','End')->paginate(15);
        return view('appointments',['appointments' => $appointments,'statuss' => $statuss]);
        }else{
            abort(404);
        }
    }

    public function all_appointment(){
        $statuss = array("Reserved","End");
        $appointments = Appointment::latest()->paginate(15);
        return view('all-appointments',['appointments' => $appointments,'statuss' => $statuss]);
    }

    public function search_appointments(Request $request){
        $statuss = array("Reserved","End");
        $user = Staff::where('staff_id',$request->search)->orWhere('full_name',$request->search)->first();
        $appointments = Appointment::where('staff_id',$user->id)->get();
        return view('search',['appointments' => $appointments,'statuss' => $statuss]);
    }

    public function user_details($id){
        $staffs = Staff::where('id',$id)->first();
        if($staffs){
            $gender = array("male","female");
            return view('user-details',['staffs' => $staffs,'gender' => $gender]);
        }
        abort(404);
    }

    public function staff_update(Request $request){
        $request->validate([
            'staff_id' => 'required|numeric',
            'full_name' => 'required',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'date_of_birth' => 'date|required',
            'gender' => 'required'
        ]);

        $staff = Staff::find($request->id);

        $staff->full_name = $request->full_name ;
        $staff->email = $request->email ;
        $staff->phone = $request->phone ;
        $staff->gender = $request->gender ;
        $staff->date_of_birth = $request->date_of_birth ;
        $staff->staff_id = $request->staff_id ;
        $staff->save();

        return back();
    }

    public function staff_image(Request $request){
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $staff = Staff::find($request->id);

        $destination = 'public/staffs';

        $path = $request->file('image')->store($destination);

        $staff->passport = str_replace('public/staffs/','',$path);
        $staff->save();

        return back();
    }

    public function add_admin(){
        return view('add-admin');
    }

    public function store_admin(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
            'email_address' => 'required|email',
            'full_name' => 'required'
        ]);

        $user = new User;
        $user->password = Hash::make($request->password);
        $user->name = $request->full_name;
        $user->email = $request->email_address;
        $user->top_admin = $request->top_admin;
        $user->save();

        return back();
    }

    public function all_admin(){
        if(auth()->user()->top_admin == 1){
            $staffs = User::where('id','!=',auth()->user()->id)->get();
            return view('all-admin',['staffs' => $staffs]);
        }
        abort(404);
    }

    public function verify_token($token){
        $staff = Staff::where('appointment_token',$token)->first();
        // dd($staff->count());
        if($staff->count() == 0){
            abort(404);
        }else{
            return view('book-appointment',['staff' => $staff]);
        }
    }

    public function store_appointment(Request $request){
        $request->validate([
            'date' => 'required|date'
        ]);

        $staff = Staff::where('appointment_token',$request->token)->first();
        $app = new Appointment;
        $app->preferred_date = $request->date;
        $app->status = 'Reserved';
        $app->staff_id = $staff->id;
        $app->save();

        $staff->appointment_token = Str::random(64);
        $staff->save();

        return redirect('/success');
    }

    public function success(){
        // $token = Crypt::decrypt($token);
        // if($token != 'LASU'){
        //     // dd(Crypt::encrypt('LASU'));
        //     abort(404);
        // }else{
            return view('success');
        // }
    }

    public function change_password(){
        return view('change-password');
    }

    public function store_password(Request $request){
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        auth()->logout();
        return redirect('/login');
    }

    public function reset_password($id){
        $admin = User::find($id);
        $admin->password = Hash::make('password1');
        $admin->save();

        return back();
    }

    public function delete_admin($id){
        $admin = User::find($id);
        $admin->delete();

        return back();
    }

    public function logout(){
        auth()->logout();

        return redirect('/login');
    }

    public function change_status(Request $request){
        $app = Appointment::find($request->id);
        $app->status = $request->status;
        $app->save();

        return back();
    }
}
