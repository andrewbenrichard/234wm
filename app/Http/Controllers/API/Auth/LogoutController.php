<?php

namespace App\Http\Controllers\APi\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __invoke()
    {
       auth()->logout();
    }
}
