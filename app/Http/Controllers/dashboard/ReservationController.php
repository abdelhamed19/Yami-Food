<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\front\StoreReservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::paginate(7);
        return view('dashboard.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservation $request)
    {
        Reservation::create($request->reserve);
        return redirect()->route("dashboard.reservations.index")->with('success','Reservation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('dashboard.reservations.show',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('dashboard.reservations.edit',compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        foreach($request->reserve as $key=> $reservations)
        {
            $reservation->update([
                $key => $reservations
            ]);
        }
        return redirect()->route("dashboard.reservations.index")->with('success','Reservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route("dashboard.reservations.index")->with('success','Reservation deleted successfully');
    }
    public function trashed()
    {
        $reservations = Reservation::onlyTrashed()->paginate(7);
        return view('dashboard.reservations.trashed',compact('reservations'));
    }
    public function restore($id)
    {
        $reservation = Reservation::onlyTrashed()->where('id',$id)->first();
        $reservation->restore();
        return redirect()->route("dashboard.reservations.index")->with('success','Reservation restored successfully');
    }
    public function forceDelete($id)
    {
        $reservation = Reservation::onlyTrashed()->where('id',$id)->first();
        $reservation->forceDelete();
        return redirect()->route("dashboard.reservations.index")->with('success','Reservation deleted successfully');
    }
    public function updateStatus(Request $request, Reservation $reservation)
    {
        $reservation->update([
            'status' => $request->status
        ]);
        return back()->with('success','Reservation status updated successfully');
    }
}
