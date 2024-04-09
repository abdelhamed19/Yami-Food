<?php
namespace App\Repositories\Reservations;

use App\Models\Reservation;
use Illuminate\Http\Request;

interface ReservationInterface
{
    public function getReservation();
    public function storeReservation(Request $request);
    public function updateReservation(Reservation $reservation,Request $request);
    public function deleteReservation(Reservation $reservation);
}
