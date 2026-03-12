<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelSchedules;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function passengerReport()
    {
        $travels = TravelSchedules::withCount('bookings')->get();
        return view('admin.report.passenger', compact('travels'));
    }

    public function passengerHistory($id)
    {
        $travels = TravelSchedules::with('bookings.user')->findOrFail($id);
        return view('admin.report.history', compact('travels'));
    }
}
