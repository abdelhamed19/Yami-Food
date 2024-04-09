<?php

namespace App\Http\Controllers\Front;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\front\StoreReservation;
use App\Repositories\Reservations\ReservationInterface;

class ReservationController extends Controller
{
    public $reservationRepository;
    public function __construct(ReservationInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $reservations = $this->reservationRepository->getReservation();
        return view('front.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('front.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservation $request)
    {
        $this->reservationRepository->storeReservation($request);
        return redirect()->route('front.index');
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
    public function edit()
    {
        $reservation = $this->reservationRepository->getReservation()->first();
        return view('front.reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Reservation $reservation,Request $request)
    {
        $this->reservationRepository->updateReservation($reservation, $request);
        return redirect()->route('reservations.index')->with("success", "Reservation updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $this->reservationRepository->deleteReservation($reservation);
        return redirect()->route('reservations.index')->with("success", "Reservation deleted successfully.");
    }
}
