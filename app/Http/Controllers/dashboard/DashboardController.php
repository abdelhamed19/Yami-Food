<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $totalReservations;
    public $totalClients;
    public function __construct()
    {
        $this->totalReservations=Reservation::count();
        $this->totalClients=User::count();

    }
    public function index()
    {
        $totalReservations=$this->totalReservations;
        $totalClients=$this->totalClients;
        return view('dashboard.index',compact('totalReservations','totalClients'));
    }
    public function clients()
    {
        $users= User::latest()->paginate(10);
        return view('dashboard.clients',compact('users'));
    }
    public function profile()
    {
        $user=Auth::guard('admins')->user();
        return view('dashboard.admin.profile',compact('user'));
    }
}
