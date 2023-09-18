<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', [UserController::class, 'create']);
Route::get('/', function(){
    if(auth()->check()){
        if(auth()->user()->role != 2){
            return redirect('/redirector');
        }
        
    }
    return view('home');
});
Route::middleware('guest')->group(function(){
    
    Route::get('/login', function(){
        return view('login');
    })->name('login');
    Route::post('/signup', [UserController::class, 'createAccount']);
    Route::get('/signup', [UserController::class, 'signup']);
    Route::get('/signup-therapist', [UserController::class, 'signupTherapist']);
    Route::post('/signup-therapist',[UserController::class, 'therapistSignup']);
    Route::post('/login', [UserController::class, 'login']);

    Route::prefix('/admin')->group(function(){ //admin routes
        Route::get('/', function(){
            return view('admin.login');
        });
        Route::post('/login', [UserController::class, 'login']);
    });
    
});

Route::middleware('auth')->group(function(){
    Route::get('/redirector', [UserController::class, 'redirector']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::get('/chats',[ChatController::class, 'chats']);
    Route::middleware('patient')->group(function(){ //patient routes
        Route::get('/profile',[UserController::class, 'patientProfile']);
        Route::get('/edit-profile',[UserController::class, 'editProfile']);
        Route::post('/upload-profile-picture', [UserController::class, 'updateProfilePicture']);
        Route::post('/update-profile', [UserController::class, 'updateProfile']);
        Route::get('/therapist-list', [UserController::class, 'therapistList']);
        Route::get('/matcher',[MatcherController::class, 'viewTracking']);
        Route::post('/post-matcher', [MatcherController::class, 'postMatcher']);
    });

    Route::middleware('admin')->group(function(){
        Route::get('/admin/dashboard', [UserController::class, 'dashboard']);
        Route::post('/admin/logout', [UserController::class, 'logout']);
        Route::get('/admin/patients', [UserController::class, 'usersAdminSide']);
        Route::get('/admin/therapists', [UserController::class, 'therapists']);
        Route::get('/admin/users/{user}',[UserController::class, 'adminSideUserProfile']);
        Route::post('/admin/approve-therapist', [UserController::class, 'approveTherapist']);
    });
    Route::middleware('psych')->group(function(){
        Route::get('/therapist-approval', [UserController::class, 'therapistApproval']);
        Route::get('/therapist',[UserController::class, 'therapistDashboard']);
        Route::get('/therapist/edit-profile', [UserController::class, 'therapistEditProfile']);
        Route::post('/therapist/upload-profile-picture', [UserController::class, 'therapistUpdateProfilePicture']);
        Route::post('/therapist/update-profile',[UserController::class, 'therapistUpdateProfile']);
        Route::post('/therapist/confirm-session',[MatcherController::class, 'confirmSession']);
    });
    Route::get('/logout', [UserController::class, 'logout']);
 
});




