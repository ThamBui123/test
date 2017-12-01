<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Request;
use Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = 'admin';

    public function __construct()
    {
        $this->middleware('checknhanvien');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.passwords.reset')->with(
            ['token' => $token]
        );
    }

    public function broker()
    {
        return Password::broker('nhanvien');
    }

    protected function guard()
    {
        return Auth::guard('nhanvien');
    }
}
