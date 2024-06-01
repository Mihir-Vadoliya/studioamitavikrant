<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Library\Globalfunction;
use App\Models\EmailTemplate;
use App\Models\User;
use App\Notifications\MailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;


class AdminLoginController extends Controller
{
    public function login()
    {
        return view("admin.auth.login");
    }
    
    public function doLogin(LoginPostRequest $request)
    {
       $email = $request->email ?? null;
       $password = $request->password ?? null;
       
       $validated = $request->validated();

       if ($validated && $email != null && $password != null) {
           if (Auth::attempt(['email' => $email, 'password' => $password, 'type' => 'admin'])) {
               return redirect()->route('admin.dashboard');
           } else {
               return back()->withErrors([
                   'error' => 'The provided credentials do not match our records.',
               ]);
           }
       }
    }

   public function forgotPassword()
   {
       return view('admin.auth.passwords.email');
   }

   public function sendResetPasswordEmail(Request $request)
   {
       $user = User::where('email', '=', $request->email)->first();
       if ($user) {
           $validation = $request->validate([
               'email' => 'required|email'
           ]);
           if ($validation) {
               $arrRows = $activateLink = $paraKeyArr = $paraValArr = '';
               $emailWhrKey = 'User forgot password email';
               $activeLinkText = 'Click here to Reset Your Password';
               $token = Str::random(64);
               DB::table('password_resets')->insert([
                   'email' => $request->email,
                   'token' => $token,
                   'created_at' => Carbon::now()]);
               $arrRows = Globalfunction::convertSelectedRowInArray(EmailTemplate::where('type', $emailWhrKey)->get()->toArray());
               $activateLink = '<button class="action button-green">
                                       <a href="' . route('admin.password.reset', ['token' => $token . '?' . $user->email,]) . '" title="Reset Password" style="text-decoration: none; color:white;">' . $activeLinkText . '</a>
                                   </button>';
               $paraKeyArr = array("###NAME###", "###SITE_LINK###", "###SITENAME###", "###ACTIVATIONURL###", "###SITE_LINK###", "###SITENAMECOM###");
               $paraValArr = array(Str::ucfirst($user->first_name), env('APP_URL'), env('APP_NAME'), $activateLink, env('APP_URL'), env('APP_NAME'));
               $html = Globalfunction::GetMailMessageBody($arrRows[0]['email_content'], $paraKeyArr, $paraValArr);
               $details = [
                   'html' => $html,
                   'subject' => $arrRows[0]['email_subject'],
               ];
               Notification::send($user, new MailNotification($details));
               return back()->with(['success' => __('We Have Emailed Your reset Password Link.')]);
           } else {
               return redirect('/admin/forgot-password')->with(['error' => 'Please Provide a Valid Email Address']);
           }
       } else {
           return back()->withErrors([
                   'email' => 'The provided credentials do not match our records.',
               ])->onlyInput('email');
       }
   }

   public function sendToken($token)
   {
       return view('admin.auth.passwords.reset', ['token' => $token]);
   }

   public function resetPassword(Request $request)
   {
       $request->validate([
           'token' => 'required',
           'email' => 'required|email',
           'password' => 'required|min:8|confirmed',
       ]);
       $updatePassword = DB::table('password_resets')
           ->where(['email' => $request->email, 'token' => $request->token])->first();
       if (!$updatePassword) {
           return back()->withErrors(['errors' => [__('Invalid Token Or Email Id Mismatch')]]);
       }
       $user = User::where('email', $request->email)
           ->update(['password' => Hash::make($request->password)]);
       DB::table('password_resets')->where(['email' => $request->email])->delete();

       return $user
           ? redirect()->route('adminLogin')->with('success', __('Your Password Has Been Changed Successfully'))
           : back()->withErrors(['errors' => [__('Something Went Wrong! Please Try Again.')]]);
   }

   public function doLogOut()
   {
       Auth::logout();
       return redirect()->route('adminLogin');
   }

   public function requestChangePassword(){
        return view('admin.auth.passwords.changePassword');
   }

   public function setChangePassword(Request $request)
   {
       $request->validate([
           'email' => 'required|email',
           'password' => 'required|min:8',
       ]);

       $user = User::whereId(auth()->user()->id)
           ->update(['password' => Hash::make($request->password)]);

       return $user
           ? redirect()->route('admin.dashboard')->with('success', __('Your Password Has Been Changed Successfully'))
           : back()->withErrors(['errors' => [__('Something Went Wrong! Please Try Again.')]]);
   }
}
