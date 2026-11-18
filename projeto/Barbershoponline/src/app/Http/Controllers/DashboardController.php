<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Appointment;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index(Request $request): View
    {

        $today = now()->toDateString();
    
        $appointments = Appointment::select('appointments.*')
            ->join('availabilities', 'appointments.availability_id', '=', 'availabilities.id')
            ->whereDate('availabilities.date', $today)
            ->orderBy('availabilities.date', 'asc')
            ->with('availability')
            ->get();
    
        return view('dashboard', compact('appointments'));
    }


}