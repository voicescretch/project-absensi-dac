<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    //
    public function index()
    {
        $title = 'Check Out';
        $todaysAttendances = Attendance::with(['user', 'employee'])->paginate(20);
        return view('kiosk.index-checkout', compact(['todaysAttendances', 'title']));
    }
}