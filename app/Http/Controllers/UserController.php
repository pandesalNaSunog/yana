<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    public function changePassword(Request $request){
        $fields = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|min:8|confirmed'
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        if(!$user){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'An error has occured. This account may have been deleted.');
        }
        if(!Hash::check($fields['current-password'], $user->password)){
            return back()->withErrors([
                'current-password' => 'Invalid Password'
            ]);
        }
        $user->update([
            'password' => $fields['new-password']
        ]);
        return back()->with('message', 'Password has been successfully updated!');

    }
    public function therapistSignup(Request $request){
        $fields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'contact_number' => 'required|min:11',
            'birth_date' => 'required|date',
            'degree' => 'required',
            'password' => 'required|confirmed'
        ]);

        if($request->hasFile('certification')){
            $fields['certification'] = $request->file('certification')->store('images','public');
            $fields['approval'] = 0;
            $fields['role'] = 1;
            $fields['profile_picture'] = "";
            $user = User::create($fields);
            auth()->login($user);
            return redirect('/redirector');
        }
        return back()->withErrors([
            'certification' => 'Please choose an image'
        ])->onlyInput('certification');
    }
    public function updateProfile(Request $request){
        $fields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required|min:11',
            'birth_date' => 'required|date'
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        if(!$user){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'An error has occured. This account may have been deleted.');
        }

        $user->update($fields);
        return redirect('/profile')->with('message', 'Your profile has been successfully updated!');
    }
    public function therapistApproval(){
        return view('therapist.therapist-approval');
    }
    public function signupTherapist(){
        return view('therapist-signup');
    }
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($fields)){
            $request->session()->regenerate();
            return redirect('/redirector');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials'
        ]);
    }
    public function createAccount(Request $request){

        $fields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'contact_number' => 'required|min:10',
            'birth_date' => 'required|date',
            'password' => 'required|confirmed',
            
        ]);

        $fields['approval'] = 0;
        $fields['profile_picture'] = "";
        $fields['certification'] = "";
        $fields['degree'] = "";
        $fields['role'] = 2;

        $user = User::create($fields);
        auth()->login($user);
        return redirect('/redirector');
    }
    public function adminSideUserProfile(User $user){
        return view('admin.user-profile', [
            'user' => $user
        ]);
    }
    public function approveTherapist(Request $request){
        $fields = $request->validate([
            'therapist-id' => 'required'
        ]);
        $user = User::where('id', $fields['therapist-id'])->first();
        if(!$user){
            return back()->with('message', 'An error has occured. This user data has been deleted.');
        }
        $user->update([
            'approval' => 1
        ]);

        return back()->with('message', 'This therapist has been successfully approved');
    }

    public function therapists(){
        $therapists = User::where('role', 1)->latest()->paginate(5);

        $data = [
            'therapists' => $therapists
        ];

        return view('admin.therapists', $data);
    }

    public function usersAdminSide(){
        $patients = User::where('role', 2)->latest()->paginate(5);
        $data = [
            'patients' => $patients
        ];

        return view('admin.users', $data);
    }
    public function patientProfile(Request $request){
        $user = User::where('id', auth()->user()->id)->first();
        if(!$user){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'An error has occured. This account may have been deleted.');
        }
        $data = [
            'user' => $user
        ];
        return view('profile', $user);
    }
    public function editProfile(){
        return view('edit-profile');
    }

    public function updateProfilePicture(Request $request){
        $user = User::where('id', auth()->user()->id)->first();
        if(!$user){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'There was an error occured. Your account might have been deleted.');
        }

        if($request->hasFile('profile-picture')){
            $fields['profile_picture'] = $request->file('profile-picture')->store('images','public');
            $user->update($fields);
            return back()->with('message', 'Profile Picture has been updated successfully!');
        }
        return back()->withErrors([
            'profile-picture' => 'Please choose an image'
        ]);
        
    }
    public function create(){
        $fields = [
            'email' => 'arn@gmail.com',
            'password' => 'password',
            'role' => 0,
            'first_name' => 'Arnesto',
            'last_name' => 'Yasay',
            'contact_number' => 'jklafj',
            'birth_date' => '1996-11-11',
            'profile_picture' => "",
        ];
        
        

        // $user = User::where('role', 2)->first();
        // if(!$user){
        User::create($fields);
        // }
        return response([
            'message' => 'ok'
        ]);
    }

    public function signup(){
        return view('client-signup');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Logged Out Successfully!');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function redirector(){
        if(auth()->user()->role == 0){ //if user is admin redirect to admin dashboard
            return redirect('/admin/dashboard');
        }else if(auth()->user()->role == 1){
            // if user is psych redirect to psych dashboard
            if(auth()->user()->approval == 1){
            return redirect('/therapist');
            }
            return redirect('/therapist-approval');
        }
        return redirect('/');
        
    }
}
