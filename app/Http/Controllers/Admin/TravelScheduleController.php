<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelSchedules;
use Illuminate\Http\Request;

class TravelScheduleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'role:admin']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travels = TravelSchedules::all();
        return view('admin.travel.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.travel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'passenger_quota' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        TravelSchedules::create($validate);
        return redirect()->route('travel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $travel = TravelSchedules::findOrFail($id);
        return view('admin.travel.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $travel = TravelSchedules::findOrFail($id);
        $validate =  $request->validate([
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'passenger_quota' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        $travel->update($validate);
        return redirect()->route('travel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $travel = TravelSchedules::findOrFail($id);
        $travel->delete();

        return redirect()->back();
    }
}
