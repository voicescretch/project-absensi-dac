<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    //
    public function index()
    {
        $title = 'Check In';
        $todaysAttendances = Attendance::with(['user', 'employee'])->paginate(20);
        return view('kiosk.index-checkin', compact(['todaysAttendances', 'title']));
    }
}