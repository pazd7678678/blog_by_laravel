<?php

namespace Pzd\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
       Auth::logout();
       return to_route('home.index');
    }
}
