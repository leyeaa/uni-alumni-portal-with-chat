<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Thread;
use App\Models\Message;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AlumniProfileFormRequest;

class AlumniController extends Controller
{

    //Alumni Registration form
    public function registration(){
        return view('alumni.registration');
    }

    //Alumni Registration Submission and Account creation
    public function register(AlumniProfileFormRequest $request){
        //validate and register alumni
        $request->validated();
        if(DB::connection('mysql2')->table('paymentinvoice')->where('matricno',$request->matricno)->doesntExist()){
            return back()->with('message','Matric No Validation Fail, try again');
        }else{
            //submit data to user table and login
            $user_password = bcrypt($request->password);
            $user = User::create([
                'matricno'=>$request->matricno,
                'name'=>$request->surname." ".$request->other_names,
                'email'=>$request->email,
                'password'=>$user_password
            ]);

            //submit data to profile table
            
            $newImageName = str_replace("/","_",$request->matricno) . '.' . $request->profile_picture->extension();
            AlumniProfile::create([
                'matricno' => $request->matricno,
                'surname'=>$request->surname,
                'other_names'=>$request->other_names,
                'phone'=>$request->phone,
                'position'=>$request->position,
                'employer'=>$request->employer,
                'address'=>$request->address,
                'profile_picture'=>$newImageName,
                'department'=>$request->department,
                'graduation_month'=>$request->graduation_month,
                'graduation_year'=>$request->graduation_year
            ]);
            $this->storeImage($request,$newImageName);

            auth()->login($user);
            return redirect('/directory')->with('message', 'Account Created and Login Successfully');
        }
    }
    //Upload Alumni Profile Image
    private function storeImage($request,$newImageName){
        return $request->profile_picture->move(public_path('profile_pictures'), $newImageName);
    }
    //Logout User
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Account Logout Successfully');
    }
    //Authenticate Alumni Login
    public function authenticate(Request $request){
        $user=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(auth()->attempt($user)){
            $request->session()->regenerate();
            return redirect(route('alumniDetails',Auth::user()->alumniProfile->id))->with('message','You are logged In Successfully');
        }
        return back()->withErrors(['email'=>'Invalid Login Credentials'])->onlyInput('email');
    }
    //Alumni Directory ->where('matricno','<>',Auth::user()->matricno)
    public function alumniDirectory(){
        return view('alumni.directory', [
            'alumni_members'=>AlumniProfile::latest()->filter(request(['search']))->paginate(8)
        ]);
    }

    //profile details
    public function profile(){
        return view('alumni.profile');
    }
    //Update Profile
    public function updateProfile(AlumniProfileFormRequest $request, $id){
        // dd($request->except(['_token','_method']));
        $request->validated();
        $updateRecords=$request->except(['_token','_method','profile_picture']);
        if($request->profile_picture){
            $newImageName = str_replace("/","_",$request->matricno) . '.' . $request->profile_picture->extension();
            $updateRecords['profile_picture']=$newImageName;
            $this->storeImage($request,$newImageName);
        }

        AlumniProfile::where('matricno',$request->matricno)->update($updateRecords);
        
        return back()->with('message', 'Profile Successfully Updated');
    }

    //Edit Password
    public function changePassword(){
        return view('alumni.update-password');
    }

    //change Password

    public function updatePassword(Request $request, $id){
        // dd($id);
        $request->validate([
            'password'=>'required|confirmed|min:8'
        ]);
        $newpassword=bcrypt($request->password);
        User::where('id',$id)->update([
            'password'=>$newpassword
        ]);

        return back()->with('message', 'Password Successfully Change');
    }

    public function alumniDetails($id){
        $sender=Auth::user()->matricno; //get message sender matricno
        $alumniProfile=AlumniProfile::firstWhere('id',$id); //recepient matricno
        $receiver=$alumniProfile->matricno;
        //check if thread exists between
        $thread_id=DB::table('participants')->whereIn('matricno',[$sender,$receiver])->groupBy('thread_id')->havingRaw('COUNT(*) > 1')->value('thread_id');
        if(!empty($thread_id)){
            $messages=Thread::find($thread_id)->messages;
        }else{
            $messages="";
        }
        return view('alumni.members-details',[
            'alumniProfile'=>$alumniProfile,
            'messages'=>$messages
        ]);
    }

    public function sendMessage(Request $request,$id){
        $request->validate([
            'chat'=>'required'
        ]);
        $sender=Auth::user()->matricno; //get message sender matricno
        $receiverData=AlumniProfile::firstWhere('id',$id); //recepient matricno
        $receiver=$receiverData->matricno;
        //check if thread exists between
        $thread=DB::table('participants')->whereIn('matricno',[$sender,$receiver])->groupBy('thread_id')->havingRaw('COUNT(*) > 1')->value('thread_id');
        if(is_null($thread)){
            $threadtitle=$sender."_".$receiver."_Chats";
            $newThread=Thread::create([
                'subject'=>$threadtitle
            ]);
            $thread=$newThread->id;
            Participant::insert([
                ['thread_id'=>$thread,'matricno'=>$sender],
                ['thread_id'=>$thread,'matricno'=>$receiver]
            ]);
        }
        //insert chat message
        Message::create([
            'thread_id'=>$thread,
            'matricno'=>$sender,
            'body'=>$request->chat
        ]);
        return response()->json(data: 'success', status: '201');
    }

    public function alumniMessage($id){
        $alumniProfile=AlumniProfile::firstWhere('id',$id);
        return view('alumni.members-details',[
            'alumniProfile'=>$alumniProfile
        ]);
    }

}