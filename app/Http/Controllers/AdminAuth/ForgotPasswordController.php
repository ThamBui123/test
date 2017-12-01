<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
  use SendsPasswordResetEmails;

  public function __construct()
  {
    $this->middleware('checknhanvien');
  }

  public function broker()
  {
    return Password::broker('nhanvien');
  }

}
