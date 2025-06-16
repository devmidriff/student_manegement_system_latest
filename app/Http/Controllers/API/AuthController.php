<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Otp;


class AuthController extends Controller
{

     public function login(Request $request)
     { 
             
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);


     }




public function forget(Request $request)
    {
   
            $validated = $request->validate([
                'email' => 'required|email|exists:users,email',
            ]);
            $user = User::where('email', $validated['email'])->first();
            $otpCode = rand(100000, 999999);
            $expiresAt = Carbon::now()->addMinutes(10);

            Otp::create([
                'user_id' => $user->id,
                'otp' => $otpCode,
                'expires_at' => $expiresAt,
            ]);
            Mail::raw("Your OTP is: $otpCode", function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Your OTP Code');
            });
            return response()->json([
                'status' => true,
                'message' => 'OTP has been sent to your email address.',
            ]);

    }



public function changePassword(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|email|exists:users,email',
        'otp' => 'required',
        'password' => 'required|min:6',
    ]);
    $user = User::where('email', $validated['email'])->first();
    $otpRecord = Otp::where('user_id', $user->id)
        ->where('otp', $validated['otp'])
        ->where('expires_at', '>', Carbon::now()) 
        ->latest()
        ->first();

    if (!$otpRecord) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid or expired OTP.',
        ], 422);
    }
    $user->password = Hash::make($validated['password']);
    $user->save();
    $otpRecord->delete();
    return response()->json([
        'status' => true,
        'message' => 'Password changed successfully.',
    ]);
}















}
