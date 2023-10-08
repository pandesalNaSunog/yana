<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Matcher;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\MailCred;
use App\Models\PasswordVerification;
use App\Models\EmailVerification;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\Comment;
class UserController extends Controller
{
    public function createCreds(){
        MailCred::create([
            'username' => 'yanaect@gmail.com',
            'password' => 'guko rjpz fioj slne',
            'port' => 465,
            'secure' => 'ssl'
        ]);
        return response([
            'message' => 'ok'
        ]);
    }
    public function postEmailVerification(Request $request){
        $fields = $request->validate([
            'code' => 'required'
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        if($user){
            $emailVerification = EmailVerification::where('code', $fields['code'])->where('user_id', $user->id)->first();
            if($emailVerification){
                $user->update([
                    'verified' => 2
                ]);
                return redirect('/')->with('message', 'Email has been successfully verified.');
            }
            return back()->withErrors('code', 'Invalid Code')->onlyInput('code');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')-with('message', 'There was a problem with your account. Please try loggin in again.');
    }
    public function emailVerification(Request $request){
        $user = User::where('id', auth()->user()->id)->first();
        if($user && $user->verified == 1){
            $emailVerifications = EmailVerification::where('user_id', $user->id)->delete();

            $code = "";
            $characters = "1234567890";
            for($i = 0; $i < 6; $i++){
                $index = rand(0, strlen($characters) - 1);
                $code .= $characters[$index];
            }

            EmailVerification::create([

                'user_id' => $user->id,
                'code' => $code
            ]);

            $mailCreds = MailCred::first();
            $mail = new PHPMailer(true);

            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $mailCreds->username; 
            $mail->Password = $mailCreds->password; 
            $mail->SMTPSecure = $mailCreds->secure; 
            $mail->Port = $mailCreds->port;

            $mail->setFrom('yanaect@gmail.com', 'YANA');
            $mail->addAddress($user->email);
            $mail->isHTML(true);

            $mail->Subject = 'Email Verification';
            $mail->Body = 'Your verification code is ' . $code . '.';

            if(!$mail->send()){
                $user->delete();
                return redirect('/')->with('message', 'Your registered email is invalid');
            }


            return view('email-verification',[
                'user' => $user
            ]);
            
            
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Something went wrong.');
    }
    public function postForgotPasswordChangePassword(Request $request){
        $fields = $request->validate([
            'user_id' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::where('id', $fields['user_id'])->first();
        if($user){
            $user->update([
                'password' => $fields['password']
            ]);

            return redirect('/login')->with('message', 'Password changed successfully.');
        }
        return redirect('/login')->with('message', 'Something went wrong.');
    }
    public function forgotPasswordChangePassword(){
        session_start();
        if(session()->has('can_change_password')){
            session()->forget('can_change_password');
            $userId = session()->get('user_id_change_password');
            $user = User::where('id', $userId)->first();
            if($user){
                return view('forgot-password-change-password',[
                    'user' => $user
                ]);
            }
            return redirect('/login')->with('message', 'An error has occurred');
            
        }
        return redirect('/login')->with('message', 'Invalid session');
    }
    public function forgotPassword(){
        return view('forgot-password');
    }
    public function postForgotPasswordVerification(Request $request){
        $fields = $request->validate([
            'code' => 'required',
            'user_id' => 'required'
        ]);

        $passwordVerification = PasswordVerification::where('code', $fields['code'])->where('user_id', $fields['user_id'])->first();
        if($passwordVerification){
            $user = User::where('id', $fields['user_id'])->first();
            if($user){
                session_start();
                session()->put('can_change_password', 'yes');
                session()->put('user_id_change_password', $user->id);
                return redirect('/forgot-password/change');
            }
        }
        return redirect('/login')->with('message', 'Invalid Code.');
    }
    public function forgotPasswordVerification(Request $request){
        session_start();
        if(session()->has('user_id')){
            $userId = session()->get('user_id');
            session()->forget('user_id');
            $user = User::where('id', $userId)->first();
            if($user){
                return view('forgot-password-verification',[
                    'user' => $user
                ]);
            }
            return redirect('/');
        }
        
        return redirect('/');
    }

    public function forgotPasswordEmail(Request $request){
        $fields = $request->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', $fields['email'])->first();
        if(!$user){
            return back()->withErrors([
                'email' => 'Invalid Email'
            ])->onlyInput('email');
        }
        $user->update([
            'verified' => 1
        ]);

        session_start();
        session()->put('user_id', $user->id);
        $passwordVerifications = PasswordVerification::where('user_id', $user->id)->delete();

        $code = "";
        $characters = "1234567890";
        for($i = 0; $i < 6; $i++){
            $index = rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }
        PasswordVerification::create([
            'user_id' => $user->id,
            'code' => $code
        ]);


        $mailCreds = MailCred::first();
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $mailCreds->username; 
        $mail->Password = $mailCreds->password; 
        $mail->SMTPSecure = $mailCreds->secure; 
        $mail->Port = $mailCreds->port;

        $mail->setFrom('yanaect@gmail.com', 'YANA');
        $mail->addAddress($fields['email']);
        $mail->isHTML(true);

        $mail->Subject = 'Forgot Password Verification Code';
        $mail->Body = 'Your verification code is ' . $code . '. Do not refresh the page or this code will be invalidated.';

        if(!$mail->send()){
            $user->delete();
            return response ([
                'message' => 'email is invalid'
            ], 401);
        }

        return redirect('/forgot-password-verification');
    }
    public function testMail(){
        $mailCreds = MailCred::first();
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $mailCreds->username; 
        $mail->Password = $mailCreds->password; 
        $mail->SMTPSecure = $mailCreds->secure; 
        $mail->Port = $mailCreds->port;

        $mail->setFrom('yanaect@gmail.com', 'YANA');
        $mail->addAddress('floresjem8@gmail.com');
        $mail->isHTML(true);

        $mail->Subject = 'Test Mail';
        $mail->Body = 'This is a test mail';

        if(!$mail->send()){
            $user->delete();
            return response ([
                'message' => 'email is invalid'
            ], 401);
        }
    }

    public function therapistUpdateBio(Request $request){
        $fields = $request->validate([
            'bio' => 'required'
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        if($user){
            $user->update([
                'bio' => $fields['bio']
            ]);
            return back()->with('message', 'Bio has been updated');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Something went wrong.');
    }
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
            'email' => 'required|email|unique:users,email',
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
            $fields['bio'] = "";
            $fields['forgot_password'] = 0;
            $fields['verified'] = 1;
            $user = User::create($fields);
            auth()->login($user);
            return redirect('/redirector');
        }
        return back()->withErrors([
            'certification' => 'Please choose an image'
        ])->onlyInput('certification');
    }
    public function therapistDashboard(){
        $matchers = Matcher::where('therapist_id', auth()->user()->id)->latest()->paginate(5);
        $name = "";
        $submissionDate = "";
        $onlineSessions = [];
        foreach($matchers as $matcher){
            $patient = User::where('id', $matcher->patient_id)->first();
            if($patient){
                $name = $patient->first_name . " " . $patient->last_name;
            }else{
                $name = "Unknown user";
            }
            $submissionDate = $matcher->created_at->format('M d, Y h:i A');
            if($matcher->approval == 0){
                $status = 'Pending';
            }else{
                $status = 'Ongoing';
            }
            $onlineSessions[] = [
                'name' => $name,
                'submission_date' => $submissionDate,
                'matcher_id' => $matcher->id,
                'status' => $status,
                'chat_id' => $matcher->chat_id
            ];
        }
        return view('therapist.therapist-dashboard', [
            'onlineSessions' => $onlineSessions,
            'matchers' => $matchers,
            'active' => 'home'
        ]);
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
    public function therapistUpdateProfile(Request $request){
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
        return redirect('/therapist')->with('message', 'Your profile has been successfully updated!');
    }
    public function therapistApproval(Request $request){
        $user = User::where('id', auth()->user()->id)->first();
        if($user){
            if($user->approval == 0){
                return view('therapist.therapist-approval');
            }
            return redirect('/therapist');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Something went wrong.');
        
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
            $user = User::where('id', auth()->user()->id)->first();
            if($user && $user->verified == 0){
                $user->update([
                    'verified' => 1
                ]);
                return redirect('/email-verification');
            }
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
            'email' => 'required|email|unique:users,email',
            'contact_number' => 'required|min:10',
            'birth_date' => 'required|date',
            'password' => 'required|confirmed',
        ]);

        $fields['approval'] = 0;
        $fields['profile_picture'] = "";
        $fields['certification'] = "";
        $fields['degree'] = "";
        $fields['role'] = 2;
        $fields['bio'] = "";
        $fields['forgot_password'] = 0;
        $fields['verified'] = 1;

        $user = User::create($fields);
        auth()->login($user);
        return redirect('/redirector');
    }
    public function adminSideUserProfile(User $user){
        return view('admin.user-profile', [
            'user' => $user,
            'active' => 'none'
        ]);
    }
    public function therapistList(){
        $therapists = User::where('role', 1)->where('approval', 1)->get();
        return view('therapist-list',[
            'therapists' => $therapists,
            'active' => 'none'
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

        $mailCreds = MailCred::first();
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $mailCreds->username; 
        $mail->Password = $mailCreds->password; 
        $mail->SMTPSecure = $mailCreds->secure; 
        $mail->Port = $mailCreds->port;

        $mail->setFrom('yanaect@gmail.com', 'YANA');
        $mail->addAddress($user->email);
        $mail->isHTML(true);

        $mail->Subject = 'Account Approval';
        $mail->Body = 'Your account has been approved by the administrator. You may now log in.';

        if(!$mail->send()){
            $user->delete();
            return redirect('/')->with('message', 'Your registered email is invalid');
        }


        return back()->with('message', 'This therapist has been successfully approved');
    }

    public function therapists(){
        $therapists = User::where('role', 1)->latest()->paginate(5);

        $data = [
            'therapists' => $therapists,
            'active' => 'therapists'
        ];

        return view('admin.therapists', $data);
    }

    public function usersAdminSide(){
        $patients = User::where('role', 2)->latest()->paginate(5);
        $data = [
            'patients' => $patients,
            'active' => 'patients'
        ];

        return view('admin.users', $data);
    }
    public function patientProfile(Request $request){
        $user = User::where('id', auth()->user()->id)->first();
        $matchers = Matcher::where('patient_id', auth()->user()->id)->latest()->paginate(5);
        $onlineSessions = [];
        $submissionDate = "";
        foreach($matchers as $matcher){
            $patient = User::where('id', $matcher->patient_id)->first();
            $therapist = User::where('id', $matcher->therapist_id)->first();
            if($matcher->approval == 1){
                $status = "Ongoing";
            }else{
                $status = "Pending";
            }
            if($therapist){
                $therapistName = "Dr. " . $therapist->first_name . " " . $therapist->last_name;
            }else{
                $therapistName = "Unknown user";
            }
            if($patient){
                $name = $patient->first_name . " " . $patient->last_name;
            }else{
                $name = "Unknown user";
            }
            $submissionDate = $matcher->created_at->format('M d, Y h:i A');
            $onlineSessions[] = [
                'name' => $name,
                'submission_date' => $submissionDate,
                'therapist_name' => $therapistName,
                'status' => $status,
                'chat_id' => $matcher->chat_id
            ];
        }
        if(!$user){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message', 'An error has occured. This account may have been deleted.');
        }
        $data = [
            'user' => $user,
            'onlineSessions' => $onlineSessions,
            'matchers' => $matchers,
            'active' => 'none'
        ];
        return view('profile', $data);
    }
    public function editProfile(){
        return view('edit-profile',[
            'active' => 'none'
        ]);
    }
    public function therapistEditProfile(){
        return view('therapist.edit-profile',[
            'active' => 'none'
        ]);
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

    public function therapistUpdateProfilePicture(Request $request){
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
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'role' => 0,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'contact_number' => '',
            'birth_date' => '1996-11-11',
            'profile_picture' => "",
            'certification' => "",
            'approval' => 0,
            'bio' => "",
            'degree' => "",
            'forgot_password' => 0,
            'verified' => 2
        ];
        
        

        // $user = User::where('role', 2)->first();
        // if(!$user){
        User::create($fields);
        // }
        return response([
            'message' => 'ok'
        ]);
    }
    public function adminProfile(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('admin.profile', [
            'user' => $user,
            'active' => 'none'
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
        $monthToday = date('Y-m');

        //calculate rate of increase of patients for today's month

        $patientsThisMonth = User::where('created_at', 'like', $monthToday . '%')->where('role',2)->get()->count();
        $patients = User::where('role', 2)->get()->count();

        if($patientsThisMonth == 0 || $patients == 0){
            $patientRateOfIncrease = number_format(0,2);
        }else{
            $patientRateOfIncrease = number_format(($patientsThisMonth / $patients) * 100, 2);
        }
        
        //calculate rate of increase of therapists for today's month

        $therapistsThisMonth = User::where('created_at', 'like', $monthToday . '%')->where('role',1)->get()->count();
        $therapists = User::where('role', 1)->get()->count();

        if($therapistsThisMonth == 0 || $therapists == 0){
            $therapistRateOfIncrease = number_format(0,2);
        }else{
            $therapistRateOfIncrease = number_format(($therapistsThisMonth / $therapists) * 100, 2);
        }

        //calculate rate of increase of feedbacks for today's month

        $feedbacksThisMonth = Feedback::where('created_at', 'like', $monthToday . '%')->get()->count();
        $feedbacks = Feedback::all()->count();

        if($feedbacksThisMonth == 0 || $feedbacks == 0){
            $feedbackRateOfIncrease = number_format(0,2);
        }else{
            $feedbackRateOfIncrease = number_format(($feedbacksThisMonth / $feedbacks) * 100, 2);
        }

        //calculate rate of increase of posts for today's month

        $postsThisMonth = Post::where('created_at', 'like', $monthToday . '%')->get()->count();
        $posts = Post::all()->count();
        $postsData = Post::all();
        if($postsThisMonth == 0 || $posts == 0){
            $postRate = number_format(0,2);
        }else{
            $postRate = number_format(($postsThisMonth / $posts) * 100, 2);
        }

        //calculate number of consultations

        $consultationsThisMonth = Matcher::where('approval', 1)->where('created_at','like', $monthToday . '%')->get()->count();
        $consultations = Matcher::all()->count();

        if($consultationsThisMonth == 0 || $consultations == 0){
            $consultationRate = number_format(0, 2);
        }else{
            $consultationRate = number_format(($consultationsThisMonth / $consultations) * 100, 2);
        }


        //calculate average comments per post
        $commentsThisMonth = Comment::where('created_at', 'like' , $monthToday . '%')->get()->count();
        $comments = Comment::all()->count();


        $numberOfCommentsEachPost = [];
        foreach($postsData as $post){
            
            $commentsEachPost = Comment::where('post_id', $post->id)->get()->count();
            $numberOfCommentsEachPost[] = $commentsEachPost;
        }
        $summationOfNumberOfComments = 0;
        foreach($numberOfCommentsEachPost as $numberOfComments){
            $summationOfNumberOfComments += $numberOfComments;
        }

        if($summationOfNumberOfComments == 0){
            $averageComments = 0;
        }else{
            $averageComments = number_format($summationOfNumberOfComments / count($numberOfCommentsEachPost), 0);
        }
        

        if($commentsThisMonth == 0 || $comments == 0){
            $commentRate = number_format(0,2);
        }else{
            $commentRate = number_format(($commentsThisMonth / $comments) * 100, 2);
        }



        //calculate consultations per month
        $yearNow = date('Y');
        $allConsultations = Matcher::where('approval', 1)->where('created_at', 'like', $yearNow . '%')->orderBy('created_at', 'asc')->get();
        $consultationsDataSet = [];
        $previousMonth = "";
        $currentMonth = "";
        $consultationsPerMonth = 0;
        $months = [];
        $numberOfConsultations = [];
        foreach($allConsultations as $consultation){
            $currentMonth = $consultation->created_at->format('F');
            if($previousMonth == "" || $previousMonth == $currentMonth){
                $consultationsPerMonth++;
            }else{
                $months[] = $previousMonth;
                $numberOfConsultations[] = $consultationsPerMonth;
                
                $consultationsPerMonth = 1;
            }
            $previousMonth = $currentMonth;
        }
        
        $months[] = $previousMonth;
        $numberOfConsultations[] = $consultationsPerMonth;
        
        $consultationsPerMonth = 0;
        return view('admin.dashboard',[
            'active' => 'dashboard',
            'therapists' => $therapists,
            'patients' => $patients,
            'feedbacks' => $feedbacks,
            'patient_rate_of_increase' => $patientRateOfIncrease,
            'therapist_rate_of_increase' => $therapistRateOfIncrease,
            'feedback_rate_of_increase' => $feedbackRateOfIncrease,
            'post_rate' => $postRate,
            'posts' => $posts,
            'average_comments' => $averageComments,
            'comment_rate' => $commentRate,
            'consultations' => $consultations,
            'consultation_rate' => $consultationRate,
            'months' => $months,
            'consultations_per_month' => $numberOfConsultations
        ]);
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
