<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() 
    {
        $checkout = Checkout::with('camp')->whereUserId(Auth::id())->get();
        // dd($checkout);
        return view('page.user.dashboard', ['checkout' => $checkout]);
    }
}
