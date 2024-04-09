<?php

namespace App\Providers;

use App\Helpers\UploadImage;
use App\Repositories\Reservations\ReservationClass;
use App\Repositories\Reservations\ReservationInterface;
use Illuminate\Support\ServiceProvider;

class ReservationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ReservationInterface::class,function (){
            return new ReservationClass();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
