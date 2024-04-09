<?php

namespace App\Repositories\Reservations;

use App\Helpers\UploadImage;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ReservationClass implements ReservationInterface
{
    public function getReservation()
    {
        $cookie = App::make(UploadImage::class);
        if (Auth::check()) {
            return Auth::user()->reservations;
        }
        return Reservation::where('cookie_id', $cookie->getCookie())->get();
    }
    public function storeReservation(Request $request)
    {
        $cookie = App::make(UploadImage::class);
        if (Auth::check()) {
            $user = Auth::user();
            $newArray = [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ];
            $data = array_merge($request->reserve, $newArray);
            return Reservation::create($data);
        }

        $data = array_merge($request->reserve, ['cookie_id' => $cookie->getCookie()]);
        return Reservation::create($data);
    }
    public function updateReservation(Reservation $reservation, Request $request)

    {
        $cookie = App::make(UploadImage::class);
        if (Auth::check()) {
            $user = Auth::user();
            $newArray = [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ];
            $data = array_merge($request->reserve, $newArray);
            return $reservation->update($data);
        }

        $data = array_merge($request->reserve, ['cookie_id' => $cookie->getCookie()]);
        return $reservation->update($data);
    }
    public function deleteReservation(Reservation $reservation)
    {
        return $reservation->delete();
    }
}
