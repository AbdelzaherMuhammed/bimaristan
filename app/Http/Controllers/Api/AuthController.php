<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\ResetPasswordRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Models\Student;
use App\Notifications\ForgetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $student = Student::create($request->validated());

        $token = $student->createToken('tokens')->plainTextToken;

        return response()->json(['status' => 'success', 'message' => 'Student created_successfully', 'student' => $student, 'token' => $token]);
    }


    public function login(LoginRequest $request)
    {
        $username = (new LoginController())->username();
        if (!auth()->guard('student')->attempt([$username => $request->username, 'password' => $request->password, 'is_login' => 0])) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid login details',
                'data' => ''
            ], 401);
        }

        $student = Student::where($username, $request->username)->firstOrFail();
        $student->update(['is_login' => 1]);

        $token = $student->createToken('auth_token')->plainTextToken;

        return response()->json(['status' => 'success', 'message' => 'Login Successful', 'student' => $student, 'token' => $token]);

    }


    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $student = Student::where('email', $request->email)->firstOrFail();

        $pin_code = rand(111111,999999);

        $student->update(['pin_code' => $pin_code]);

        Notification::send($student, new ForgetPasswordNotification());

        return response()->json(['status' => 'success', 'message' => 'please check email', 'data' => null]);
    }


    public function resetPassword(ResetPasswordRequest $request)
    {
        $student = Student::where('pin_code', $request->pin_code)->firstOrFail();

        $student->update(['password' => $request->password, 'pin_code' => null]);

        return response()->json(['status' => 'success', 'message' => 'Password reset successfully', 'data' => null]);

    }


    public function logout()
    {
        Auth::guard('student-api')->user()->tokens()->delete();
        return response()->json(['status' => 'success', 'message' => 'Token removed successfully', 'data' => null]);

    }

}
