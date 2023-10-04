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

Route::get('/', [FeedbackController::class, 'showTestimonials']);
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
    Route::get('/forgot-password',[UserController::class, 'forgotPassword']);
    Route::post('/forgot-password',[UserController::class, 'forgotPasswordEmail']);
    Route::get('/forgot-password-verification',[UserController::class, 'forgotPasswordVerification']);
    Route::post('/forgot-password-verification', [UserController::class, 'postForgotPasswordVerification']);
    Route::get('/forgot-password/change',[UserController::class, 'forgotPasswordChangePassword']);
});

Route::middleware('auth')->group(function(){
    Route::get('/redirector', [UserController::class, 'redirector']);
    Route::post('/change-password', [UserController::class, 'changePassword']);
    Route::get('/chats',[ChatController::class, 'chats']);
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send-message');
    Route::get('/chats/convo/{chats}',[ChatController::class, 'loadConversation']);
    Route::get('/library',[LibraryController::class,'clientLibrary']);
    Route::get('/forums',[ForumController::class, 'forums']);
    Route::post('/write-post',[ForumController::class, 'writePost']);
    Route::post('/write-comment',[ForumController::class, 'writeComment'])->name('write-comment');
    Route::get('/post-comments/{post}',[ForumController::class, 'viewPostComments']);
    Route::middleware('patient')->group(function(){ //patient routes
        Route::get('/profile',[UserController::class, 'patientProfile']);
        Route::get('/edit-profile',[UserController::class, 'editProfile']);
        Route::post('/upload-profile-picture', [UserController::class, 'updateProfilePicture']);
        Route::post('/update-profile', [UserController::class, 'updateProfile']);
        Route::get('/therapist-list', [UserController::class, 'therapistList']);
        Route::get('/matcher',[MatcherController::class, 'viewTracking']);
        Route::post('/post-matcher', [MatcherController::class, 'postMatcher']);
        Route::post('/write-feedback',[FeedbackController::class, 'postFeed']);
    });

    Route::middleware('admin')->group(function(){
        Route::get('/admin/dashboard', [UserController::class, 'dashboard']);
        Route::post('/admin/logout', [UserController::class, 'logout']);
        Route::get('/admin/patients', [UserController::class, 'usersAdminSide']);
        Route::get('/admin/therapists', [UserController::class, 'therapists']);
        Route::get('/admin/users/{user}',[UserController::class, 'adminSideUserProfile']);
        Route::post('/admin/approve-therapist', [UserController::class, 'approveTherapist']);
        Route::get('/admin/library', [LibraryController::class, 'library']);
        Route::post('/add-category',[LibraryController::class, 'addCategory']);
        Route::get('/admin/edit-category/{category}',[LibraryController::class, 'editCategory']);
        Route::post('/admin/update-category/{category}', [LibraryController::class, 'updateCategory']);
        Route::post('/admin/delete-category/{category}', [LibraryController::class, 'deleteCategory']);
        Route::get('/admin/solutions/{category}', [LibraryController::class, 'solutions']);
        Route::post('/add-solution',[LibraryController::class,'addSolution']);
        Route::get('/admin/edit-solution/{solution}',[LibraryController::class, 'editSolution']);
        Route::get('/admin/change-password',[UserController::class, 'adminProfile']);
        Route::get('/admin/feedbacks',[FeedbackController::class, 'feedbacks']);
        Route::post('/admin/post-feedback/{feedback}', [FeedbackController::class, 'postFeedback']);
        Route::post('/update-solution/{solution}',[LibraryController::class, 'updateSolution']);
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




